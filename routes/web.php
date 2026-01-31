<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdoptionController;
use App\Models\AnimalReport;

Route::get('/', function () {
    return view('home');
});

// Reports
Route::get('/reports', fn() => view('reports'));
Route::get('/reports/create', fn() => 'Create Report Coming Soon');
Route::get('/reports/{id}', fn($id) => "View Report: {$id}");

// Rescue Operations
Route::get('/rescues', fn() => view('rescues'));
Route::get('/rescues/create', fn() => 'Create Rescue Coming Soon');
Route::get('/rescues/{id}', fn($id) => "View Rescue: {$id}");

// Adoptions
Route::get('/adoptions', fn() => view('adoptions'));
Route::get('/adoptions/create', fn() => 'Create Adoption Coming Soon');
Route::get('/adoptions/{id}', fn($id) => "View Adoption: {$id}");

// Users
Route::get('/users', fn() => view('users'));
Route::get('/users/create', fn() => 'Create User Coming Soon');
Route::get('/users/{id}', fn($id) => "View User: {$id}");
Route::get('/users/{id}/edit', fn($id) => "Edit User: {$id}");

// Veterinarians
Route::get('/veterinarians', fn() => view('veterinarians'));
Route::get('/veterinarians/create', fn() => 'Create Veterinarian Coming Soon');
Route::get('/veterinarians/collaboration', fn() => 'Vet Collaboration Coming Soon');

// Donations
Route::get('/donations', fn() => view('donations'));
Route::get('/donation', fn() => view('donation'))->name('donation');
Route::post('/donation', function (\Illuminate\Http\Request $request) {
    try {
        // Validate the donation request
        $validated = $request->validate([
            'donor_name' => 'nullable|string|max:255',
            'donor_email' => 'required|email',
            'donor_phone' => 'required|string|max:20',
            'amount' => 'required|numeric|min:1',
            'custom_amount' => 'nullable|numeric|min:1',
            'payment_method' => 'required|string|in:bank_transfer,card',
            'donor_message' => 'nullable|string|max:1000',
            'donor_address' => 'nullable|string|max:500',
            'payment_slip' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'show_on_donor_wall' => 'nullable|boolean',
        ]);

        // Use custom amount if provided, otherwise use the hidden amount field
        $amount = $validated['custom_amount'] ?? $validated['amount'] ?? 0;

        // Handle file upload if present
        $paymentSlipPath = null;
        if ($request->hasFile('payment_slip')) {
            $paymentSlipPath = $request->file('payment_slip')->store('donations', 'public');
        }

        // Create donation record in database
        $donation = \App\Models\Donation::create([
            'donor_name' => $validated['donor_name'] ?? 'Anonymous',
            'donor_email' => $validated['donor_email'],
            'phone' => $validated['donor_phone'],
            'address' => $validated['donor_address'] ?? null,
            'amount' => (float) $amount,
            'payment_method' => $validated['payment_method'],
            'message' => $validated['donor_message'] ?? '',
            'payment_slip' => $paymentSlipPath,
            'show_on_wall' => $validated['show_on_donor_wall'] ? 1 : 0,
            'status' => 'pending',
            'session_id' => session()->getId(),
        ]);

        // Redirect to donation history page with success message
        return redirect()->route('donation-history')->with('success', 'Thank you for your donation of $' . $amount . '! Donation ID: ' . $donation->id);
    } catch (\Illuminate\Validation\ValidationException $e) {
        return back()->withErrors($e->errors())->withInput();
    } catch (\Exception $e) {
        \Log::error('Donation Error: ' . $e->getMessage());
        return back()->with('error', 'Error processing donation: ' . $e->getMessage())->withInput();
    }
})->name('donation.store');
Route::get('/donation-history', function (\Illuminate\Http\Request $request) {
    $query = \App\Models\Donation::query();

    // Search by Donation ID
    if ($request->has('donation_id') && $request->input('donation_id') != '') {
        $searchId = trim($request->input('donation_id'));
        // Remove 'DON-' prefix if user includes it
        $searchId = str_replace('DON-', '', $searchId);
        // Search by exact ID match (convert to integer)
        $query->where('id', (int)$searchId);
    }

    // Filter by Status
    if ($request->has('status') && $request->input('status') != '') {
        $query->where('status', $request->input('status'));
    }

    // Filter by Payment Method
    if ($request->has('payment_method') && $request->input('payment_method') != '') {
        $paymentMethod = $request->input('payment_method');
        // Map form values to database values
        if ($paymentMethod == 'bank') {
            $paymentMethod = 'bank_transfer';
        }
        $query->where('payment_method', $paymentMethod);
    }

    // Get donations with pagination and preserve search params
    $donations = $query->latest()->paginate(10)->appends(request()->query());
    
    return view('donation-history', ['donations' => $donations]);
})->name('donation-history');

Route::get('/donation/{id}/edit', function ($id) {
    $donation = \App\Models\Donation::findOrFail($id);
    return view('donation-edit', ['donation' => $donation]);
})->name('donation-edit');

Route::put('/donation/{id}', function (\Illuminate\Http\Request $request, $id) {
    try {
        $donation = \App\Models\Donation::findOrFail($id);

        // Log the incoming request
        \Log::info('Updating donation', [
            'id' => $id,
            'all_data' => $request->all()
        ]);

        // Get all the data from request
        $amount = $request->input('amount');
        $message = $request->input('message');
        $anonymous = $request->has('anonymous') ? 1 : 0;
        $show_on_wall = $request->has('show_on_wall') ? 1 : 0;

        \Log::info('Data to update', [
            'amount' => $amount,
            'message' => $message,
            'anonymous' => $anonymous,
            'show_on_wall' => $show_on_wall
        ]);

        // Update the donation directly
        $donation->amount = (float) $amount;
        $donation->message = $message;
        $donation->anonymous = $anonymous;
        $donation->show_on_wall = $show_on_wall;
        $donation->save();

        \Log::info('Donation updated successfully', ['id' => $id]);

        return redirect()->route('donation-history')->with('success', 'Donation updated successfully!');
    } catch (\Exception $e) {
        \Log::error('Donation Update Error: ' . $e->getMessage(), [
            'trace' => $e->getTraceAsString()
        ]);
        return back()->with('error', 'Error updating donation: ' . $e->getMessage())->withInput();
    }
})->name('donation.update');

Route::delete('/donation/{id}', function ($id) {
    try {
        $donation = \App\Models\Donation::findOrFail($id);
        $donation->delete();
        return redirect()->route('donation-history')->with('success', 'Donation deleted successfully.');
    } catch (\Exception $e) {
        return back()->with('error', 'Error deleting donation: ' . $e->getMessage());
    }
})->name('donation.delete');

// E-commerce
Route::get('/ecommerce', fn() => view('ecommerce'));

// Analytics
Route::get('/analytics', fn() => view('analytics'));

// Settings
Route::get('/settings', fn() => view('settings'));

// Other system pages
Route::get('/contact', fn() => 'Contact Coming Soon');
Route::get('/faq', fn() => 'FAQ Coming Soon');
Route::get('/help', fn() => 'Help Coming Soon');
Route::get('/privacy', fn() => 'Privacy Coming Soon');
Route::get('/activity', fn() => 'Activity Log Coming Soon');
Route::get('/notifications', fn() => 'Notifications Coming Soon');
Route::get('/logout', fn() => 'Logout Coming Soon');
Route::get('/profile', fn() => 'Profile Coming Soon');

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/adoption', function () {
    return view('adoption.list');
})->name('adoption.list');

// Additional routes for other pages
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/awareness', function () {
    return view('awareness');
})->name('awareness');

// Only this route - using route parameters
Route::get('/awareness/edit/{id}', function ($id) {
    return view('edit-posts', ['postId' => $id]);
})->name('edit-posts');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/report-animal', function () {
    return view('reportanimal');
})->name('animal.report.form');

Route::post('/report-animal', function (\Illuminate\Http\Request $request) {
    try {
        $data = [
            'report_id' => AnimalReport::generateReportId(),
            'animal_species' => $request->input('animal_species'),
            'other_species' => $request->input('other_species'),
            'animal_type' => $request->input('animal_type'),
            'description' => $request->input('description'),
            'location' => $request->input('location'),
            'last_seen' => $request->input('last_seen'),
            'contact_name' => $request->input('contact_name'),
            'contact_phone' => $request->input('contact_phone'),
            'contact_email' => $request->input('contact_email'),
            'status' => 'pending',
            'expires_at' => now()->addDays(30) // Set expiration 30 days from now
        ];

        // Handle file upload
        if ($request->hasFile('animal_photo')) {
            $path = $request->file('animal_photo')->store('reports', 'public');
            $data['animal_photo'] = $path;
        }

        $report = AnimalReport::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Animal report submitted successfully!',
            'redirect_url' => '/report-success/' . $report->report_id
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Error submitting report: ' . $e->getMessage(),
            'errors' => ['form' => [$e->getMessage()]]
        ], 422);
    }
})->name('animal.report.store');

Route::get('/track-report/{id?}', function ($id = null) {
    if ($id) {
        $report = AnimalReport::where('report_id', $id)->first();
        if (!$report) {
            return back()->with('error', 'Report not found');
        }
        return view('track-report', ['report' => $report]);
    }
    return view('track-report');
})->name('track.report');

Route::get('/report-success/{id?}', function ($id = null) {
    if ($id) {
        $report = AnimalReport::where('report_id', $id)->first();
        if ($report) {
            return view('report-success', ['report' => $report]);
        }
    }
    // Fallback: show a generic success message
    $report = (object) [
        'report_id' => 'RPT-' . strtoupper(uniqid()),
        'animal_type' => 'Animal',
        'location' => 'Location',
        'description' => 'Your report details',
        'status' => 'Pending'
    ];
    return view('report-success', ['report' => $report]);
})->name('report.success');

Route::get('/delete-report/{id}', function ($id) {
    return view('delete-report');
})->name('report.delete');

Route::get('/my-reports', function (\Illuminate\Http\Request $request) {
    $query = AnimalReport::latest();
    
    // Search by Report ID
    if ($request->has('report_id') && $request->input('report_id') != '') {
        $query->where('report_id', 'like', '%' . $request->input('report_id') . '%');
    }
    
    // Search by Email
    if ($request->has('email') && $request->input('email') != '') {
        $query->where('contact_email', 'like', '%' . $request->input('email') . '%');
    }
    
    $reports = $query->paginate(10);
    return view('my-reports', ['reports' => $reports]);
})->name('my-reports');

Route::get('/edit-report/{id}', function ($id) {
    $report = AnimalReport::where('report_id', $id)->first();
    if (!$report) {
        return back()->with('error', 'Report not found');
    }
    return view('edit-report', ['report' => $report]);
})->name('report.edit');

Route::match(['post', 'put', 'delete'], '/report/{id}', function (\Illuminate\Http\Request $request, $id) {
    try {
        $report = AnimalReport::where('report_id', $id)->first();
        if (!$report) {
            return response()->json([
                'success' => false,
                'message' => 'Report not found'
            ], 404);
        }

        // Handle DELETE request
        if ($request->isMethod('delete')) {
            // Verify email matches
            $email = $request->input('email');
            if ($email !== $report->contact_email) {
                return response()->json([
                    'success' => false,
                    'message' => 'Email does not match the report\'s contact email'
                ], 403);
            }

            // Delete the report
            $report->delete();

            return response()->json([
                'success' => true,
                'message' => 'Report deleted successfully!',
                'redirect_url' => '/my-reports'
            ]);
        }

        // Handle POST/PUT request (Update)
        $data = [
            'animal_species' => $request->input('animal_species'),
            'other_species' => $request->input('other_species'),
            'animal_type' => $request->input('animal_type'),
            'description' => $request->input('description'),
            'location' => $request->input('location'),
            'last_seen' => $request->input('last_seen'),
            'contact_name' => $request->input('contact_name'),
            'contact_phone' => $request->input('contact_phone'),
            'contact_email' => $request->input('contact_email'),
        ];

        // Handle file upload
        if ($request->hasFile('animal_photo')) {
            $path = $request->file('animal_photo')->store('reports', 'public');
            $data['animal_photo'] = $path;
        }

        $report->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Report updated successfully!',
            'redirect_url' => '/track-report/' . $report->report_id
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Error updating report: ' . $e->getMessage(),
            'errors' => ['form' => [$e->getMessage()]]
        ], 422);
    }
})->name('report.update');

Route::get('/track-status', function (\Illuminate\Http\Request $request) {
    if ($request->has('report_id')) {
        $report = AnimalReport::where('report_id', $request->input('report_id'))->first();
        if ($report) {
            return redirect()->route('track.report', ['id' => $report->report_id]);
        }
        return back()->with('error', 'Report not found');
    }
    return view('track-report');
})->name('track.status');


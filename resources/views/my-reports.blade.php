<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Reports - SafePaws</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background-color: #071331;
            color: white;
            font-family: 'Poppins', sans-serif;
        }

        .status-badge {
            @apply px-3 py-1 rounded-full text-sm font-medium;
        }

        .status-pending {
            @apply bg-yellow-500/20 text-yellow-300 border border-yellow-500/30;
        }

        .status-rescue {
            @apply bg-orange-500/20 text-orange-300 border border-orange-500/30;
        }

        .status-treatment {
            @apply bg-blue-500/20 text-blue-300 border border-blue-500/30;
        }

        .status-adoption {
            @apply bg-purple-500/20 text-purple-300 border border-purple-500/30;
        }

        .status-resolved {
            @apply bg-green-500/20 text-green-300 border border-green-500/30;
        }

        .report-card {
            @apply bg-white/5 border border-white/10 rounded-2xl p-6 transition-all duration-300 hover:border-white/20;
        }

        input, select {
            color: black !important;
        }
    </style>
</head>

<body class="min-h-screen p-4 md:p-8">
<div class="max-w-6xl mx-auto">

    <!-- Header -->
    <div class="mb-8">
        <div class="flex items-start justify-between">
            <div>
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 mb-6 text-cyan-400 hover:text-cyan-300">
                    <i class="fas fa-arrow-left"></i>
                    Back to Home
                </a>
                <h1 class="mb-2 text-3xl font-bold md:text-4xl">My Submitted Reports</h1>
                <p class="text-gray-300">History of all reports you've submitted to SafePaws</p>
            </div>
            <a href="{{ route('animal.report.form') }}"
               class="px-6 py-3 font-medium transition bg-cyan-500 hover:bg-cyan-600 rounded-xl">
                <i class="mr-2 fas fa-plus"></i>
                New Report
            </a>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="mb-6">
        <form method="GET" action="{{ route('my-reports') }}" class="flex flex-wrap gap-3">
            <input type="text" name="report_id" placeholder="Search by Report ID"
                   value="{{ request('report_id') }}"
                   class="w-full px-4 py-3 text-black rounded-xl md:w-1/3">

            <input type="email" name="email" placeholder="Search by Email"
                   value="{{ request('email') }}"
                   class="w-full px-4 py-3 text-black rounded-xl md:w-1/3">

            <button type="submit" class="px-6 py-3 text-white bg-cyan-500 rounded-xl hover:bg-cyan-600">
                <i class="mr-2 fas fa-search"></i> Search
            </button>
        </form>
    </div>

    <!-- Reports Table -->
    <div class="report-card">
        @if($reports->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                <tr class="border-b border-white/10">
                    <th class="pb-4 text-left">Report ID</th>
                    <th class="pb-4 text-left">Animal Type</th>
                    <th class="pb-4 text-left">Location</th>
                    <th class="pb-4 text-left">Status</th>
                    <th class="pb-4 text-left">Submitted</th>
                    <th class="pb-4 text-left">Actions</th>
                </tr>
                </thead>

                <tbody>
                @foreach($reports as $report)
                <tr class="border-b border-white/5 hover:bg-white/5">
                    <td class="py-4 font-mono text-cyan-400">
                        {{ $report->report_id }}
                    </td>

                    <td class="py-4">{{ $report->animal_type }}</td>

                    <td class="py-4">
                        <div class="max-w-xs truncate">{{ $report->location }}</div>
                    </td>

                    <td class="py-4">
                        <span class="status-badge status-{{ $report->status }}">
                            {{ ucfirst($report->status) }}
                        </span>
                    </td>

                    <td class="py-4 text-sm text-gray-400">
                        {{ $report->created_at->format('M d, Y') }}
                    </td>

                    <td class="py-4">
                        <div class="flex items-center gap-2">
                            <a href="{{ route('track.report', $report->report_id) }}"
                               class="px-3 py-1 text-sm transition rounded-lg bg-white/10 hover:bg-white/20"
                               title="Track Report">
                                <i class="fas fa-search"></i>
                            </a>

                            <a href="{{ route('report.edit', $report->report_id) }}"
                               class="px-3 py-1 text-sm transition rounded-lg bg-blue-500/20 hover:bg-blue-500/30"
                               title="Edit Report">
                                <i class="fas fa-edit"></i>
                            </a>

                            <a href="{{ route('report.delete', $report->report_id) }}"
                               onclick="return confirm('Are you sure you want to delete this report?');"
                               class="px-3 py-1 text-sm transition rounded-lg bg-red-500/20 hover:bg-red-500/30"
                               title="Delete Report">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $reports->appends(request()->query())->links() }}
        </div>

        @else
        <div class="py-12 text-center">
            <h3 class="text-2xl font-bold">No Reports Found</h3>
        </div>
        @endif
    </div>

</div>

</body>
</html>
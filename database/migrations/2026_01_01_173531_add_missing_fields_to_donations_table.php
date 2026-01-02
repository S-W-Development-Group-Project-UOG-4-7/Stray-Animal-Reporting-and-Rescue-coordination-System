<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('donations', function (Blueprint $table) {
            if (!Schema::hasColumn('donations', 'donor_name')) {
                $table->string('donor_name')->after('amount');
            }
            if (!Schema::hasColumn('donations', 'donor_email')) {
                $table->string('donor_email')->after('donor_name');
            }
            if (!Schema::hasColumn('donations', 'payment_method')) {
                $table->string('payment_method')->after('show_on_wall');
            }
            if (!Schema::hasColumn('donations', 'payment_slip')) {
                $table->string('payment_slip')->after('payment_method');
            }
            if (!Schema::hasColumn('donations', 'status')) {
                $table->string('status')->default('pending')->after('payment_slip');
            }
        });
    }

    public function down(): void
    {
        Schema::table('donations', function (Blueprint $table) {
            $table->dropColumn(['donor_name', 'donor_email', 'payment_method', 'payment_slip', 'status']);
        });
    }
};

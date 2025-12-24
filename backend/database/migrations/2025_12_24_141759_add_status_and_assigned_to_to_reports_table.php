<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('reports', function (Blueprint $table) {
            if (!Schema::hasColumn('reports', 'status')) {
                $table->string('status')->default('pending');
            }

            if (!Schema::hasColumn('reports', 'assigned_to')) {
                $table->foreignId('assigned_to')->nullable()
                      ->constrained('users')
                      ->nullOnDelete();
            }
        });
    }

    public function down(): void
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->dropColumn(['status', 'assigned_to']);
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusColumnsToReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reports', function (Blueprint $table) {
            // Add status column
            $table->enum('status', ['pending', 'assigned', 'in_progress', 'completed', 'cancelled'])
                  ->default('pending');
            
            // Add foreign key for assigned user
            $table->foreignId('assigned_to')
                  ->nullable()
                  ->constrained('users')
                  ->onDelete('set null');
            
            // Add timestamp for when status was last changed
            $table->timestamp('status_changed_at')->nullable();
            
            // Add index for faster queries on status
            $table->index('status');
            $table->index('assigned_to');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reports', function (Blueprint $table) {
            // Remove the foreign key constraint first
            $table->dropForeign(['assigned_to']);
            
            // Drop the columns
            $table->dropColumn('status');
            $table->dropColumn('assigned_to');
            $table->dropColumn('status_changed_at');
        });
    }
}
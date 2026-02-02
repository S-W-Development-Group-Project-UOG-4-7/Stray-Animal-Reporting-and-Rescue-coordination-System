<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('animal_reports', function (Blueprint $table) {
            $table->id();
            $table->string('report_id')->unique();
            $table->string('animal_type');
            $table->text('description');
            $table->string('location');
            $table->datetime('last_seen')->nullable();
            $table->string('animal_photo')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('status')->default('pending');
            $table->datetime('expires_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('animal_reports');
    }
};

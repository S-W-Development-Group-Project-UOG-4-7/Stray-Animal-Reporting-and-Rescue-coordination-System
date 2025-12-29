<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('report_history', function (Blueprint $table) {
            $table->id();
            $table->string('original_report_id');
            $table->json('report_data');
            $table->timestamp('archived_at')->useCurrent();
            $table->string('archived_reason')->default('expired');
            $table->timestamps();
            
            $table->index('original_report_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('report_history');
    }
};
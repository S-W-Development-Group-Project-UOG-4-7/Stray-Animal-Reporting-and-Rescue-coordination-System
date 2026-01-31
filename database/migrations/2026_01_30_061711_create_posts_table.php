<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('type', ['article', 'video', 'image']);
            $table->string('title');
            $table->text('description');
            $table->string('media_url')->nullable();
            $table->enum('media_type', ['image', 'youtube', 'uploaded_video'])->nullable();
            $table->integer('likes')->default(0);
            $table->json('liked_by')->nullable(); // Store array of user IDs who liked
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
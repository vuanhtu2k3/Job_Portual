<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Liên kết với người dùng
            $table->string('name');               // Tên
            $table->string('email');              // Email
            $table->string('phone');              // Số điện thoại
            $table->text('summary');              // Tóm tắt cá nhân
            $table->text('experience');           // Kinh nghiệm
            $table->text('education');            // Học vấn
            $table->text('skills');               // Kỹ năng
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resumes');
    }
};

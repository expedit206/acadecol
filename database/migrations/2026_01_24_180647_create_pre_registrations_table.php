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
        Schema::create('pre_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('formation_id')->constrained()->onDelete('cascade');
            $table->string('registration_number')->unique();
            $table->string('phone');
            $table->string('address');
            $table->date('birth_date');
            $table->enum('gender', ['M', 'F']);
            $table->string('education_level');
            $table->string('last_school')->nullable();
            $table->text('message')->nullable();
            $table->string('status')->default('pending'); // pending, validated, cancelled
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pre_registrations');
    }
};

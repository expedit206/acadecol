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
            // Pas de user_id car pas de compte utilisateur
            $table->foreignId('formation_id')->constrained()->onDelete('cascade');
            $table->string('registration_number')->unique();
            
            // Infos personnelles
            $table->string('last_name');
            $table->string('first_name');
            $table->string('email'); // Pas unique globalement pour permettre plusieurs pré-inscriptions ? Non, email unique = 1 fiche.
            $table->string('phone');
            $table->string('address');
            $table->date('birth_date');
            $table->enum('gender', ['M', 'F']);
            
            // Infos académiques
            $table->string('education_level');
            $table->string('last_school')->nullable();
            
            // Divers
            $table->text('message')->nullable();
            $table->string('status')->default('pending'); // pending, validated, cancelled
            
            $table->timestamps();
            
            // Index pour recherche rapide
            $table->index('email');
            $table->index('registration_number');
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

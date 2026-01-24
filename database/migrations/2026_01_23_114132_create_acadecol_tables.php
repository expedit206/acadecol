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
        // 1. Categories Table
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->json('nom'); // {"fr": "Santé", "en": "Health"}
            $table->string('slug')->unique();
            $table->json('description')->nullable();
            $table->string('icon_class')->nullable();
            $table->foreignId('parent_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->integer('ordre_affichage')->default(0);
            $table->timestamps();
        });

        // 2. Formations Table
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->json('titre');
            $table->string('slug')->unique();
            $table->json('description_courte')->nullable();
            $table->json('description_complete')->nullable();
            $table->json('debouches')->nullable();
            $table->json('prerequis')->nullable();
            
            // Infos pratiques
            $table->decimal('prix', 10, 2)->nullable();
            $table->string('duree')->nullable(); // Ex: "12 mois"
            $table->string('niveau_entree')->nullable(); // Ex: "Bac", "Probatoire"
            $table->boolean('is_featured')->default(false);
            
            $table->timestamps();
        });

        // 3. Modules Pédagogiques
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('formation_id')->constrained()->onDelete('cascade');
            $table->json('titre');
            $table->json('contenu')->nullable();
            $table->integer('ordre')->default(0);
            $table->timestamps();
        });

        // 4. Détails Dynamiques (Key-Value pour flexibilité)
        // Ex: Prochaine rentrée, Lieu, Horaires
        Schema::create('formation_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('formation_id')->constrained()->onDelete('cascade');
            $table->json('label'); // {"fr": "Rentrée", "en": "Intake"}
            $table->json('valeur'); // {"fr": "15 Sept", "en": "Sep 15"}
            $table->string('icon')->nullable();
            $table->timestamps();
        });

        // 5. Images / Médias
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->morphs('imageable'); // imageable_id, imageable_type
            $table->string('path');
            $table->boolean('is_cover')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
        Schema::dropIfExists('formation_details');
        Schema::dropIfExists('modules');
        Schema::dropIfExists('formations');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('acadecol_tables'); // Au cas où
    }
};

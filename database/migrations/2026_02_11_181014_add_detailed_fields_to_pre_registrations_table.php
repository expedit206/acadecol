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
        Schema::table('pre_registrations', function (Blueprint $table) {
            // Informations personnelles complémentaires
            $table->string('whatsapp')->nullable()->after('phone');
            $table->string('birth_place')->nullable()->after('birth_date');
            $table->string('nationality')->nullable()->after('gender');
            
            // Parcours académique détaillé
            $table->string('graduation_year')->nullable()->after('last_school');
            $table->string('major_field')->nullable()->after('graduation_year');
            
            // Situation professionnelle
            $table->string('professional_status')->nullable()->after('major_field');
            $table->string('current_position')->nullable()->after('professional_status');
            $table->string('company_name')->nullable()->after('current_position');
            $table->string('years_of_experience')->nullable()->after('company_name');
            
            // Compétences linguistiques
            $table->string('french_level')->nullable()->after('years_of_experience');
            $table->string('english_level')->nullable()->after('french_level');
            $table->string('other_languages')->nullable()->after('english_level');
            
            // Disponibilité
            $table->string('availability')->nullable()->after('other_languages');
            $table->string('preferred_schedule')->nullable()->after('availability');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pre_registrations', function (Blueprint $table) {
            $table->dropColumn([
                'whatsapp',
                'birth_place',
                'nationality',
                'graduation_year',
                'major_field',
                'professional_status',
                'current_position',
                'company_name',
                'years_of_experience',
                'french_level',
                'english_level',
                'other_languages',
                'availability',
                'preferred_schedule',
            ]);
        });
    }
};

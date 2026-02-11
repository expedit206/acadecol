<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PreRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        // Informations de base
        'formation_id',
        'registration_number',
        'last_name',
        'first_name',
        'email',
        'phone',
        'whatsapp',
        'address',
        'birth_date',
        'birth_place',
        'gender',
        'nationality',
        
        // Parcours académique
        'education_level',
        'last_school',
        'graduation_year',
        'major_field',
        
        // Situation professionnelle
        'professional_status',
        'current_position',
        'company_name',
        'years_of_experience',
        
        // Compétences linguistiques
        'french_level',
        'english_level',
        'other_languages',
        
        // Motivations et objectifs
        'motivation',
        'career_goals',
        'prior_knowledge',
        
        // Disponibilité
        'availability',
        'preferred_schedule',
        
        // Documents
        'cv_file',
        
        // Autres
        'message',
        'status',
    ];

    public function formation(): BelongsTo
    {
        return $this->belongsTo(Formation::class);
    }
}

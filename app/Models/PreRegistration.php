<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PreRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'formation_id',
        'registration_number',
        'last_name',
        'first_name',
        'email',
        'phone',
        'whatsapp',
        'birth_date',
        'birth_place',
        'gender',
        'education_level',
        'last_school',
        'major_field',
        'message',
        'status',
    ];

    public function formation(): BelongsTo
    {
        return $this->belongsTo(Formation::class);
    }
}

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
        'address',
        'birth_date',
        'gender',
        'education_level',
        'last_school',
        'message',
        'status',
    ];

    public function formation(): BelongsTo
    {
        return $this->belongsTo(Formation::class);
    }
}

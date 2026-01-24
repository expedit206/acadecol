<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    protected $casts = [
        'titre' => 'array',
        'contenu' => 'array',
    ];

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
}

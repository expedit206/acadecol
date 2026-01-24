<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormationDetail extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    protected $casts = [
        'label' => 'array',
        'valeur' => 'array',
    ];

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    protected $casts = [
        'titre' => 'array',
        'description_courte' => 'array',
        'description_complete' => 'array',
        'debouches' => 'array',
        'prerequis' => 'array',
        'is_featured' => 'boolean',
    ];

    protected $appends = ['modules_count', 'formations_details_count'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function modules()
    {
        return $this->hasMany(Module::class)->orderBy('ordre');
    }

    public function details()
    {
        return $this->hasMany(FormationDetail::class);
    }

    public function formations_details()
    {
        return $this->hasMany(FormationDetail::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function getModulesCountAttribute()
    {
        return $this->modules()->count();
    }

    public function getFormationsDetailsCountAttribute()
    {
        return $this->details()->count();
    }
}


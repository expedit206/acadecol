<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Formation;

use Inertia\Inertia;

class PublicController extends Controller
{
    public function home()
    {
        $formations = Formation::with('category')
            ->orderBy('id', 'desc')
            ->get();

        $categories = Category::orderBy('ordre_affichage')->get();

        return Inertia::render('Home', [
            'formations' => $formations,
            'categories' => $categories
        ]);
    }

    public function formations()
    {
        $formations = Formation::with([
            'category',
            'details',
            'modules' => function ($query) {
                $query->orderBy('ordre');
            }
        ])
            ->orderBy('id')
            ->get()
            ->map(function ($formation) {
                return [
                    ...$formation->toArray(),
                    'formations_details' => $formation->details
                ];
            });

        $categories = Category::orderBy('ordre_affichage')->get();

        return Inertia::render('Formations', [
            'formations' => $formations,
            'categories' => $categories
        ]);
    }

    public function about()
    {
        return Inertia::render('About');
    }

    public function contact()
    {
        return Inertia::render('Contact');
    }

    public function certifications()
    {
        return Inertia::render('Certifications');
    }
    
    public function news()
    {
         return Inertia::render('News');
    }
}

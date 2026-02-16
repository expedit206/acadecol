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
        $formations = Formation::with(['category', 'image'])
            ->orderBy('id', 'desc')
            ->get();

        $categories = Category::orderBy('ordre_affichage')->get();

        $latestNews = \App\Models\News::published()
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        return Inertia::render('Home', [
            'formations' => $formations,
            'categories' => $categories,
            'latestNews' => $latestNews
        ]);
    }

    public function formations(Request $request)
    {
        $query = Formation::with([
            'category',
            'details',
            'image',
            'modules' => function ($query) {
                $query->orderBy('ordre');
            }
        ]);

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('titre', 'like', "%{$search}%")
                  ->orWhere('description_courte', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%")
                  ->orWhere('description_complete', 'like', "%{$search}%");
            });
        }

        if ($request->has('cat')) {
            $slug = $request->input('cat');
            $category = Category::where('slug', $slug)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        $formations = $query->orderBy('id')
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


    
    public function news()
    {
        $news = \App\Models\News::published()
            ->orderBy('published_at', 'desc')
            ->paginate(9);

         return Inertia::render('News', [
             'news' => $news
         ]);
    }

    public function newsDetail($slug)
    {
        $news = \App\Models\News::where('slug', $slug)->firstOrFail();
        
        // Fetch recent news for sidebar/suggestion
        $recentNews = \App\Models\News::published()
            ->where('id', '!=', $news->id)
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        return Inertia::render('NewsDetail', [
            'newsItem' => $news,
            'recentNews' => $recentNews
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Formation;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Inertia\Inertia;

class FormationController extends Controller
{
    public function index()
    {
        $formations = Formation::with(['category', 'image'])
            ->withCount(['modules', 'details'])
            ->latest()
            ->paginate(20);

        return Inertia::render('Admin/Formations/Index', [
            'formations' => $formations
        ]);
    }

    public function create()
    {
        $categories = Category::orderBy('ordre_affichage')->get();
        
        return Inertia::render('Admin/Formations/Create', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre.fr' => 'required|string|max:255',
            'titre.en' => 'required|string|max:255',
            'slug' => 'required|string|unique:formations,slug',
            'description_courte.fr' => 'required|string',
            'description_courte.en' => 'required|string',
            'description_complete.fr' => 'required|string',
            'description_complete.en' => 'required|string',
            'debouches.fr' => 'nullable|string',
            'debouches.en' => 'nullable|string',
            'prerequis.fr' => 'nullable|string',
            'prerequis.en' => 'nullable|string',
            'prix' => 'nullable|numeric',
            'duree' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'is_featured' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $formation = Formation::create(\Illuminate\Support\Arr::except($validated, ['image']));

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('formations', 'public');
            $formation->image()->create([
                'path' => 'storage/' . $path,
                'is_cover' => true
            ]);
        }

        return redirect()->route('admin.formations.index')
            ->with('success', 'Formation créée avec succès');
    }

    public function edit(Formation $formation)
    {
        $categories = Category::orderBy('ordre_affichage')->get();
        $formation->load(['modules', 'details', 'category', 'image']);

        return Inertia::render('Admin/Formations/Edit', [
            'formation' => $formation,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, Formation $formation)
    {
        $validated = $request->validate([
            'titre.fr' => 'required|string|max:255',
            'titre.en' => 'required|string|max:255',
            'slug' => 'required|string|unique:formations,slug,' . $formation->id,
            'description_courte.fr' => 'required|string',
            'description_courte.en' => 'required|string',
            'description_complete.fr' => 'required|string',
            'description_complete.en' => 'required|string',
            'debouches.fr' => 'nullable|string',
            'debouches.en' => 'nullable|string',
            'prerequis.fr' => 'nullable|string',
            'prerequis.en' => 'nullable|string',
            'prix' => 'nullable|numeric',
            'duree' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'is_featured' => 'boolean',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $formation->update(\Illuminate\Support\Arr::except($validated, ['image_file']));

        if ($request->hasFile('image_file')) {
            // Optionnel: Supprimer l'ancienne image physique si elle existe
            if ($formation->image) {
                // On pourrait utiliser Storage::disk('public')->delete(...) ici si on gérait strictement les chemins
                $formation->image->delete();
            }

            $path = $request->file('image_file')->store('formations', 'public');
            $formation->image()->create([
                'path' => 'storage/' . $path,
                'is_cover' => true
            ]);
        }

        return redirect()->route('admin.formations.index')
            ->with('success', 'Formation mise à jour avec succès');
    }

    public function destroy(Formation $formation)
    {
        $formation->delete();

        return redirect()->route('admin.formations.index')
            ->with('success', 'Formation supprimée avec succès');
    }

    public function toggleFeatured(Formation $formation)
    {
        $formation->update(['is_featured' => !$formation->is_featured]);

        return back()->with('success', 'Statut mis à jour');
    }
}

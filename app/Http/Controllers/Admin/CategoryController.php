<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('formations')
            ->orderBy('ordre_affichage')
            ->get();

        return Inertia::render('Admin/Categories/Index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        $categories = Category::whereNull('parent_id')->get();
        
        return Inertia::render('Admin/Categories/Create', [
            'parentCategories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom.fr' => 'required|string|max:255',
            'nom.en' => 'required|string|max:255',
            'slug' => 'required|string|unique:categories,slug',
            'description.fr' => 'nullable|string',
            'description.en' => 'nullable|string',
            'icon_class' => 'nullable|string',
            'ordre_affichage' => 'nullable|integer',
            'parent_id' => 'nullable|exists:categories,id'
        ]);

        Category::create($validated);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Catégorie créée avec succès');
    }

    public function edit(Category $category)
    {
        $categories = Category::whereNull('parent_id')
            ->where('id', '!=', $category->id)
            ->get();

        return Inertia::render('Admin/Categories/Edit', [
            'category' => $category,
            'parentCategories' => $categories
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'nom.fr' => 'required|string|max:255',
            'nom.en' => 'required|string|max:255',
            'slug' => 'required|string|unique:categories,slug,' . $category->id,
            'description.fr' => 'nullable|string',
            'description.en' => 'nullable|string',
            'icon_class' => 'nullable|string',
            'ordre_affichage' => 'nullable|integer',
            'parent_id' => 'nullable|exists:categories,id'
        ]);

        $category->update($validated);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Catégorie mise à jour avec succès');
    }

    public function destroy(Category $category)
    {
        if ($category->formations()->count() > 0) {
            return back()->with('error', 'Impossible de supprimer une catégorie contenant des formations');
        }

        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Catégorie supprimée avec succès');
    }
}

<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Formation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia;
use Tests\TestCase;

class PublicSiteTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_loads_correctly()
    {
        // Create some data
        $category = Category::create([
            'nom' => ['fr' => 'Informatique', 'en' => 'IT'],
            'description' => ['fr' => 'Desc', 'en' => 'Desc'],
            'slug' => 'informatique',
            'ordre_affichage' => 1
        ]);

        Formation::create([
            'category_id' => $category->id,
            'titre' => ['fr' => 'Développement Web', 'en' => 'Web Dev'],
            'description_courte' => ['fr' => 'Short', 'en' => 'Short'],
            'description_complete' => ['fr' => 'Long', 'en' => 'Long'],
            'is_featured' => true,
            'slug' => 'developpement-web',
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        
        // Assert Inertia response
        $response->assertInertia(fn (AssertableInertia $page) => $page
            ->component('Home')
            ->has('featuredFormations', 1)
            ->has('categories', 1)
        );
    }

    public function test_formations_page_loads_correctly()
    {
        $category = Category::create([
            'nom' => ['fr' => 'Gest', 'en' => 'Man'],
            'slug' => 'gestion',
            'ordre_affichage' => 1
        ]);

        Formation::create([
            'category_id' => $category->id,
            'titre' => ['fr' => 'Comptabilité', 'en' => 'Accounting'],
            'is_featured' => false,
            'slug' => 'comptabilite',
        ]);

        $response = $this->get('/formations');

        $response->assertStatus(200);

        $response->assertInertia(fn (AssertableInertia $page) => $page
            ->component('Formations')
            ->has('formations.data', 1)
            ->has('categories', 1)
        );
    }

    public function test_static_pages_load()
    {
        $pages = [
            '/a-propos' => 'About',
            '/contact' => 'Contact',
            '/certifications' => 'Certifications',
            '/actualites' => 'News',
        ];

        foreach ($pages as $url => $component) {
            $response = $this->get($url);
            $response->assertStatus(200);
            $response->assertInertia(fn (AssertableInertia $page) => $page
                ->component($component)
            );
        }
    }
}

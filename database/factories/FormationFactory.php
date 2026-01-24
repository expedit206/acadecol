<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Formation>
 */
class FormationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $formations = [
            // Informatique
            ['fr' => 'Développement Web', 'en' => 'Web Development', 'prix' => 250000, 'duree' => '12 mois'],
            ['fr' => 'Python & Data Science', 'en' => 'Python & Data Science', 'prix' => 300000, 'duree' => '9 mois'],
            ['fr' => 'DevOps & Cloud', 'en' => 'DevOps & Cloud', 'prix' => 280000, 'duree' => '10 mois'],
            ['fr' => 'Cybersécurité', 'en' => 'Cybersecurity', 'prix' => 320000, 'duree' => '12 mois'],
            ['fr' => 'Mobile App Development', 'en' => 'Mobile App Development', 'prix' => 260000, 'duree' => '10 mois'],
            
            // Santé
            ['fr' => 'Infirmerie', 'en' => 'Nursing', 'prix' => 200000, 'duree' => '24 mois'],
            ['fr' => 'Santé Publique', 'en' => 'Public Health', 'prix' => 220000, 'duree' => '18 mois'],
            ['fr' => 'Pharmacie', 'en' => 'Pharmacy', 'prix' => 280000, 'duree' => '24 mois'],
            ['fr' => 'Laboratoire Médical', 'en' => 'Medical Laboratory', 'prix' => 180000, 'duree' => '12 mois'],
            ['fr' => 'Secrétariat Médical', 'en' => 'Medical Secretary', 'prix' => 150000, 'duree' => '8 mois'],
            
            // Commerce
            ['fr' => 'Gestion Commerciale', 'en' => 'Business Management', 'prix' => 200000, 'duree' => '12 mois'],
            ['fr' => 'Comptabilité', 'en' => 'Accounting', 'prix' => 210000, 'duree' => '12 mois'],
            ['fr' => 'Marketing Digital', 'en' => 'Digital Marketing', 'prix' => 190000, 'duree' => '9 mois'],
            ['fr' => 'Commerce Électronique', 'en' => 'E-Commerce', 'prix' => 220000, 'duree' => '10 mois'],
            ['fr' => 'Ressources Humaines', 'en' => 'Human Resources', 'prix' => 210000, 'duree' => '12 mois'],
            
            // Ingénierie
            ['fr' => 'Génie Civil', 'en' => 'Civil Engineering', 'prix' => 300000, 'duree' => '36 mois'],
            ['fr' => 'Électricité', 'en' => 'Electrical Engineering', 'prix' => 280000, 'duree' => '24 mois'],
            ['fr' => 'Mécanique', 'en' => 'Mechanical Engineering', 'prix' => 270000, 'duree' => '24 mois'],
            ['fr' => 'Maintenance Industrielle', 'en' => 'Industrial Maintenance', 'prix' => 200000, 'duree' => '12 mois'],
            ['fr' => 'Énergie Renouvelable', 'en' => 'Renewable Energy', 'prix' => 290000, 'duree' => '18 mois'],
            
            // Arts & Design
            ['fr' => 'Graphisme', 'en' => 'Graphic Design', 'prix' => 180000, 'duree' => '9 mois'],
            ['fr' => 'Architecture Intérieure', 'en' => 'Interior Design', 'prix' => 220000, 'duree' => '12 mois'],
            ['fr' => 'Mode et Textile', 'en' => 'Fashion & Textiles', 'prix' => 170000, 'duree' => '10 mois'],
            ['fr' => 'Photographie', 'en' => 'Photography', 'prix' => 150000, 'duree' => '8 mois'],
            ['fr' => 'Animation 3D', 'en' => '3D Animation', 'prix' => 260000, 'duree' => '12 mois'],
            
            // Langues
            ['fr' => 'Anglais Professionnel', 'en' => 'Professional English', 'prix' => 120000, 'duree' => '6 mois'],
            ['fr' => 'Français Avancé', 'en' => 'Advanced French', 'prix' => 100000, 'duree' => '4 mois'],
            ['fr' => 'Mandarin', 'en' => 'Mandarin Chinese', 'prix' => 150000, 'duree' => '12 mois'],
            ['fr' => 'Espagnol', 'en' => 'Spanish', 'prix' => 110000, 'duree' => '6 mois'],
            ['fr' => 'Traduction & Interprétation', 'en' => 'Translation & Interpretation', 'prix' => 180000, 'duree' => '12 mois'],
        ];
        
        $formation = $formations[array_rand($formations)];
        $slug = \Illuminate\Support\Str::slug($formation['fr']);
        
        return [
            'category_id' => Category::inRandomOrder()->first()->id ?? Category::factory()->create()->id,
            'titre' => ['fr' => $formation['fr'], 'en' => $formation['en']],
            'slug' => $slug . '-' . uniqid(),
            'description_courte' => [
                'fr' => 'Formation pratique et complète en ' . $formation['fr'],
                'en' => 'Complete and practical training in ' . $formation['en']
            ],
            'description_complete' => [
                'fr' => 'Cette formation vous prépare à une carrière réussie dans le domaine de ' . $formation['fr'] . '. Nos instructeurs expérimentés vous enseigneront les dernières techniques et meilleures pratiques du secteur.',
                'en' => 'This training prepares you for a successful career in ' . $formation['en'] . '. Our experienced instructors will teach you the latest techniques and best practices in the field.'
            ],
            'prerequis' => [
                'fr' => ['Baccalauréat ou équivalent', 'Connaissance de base en informatique'],
                'en' => ['High School Diploma or equivalent', 'Basic IT knowledge']
            ],
            'debouches' => [
                'fr' => ['Emploi local', 'Travail indépendant', 'Création d\'entreprise'],
                'en' => ['Local employment', 'Freelance work', 'Business creation']
            ],
            'duree' => $formation['duree'],
            'niveau_entree' => $this->faker->randomElement(['Bac', 'Probatoire', 'BEPC', 'Primaire']),
            'prix' => $formation['prix'],
            'is_featured' => $this->faker->boolean(30),
        ];
    }
}

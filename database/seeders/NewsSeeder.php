<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newsItems = [
            [
                'title' => [
                    'fr' => 'Ouverture des inscriptions pour l\'année académique 2026-2027',
                    'en' => 'Registration Open for the 2026-2027 Academic Year',
                ],
                'slug' => 'ouverture-inscriptions-2026-2027',
                'content' => [
                    'fr' => 'Nous sommes ravis d\'annoncer que les inscriptions pour la prochaine année académique sont officiellement ouvertes ! Que vous soyez intéressé par nos formations en informatique, en gestion ou en santé, c\'est le moment idéal pour sécuriser votre place. Visitez notre campus ou postulez en ligne dès aujourd\'hui pour bénéficier de nos offres early-bird.',
                    'en' => 'We are thrilled to announce that registration for the upcoming academic year is officially open! Whether you are interested in our Computer Science, Management, or Health programs, now is the perfect time to secure your spot. Visit our campus or apply online today to take advantage of our early-bird offers.',
                ],
                'image' => 'storage/formations/anglais.png', 
                'published_at' => now()->subDays(2),
                'is_published' => true,
            ],
            [
                'title' => [
                    'fr' => 'Nouveau partenariat avec TechVision Cameroun',
                    'en' => 'New Partnership with TechVision Cameroon',
                ],
                'slug' => 'partenariat-techvision-cameroun',
                'content' => [
                    'fr' => 'AcadEcol est fière de s\'associer à TechVision Cameroun, une entreprise leader dans le développement de logiciels. Ce partenariat offrira à nos étudiants des opportunités de stages exclusifs, des ateliers pratiques et un accès direct aux dernières technologies de l\'industrie. Ensemble, nous formons les leaders technologiques de demain.',
                    'en' => 'AcadEcol is proud to partner with TechVision Cameroon, a leading software development company. This partnership will provide our students with exclusive internship opportunities, hands-on workshops, and direct access to the latest industry technologies. Together, we are training tomorrow\'s technology leaders.',
                ],
                'image' => 'storage/formations/data_analyst.png',
                'published_at' => now()->subDays(10),
                'is_published' => true,
            ],
            [
                'title' => [
                    'fr' => 'Succès éclatant lors de la cérémonie de remise des diplômes',
                    'en' => 'Resounding Success at the Graduation Ceremony',
                ],
                'slug' => 'succes-ceremonie-diplomes',
                'content' => [
                    'fr' => 'Félicitations à notre promotion 2025 ! La cérémonie de remise des diplômes qui s\'est tenue le week-end dernier a été un moment de fierté et d\'émotion pour les étudiants, les familles et le corps professoral. Nous souhaitons à tous nos diplômés beaucoup de succès dans leurs futures carrières professionnelles.',
                    'en' => 'Congratulations to our Class of 2025! The graduation ceremony held last weekend was a moment of pride and emotion for students, families, and faculty. We wish all our graduates great success in their future professional careers.',
                ],
                'image' => 'storage/formations/humanitaire.jpg',
                'published_at' => now()->subDays(20),
                'is_published' => true,
            ],
            [
                'title' => [
                    'fr' => 'Lancement de la nouvelle formation en Intelligence Artificielle',
                    'en' => 'Launch of New Artificial Intelligence Training',
                ],
                'slug' => 'lancement-formation-ia',
                'content' => [
                    'fr' => 'L\'avenir est là ! AcadEcol lance une nouvelle formation spécialisée en Intelligence Artificielle et Machine Learning. Ce programme intensif de 6 mois couvrira les bases de Python, les réseaux de neurones et les applications pratiques de l\'IA. Inscrivez-vous dès maintenant pour être à la pointe de l\'innovation.',
                    'en' => 'The future is here! AcadEcol is launching a new specialized training in Artificial Intelligence and Machine Learning. This intensive 6-month program will cover Python basics, neural networks, and practical AI applications. Register now to be at the forefront of innovation.',
                ],
                'image' => 'storage/formations/ia professionel sante.jpg',
                'published_at' => now()->subDays(5),
                'is_published' => true,
            ],
            [
                'title' => [
                    'fr' => 'Journées Portes Ouvertes : Venez nous rencontrer !',
                    'en' => 'Open Days: Come Meet Us!',
                ],
                'slug' => 'journees-portes-ouvertes',
                'content' => [
                    'fr' => 'Vous hésitez sur votre orientation ? Venez découvrir notre campus, rencontrer nos formateurs et échanger avec nos étudiants actuels lors de nos journées portes ouvertes les 15 et 16 mars. Des visites guidées et des sessions d\'information seront organisées toute la journée.',
                    'en' => 'Unsure about your career path? Come discover our campus, meet our trainers, and chat with current students during our open days on March 15th and 16th. Guided tours and information sessions will be organized throughout the day.',
                ],
                'image' => 'storage/formations/auxiliaire_vie.png',
                'published_at' => now()->addDays(2),
                'is_published' => true,
            ],
             [
                'title' => [
                    'fr' => 'Séminaire sur l\'Entrepreneuriat Digital',
                    'en' => 'Seminar on Digital Entrepreneurship',
                ],
                'slug' => 'seminaire-entrepreneuriat-digital',
                'content' => [
                    'fr' => 'Ne manquez pas notre grand séminaire sur l\'entrepreneuriat digital ce samedi. Des experts du domaine partageront leurs expériences et conseils pour lancer votre propre business en ligne. Entrée gratuite pour tous les étudiants d\'AcadEcol.',
                    'en' => 'Don\'t miss our major seminar on digital entrepreneurship this Saturday. Industry experts will share their experiences and tips for launching your own online business. Free entry for all AcadEcol students.',
                ],
                'image' => 'storage/formations/gestion de projets humanitaire.jpg',
                'published_at' => now()->subDays(1),
                'is_published' => true,
            ],
        ];

        foreach ($newsItems as $item) {
            News::firstOrCreate(['slug' => $item['slug']], $item);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Formation;
use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    public function run(): void
    {
        // Récupérer toutes les formations
        $formations = Formation::all();
        
        $modulesTemplates = [
            // Modules pour Informatique
            [
                'titre' => ['fr' => 'Fondamentaux de la Programmation', 'en' => 'Programming Fundamentals'],
                'contenu' => [
                    'fr' => 'Introduction aux concepts de base : variables, boucles, conditions. Vous apprendrez les principes fondamentaux de la programmation structurée et les bonnes pratiques.',
                    'en' => 'Introduction to basic concepts: variables, loops, conditions. You will learn the fundamentals of structured programming and best practices.'
                ]
            ],
            [
                'titre' => ['fr' => 'Architecture et Design Patterns', 'en' => 'Architecture and Design Patterns'],
                'contenu' => [
                    'fr' => 'Conception d\'applications robustes et scalables. Patterns de conception : MVC, Repository, Singleton, Observer.',
                    'en' => 'Design robust and scalable applications. Design patterns: MVC, Repository, Singleton, Observer.'
                ]
            ],
            [
                'titre' => ['fr' => 'Bases de Données', 'en' => 'Databases'],
                'contenu' => [
                    'fr' => 'SQL, normalisation, optimisation des requêtes. Travail avec MySQL, PostgreSQL et NoSQL.',
                    'en' => 'SQL, normalization, query optimization. Working with MySQL, PostgreSQL and NoSQL.'
                ]
            ],
            [
                'titre' => ['fr' => 'Développement Front-End', 'en' => 'Front-End Development'],
                'contenu' => [
                    'fr' => 'HTML, CSS, JavaScript. Frameworks modernes : React, Vue.js. Responsive design et accessibilité.',
                    'en' => 'HTML, CSS, JavaScript. Modern frameworks: React, Vue.js. Responsive design and accessibility.'
                ]
            ],
            [
                'titre' => ['fr' => 'Développement Back-End', 'en' => 'Back-End Development'],
                'contenu' => [
                    'fr' => 'Laravel, Node.js, Python. APIs REST, authentification, gestion des sessions.',
                    'en' => 'Laravel, Node.js, Python. REST APIs, authentication, session management.'
                ]
            ],
            [
                'titre' => ['fr' => 'Déploiement et DevOps', 'en' => 'Deployment and DevOps'],
                'contenu' => [
                    'fr' => 'Docker, Kubernetes, CI/CD. Déploiement en production et gestion des serveurs.',
                    'en' => 'Docker, Kubernetes, CI/CD. Production deployment and server management.'
                ]
            ],
            [
                'titre' => ['fr' => 'Tests et Qualité', 'en' => 'Testing and Quality'],
                'contenu' => [
                    'fr' => 'Unit testing, intégration testing, couverture de code. Jest, PHPUnit, Pytest.',
                    'en' => 'Unit testing, integration testing, code coverage. Jest, PHPUnit, Pytest.'
                ]
            ],
            [
                'titre' => ['fr' => 'Projet Capstone', 'en' => 'Capstone Project'],
                'contenu' => [
                    'fr' => 'Développement d\'une application complète du concept à la production.',
                    'en' => 'Development of a complete application from concept to production.'
                ]
            ],
            // Modules pour Santé
            [
                'titre' => ['fr' => 'Anatomie et Physiologie', 'en' => 'Anatomy and Physiology'],
                'contenu' => [
                    'fr' => 'Étude du corps humain, systèmes organiques, physiologie et pathologies courantes.',
                    'en' => 'Study of the human body, organ systems, physiology and common pathologies.'
                ]
            ],
            [
                'titre' => ['fr' => 'Pharmacologie', 'en' => 'Pharmacology'],
                'contenu' => [
                    'fr' => 'Étude des médicaments, dosages, interactions et effets secondaires.',
                    'en' => 'Study of medications, dosages, interactions and side effects.'
                ]
            ],
            [
                'titre' => ['fr' => 'Techniques de Soins', 'en' => 'Care Techniques'],
                'contenu' => [
                    'fr' => 'Protocoles de soins, hygiène, stérilisation et prévention des infections.',
                    'en' => 'Care protocols, hygiene, sterilization and infection prevention.'
                ]
            ],
            [
                'titre' => ['fr' => 'Communication Clinique', 'en' => 'Clinical Communication'],
                'contenu' => [
                    'fr' => 'Communication avec les patients, empathie, gestion du stress.',
                    'en' => 'Communication with patients, empathy, stress management.'
                ]
            ],
            // Modules pour Commerce
            [
                'titre' => ['fr' => 'Comptabilité Générale', 'en' => 'General Accounting'],
                'contenu' => [
                    'fr' => 'Enregistrement des opérations, balance générale, états financiers.',
                    'en' => 'Recording operations, general ledger, financial statements.'
                ]
            ],
            [
                'titre' => ['fr' => 'Gestion Financière', 'en' => 'Financial Management'],
                'contenu' => [
                    'fr' => 'Budgets, trésorerie, investissements et financement.',
                    'en' => 'Budgets, cash flow, investments and financing.'
                ]
            ],
            [
                'titre' => ['fr' => 'Marketing Stratégique', 'en' => 'Strategic Marketing'],
                'contenu' => [
                    'fr' => 'Étude de marché, positionnement, plans marketing.',
                    'en' => 'Market research, positioning, marketing plans.'
                ]
            ],
            [
                'titre' => ['fr' => 'Gestion des Ressources Humaines', 'en' => 'HR Management'],
                'contenu' => [
                    'fr' => 'Recrutement, formation, évaluation, conflits du travail.',
                    'en' => 'Recruitment, training, evaluation, workplace conflicts.'
                ]
            ],
        ];
        
        $ordre = 1;
        foreach ($formations as $formation) {
            // Créer 3 à 5 modules par formation
            $numModules = rand(3, 5);
            for ($i = 0; $i < $numModules; $i++) {
                $template = $modulesTemplates[array_rand($modulesTemplates)];
                Module::create([
                    'formation_id' => $formation->id,
                    'titre' => $template['titre'],
                    'contenu' => $template['contenu'],
                    'ordre' => $i + 1,
                ]);
            }
        }
    }
}

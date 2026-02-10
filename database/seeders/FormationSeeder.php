<?php

namespace Database\Seeders;

use App\Models\Formation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $formations = [
            // ===== CATÉGORIE 1: LES LANGUES (ID 1) =====
            [
                'titre' => ['fr' => 'Français Intégration (A1-A2)', 'en' => 'French Integration (A1-A2)'],
                'slug' => 'francais-integration',
                'description_courte' => ['fr' => 'Bases essentielles pour communiquer au quotidien.', 'en' => 'Essential basics for daily communication.'],
                'description_complete' => ['fr' => 'Idéal pour les débutants. Ce cours vous donne les clés pour vous exprimer en français : se présenter, faire des achats, comprendre des instructions simples et interagir avec l\'administration ou les locaux. Méthode interactive axée sur la pratique orale.', 'en' => 'Ideal for beginners. This course gives you the keys to express yourself in French: introducing yourself, shopping, understanding simple instructions, and interacting with administration or locals. Interactive method focused on oral practice.'],
                'debouches' => ['fr' => 'Intégration sociale, accès aux emplois de base', 'en' => 'Social integration, access to basic jobs'],
                'prerequis' => ['fr' => 'Aucun', 'en' => 'None'],
                'prix' => 150000.00,
                'duree' => '3 mois',
                'category_id' => 1,
                'is_featured' => true
            ],
            [
                'titre' => ['fr' => 'Anglais Professionnel (B1-B2)', 'en' => 'Professional English (B1-B2)'],
                'slug' => 'anglais-pro',
                'description_courte' => ['fr' => 'Boostez votre employabilité avec l\'anglais des affaires.', 'en' => 'Boost your employability with business English.'],
                'description_complete' => ['fr' => 'Ne laissez plus la langue être une barrière. Apprenez à rédiger des emails professionnels, participer à des réunions internationales et négocier en anglais. Vocabulaire spécifique au monde de l\'entreprise.', 'en' => 'Don\'t let language be a barrier anymore. Learn to write professional emails, participate in international meetings, and negotiate in English. Vocabulary specific to the corporate world.'],
                'debouches' => ['fr' => 'Multinationales, ONG, Tourisme', 'en' => 'Multinationals, NGOs, Tourism'],
                'prerequis' => ['fr' => 'Niveau A2 (Bases)', 'en' => 'Level A2 (Basics)'],
                'prix' => 180000.00,
                'duree' => '4 mois',
                'category_id' => 1
            ],
            [
                'titre' => ['fr' => 'Préparation TOEFL & TOEIC', 'en' => 'TOEFL & TOEIC Prep'],
                'slug' => 'toefl-toeic',
                'description_courte' => ['fr' => 'Objectif score maximum pour vos projets internationaux.', 'en' => 'Maximum score goal for your international projects.'],
                'description_complete' => ['fr' => 'Entraînement intensif sur des sujets d\'examen réels. Stratégies de gestion du temps, pièges à éviter et examens blancs réguliers pour garantir votre admission en université étrangère ou votre recrutement.', 'en' => 'Intensive training on real exam topics. Time management strategies, pitfalls to avoid, and regular mock exams to guarantee your admission to a foreign university or your recruitment.'],
                'debouches' => ['fr' => 'Études à l\'étranger, Carrière internationale', 'en' => 'Studies abroad, International career'],
                'prerequis' => ['fr' => 'Niveau B1', 'en' => 'Level B1'],
                'prix' => 220000.00,
                'duree' => '3 mois',
                'category_id' => 1,
                'is_featured' => true
            ],
            [
                'titre' => ['fr' => 'Allemand pour Études (Start Deutsch)', 'en' => 'German for Studies (Start Deutsch)'],
                'slug' => 'allemand-a1-b1',
                'description_courte' => ['fr' => 'Préparez votre départ pour l\'Allemagne.', 'en' => 'Prepare your departure for Germany.'],
                'description_complete' => ['fr' => 'Cours structuré pour atteindre rapidement le niveau requis pour les visas étudiants ou le regroupement familial (A1 à B1).Focus sur la grammaire et la compréhension écrite.', 'en' => 'Structured course to quickly reach the level required for student visas or family reunification (A1 to B1). Focus on grammar and reading comprehension.'],
                'debouches' => ['fr' => 'Université en Allemagne, Au Pair', 'en' => 'University in Germany, Au Pair'],
                'prerequis' => ['fr' => 'Motivation', 'en' => 'Motivation'],
                'prix' => 160000.00,
                'duree' => '4 mois',
                'category_id' => 1
            ],
            [
                'titre' => ['fr' => 'Chinois des Affaires', 'en' => 'Business Chinese'],
                'slug' => 'chinois-business',
                'description_courte' => ['fr' => 'Commercer avec la Chine efficacement.', 'en' => 'Trade with China effectively.'],
                'description_complete' => ['fr' => 'Initiation au Mandarin et à la culture des affaires chinoise. Apprenez les codes de politesse, le vocabulaire de l\'import-export et les bases de la négociation.', 'en' => 'Introduction to Mandarin and Chinese business culture. Learn politeness codes, import-export vocabulary, and negotiation basics.'],
                'debouches' => ['fr' => 'Import-Export, Interprétariat', 'en' => 'Import-Export, Interpreting'],
                'prerequis' => ['fr' => 'Aucun', 'en' => 'None'],
                'prix' => 180000.00,
                'duree' => '5 mois',
                'category_id' => 1
            ],

            // ===== CATÉGORIE 2: PARAMÉDICAL ET BIOMÉDICAL (ID 2) =====
            [
                'titre' => ['fr' => 'Vendeur en Pharmacie', 'en' => 'Pharmacy Sales Assistant'],
                'slug' => 'vendeur-pharmacie',
                'description_courte' => ['fr' => 'Devenez le bras droit du pharmacien.', 'en' => 'Become the pharmacist\'s right hand.'],
                'description_complete' => ['fr' => 'Formation pratique : apprenez à lire les ordonnances, conseiller les patients, gérer les stocks de médicaments et utiliser les logiciels d\'officine. Diplôme reconnu pour une insertion rapide.', 'en' => 'Practical training: learn to read prescriptions, advise patients, manage drug stocks, and use pharmacy software. Recognized diploma for rapid insertion.'],
                'debouches' => ['fr' => 'Pharmacies, Dépôts de médicaments', 'en' => 'Pharmacies, Drug depots'],
                'prerequis' => ['fr' => 'Niveau Bac', 'en' => 'Bac Level'],
                'prix' => 350000.00,
                'duree' => '12 mois',
                'category_id' => 2,
                'is_featured' => true
            ],
            [
                'titre' => ['fr' => 'Délégué Médical', 'en' => 'Medical Representative'],
                'slug' => 'delegue-medical',
                'description_courte' => ['fr' => 'Promotion des produits de santé.', 'en' => 'Promotion of health products.'],
                'description_complete' => ['fr' => 'Alliez science et commerce. Formez-vous aux techniques de vente, à la pharmacologie et à la communication pour convaincre les médecins et pharmaciens.', 'en' => 'Combine science and commerce. Train in sales techniques, pharmacology, and communication to convince doctors and pharmacists.'],
                'debouches' => ['fr' => 'Laboratoires, Grossistes répartiteurs', 'en' => 'Laboratories, Wholesalers'],
                'prerequis' => ['fr' => 'Bac Scientifique ou Santé', 'en' => 'Science or Health Bac'],
                'prix' => 300000.00,
                'duree' => '9 mois',
                'category_id' => 2
            ],
            [
                'titre' => ['fr' => 'Auxiliaire de Vie', 'en' => 'Caregiver'],
                'slug' => 'auxiliaire-vie',
                'description_courte' => ['fr' => 'Accompagnement des personnes fragiles.', 'en' => 'Support for vulnerable people.'],
                'description_complete' => ['fr' => 'Apprenez les gestes qui sauvent et qui soulagent. Soins d\'hygiène, aide aux repas, soutien psychologique pour personnes âgées ou malades. Un métier humain et très demandé.', 'en' => 'Learn gestures that save and soothe. Hygiene care, meal assistance, psychological support for the elderly or sick. A human and highly demanded profession.'],
                'debouches' => ['fr' => 'EHPAD, Soins à domicile', 'en' => 'Nursing homes, Home care'],
                'prerequis' => ['fr' => 'BEPC/CAP', 'en' => 'GCE O-Level'],
                'prix' => 280000.00,
                'duree' => '12 mois',
                'category_id' => 2,
                'is_featured' => true
            ],
            [
                'titre' => ['fr' => 'Maintenance Biomédicale', 'en' => 'Biomedical Maintenance'],
                'slug' => 'maintenance-bio',
                'description_courte' => ['fr' => 'Réparer les équipements qui sauvent des vies.', 'en' => 'Repair life-saving equipment.'],
                'description_complete' => ['fr' => 'Expertise technique rare. Installation et maintenance de scanners, échographes, respirateurs. Devenez indispensable dans les hôpitaux modernes.', 'en' => 'Rare technical expertise. Installation and maintenance of scanners, ultrasound machines, ventilators. Become indispensable in modern hospitals.'],
                'debouches' => ['fr' => 'Services techniques hôpitaux, Fournisseurs', 'en' => 'Hospital technical services, Suppliers'],
                'prerequis' => ['fr' => 'Bac F2/F3/C/D', 'en' => 'Technical Bac'],
                'prix' => 320000.00,
                'duree' => '12 mois',
                'category_id' => 2
            ],
            [
                'titre' => ['fr' => 'Technicien de Laboratoire', 'en' => 'Lab Technician'],
                'slug' => 'technicien-labo',
                'description_courte' => ['fr' => 'L\'analyse au service du diagnostic.', 'en' => 'Analysis at the service of diagnosis.'],
                'description_complete' => ['fr' => 'Maîtrisez les techniques de prélèvement et d\'analyse biologique (sang, urines, etc.). Rigueur et précision pour aider les médecins à établir le bon diagnostic.', 'en' => 'Master sampling and biological analysis techniques (blood, urine, etc.). Rigor and precision to help doctors establish the correct diagnosis.'],
                'debouches' => ['fr' => 'Laboratoires d\'analyses médicales', 'en' => 'Medical analysis laboratories'],
                'prerequis' => ['fr' => 'Bac Scientifique (C, D)', 'en' => 'Science Bac (C, D)'],
                'prix' => 260000.00,
                'duree' => '9 mois',
                'category_id' => 2
            ],

            // ===== CATÉGORIE 3: L'HUMANITAIRE (ID 3) =====
            [
                'titre' => ['fr' => 'Gestion de Projets Humanitaires', 'en' => 'Humanitarian Project Mgmt'],
                'slug' => 'projet-humanitaire',
                'description_courte' => ['fr' => 'Piloter l\'aide d\'urgence.', 'en' => 'Manage emergency aid.'],
                'description_complete' => ['fr' => 'De l\'écriture du projet à son évaluation. Apprenez à monter des dossiers de financement, gérer un budget et coordonner des équipes sur le terrain. Pour les futurs cadres des ONG.', 'en' => 'From project writing to evaluation. Learn to prepare funding proposals, manage a budget, and coordinate teams in the field. For future NGO executives.'],
                'debouches' => ['fr' => 'Coordinateur ONG, Chef de mission', 'en' => 'NGO Coordinator, Head of Mission'],
                'prerequis' => ['fr' => 'Licence min.', 'en' => 'Bachelor min.'],
                'prix' => 190000.00,
                'duree' => '3 mois',
                'category_id' => 3,
                'is_featured' => true
            ],
            [
                'titre' => ['fr' => 'Logistique Humanitaire', 'en' => 'Humanitarian Logistics'],
                'slug' => 'logistique-huma',
                'description_courte' => ['fr' => 'L\'épine dorsale de l\'intervention.', 'en' => 'The backbone of intervention.'],
                'description_complete' => ['fr' => 'Comment acheminer des vivres et médicaments en zone isolée ? Gestion de flotte, 4x4, télécoms, chaîne du froid et approvisionnement. Formation 100% terrain.', 'en' => 'How to transport food and medicine to isolated areas? Fleet management, 4x4, telecoms, cold chain, and procurement. 100% field training.'],
                'debouches' => ['fr' => 'Logisticien base/terrain', 'en' => 'Base/Field Logistician'],
                'prerequis' => ['fr' => 'Bac +2', 'en' => 'Associate Degree'],
                'prix' => 170000.00,
                'duree' => '3 mois',
                'category_id' => 3
            ],
            [
                'titre' => ['fr' => 'WASH (Eau & Assainissement)', 'en' => 'WASH Specialist'],
                'slug' => 'wash',
                'description_courte' => ['fr' => 'L\'eau c\'est la vie.', 'en' => 'Water is life.'],
                'description_complete' => ['fr' => 'Techniques de potabilisation, construction de latrines d\'urgence, promotion de l\'hygiène. Devenez technicien spécialisé dans la prévention des maladies hydriques.', 'en' => 'Purification techniques, emergency latrine construction, hygiene promotion. Become a specialized technician in waterborne disease prevention.'],
                'debouches' => ['fr' => 'Technicien WASH, Superviseur', 'en' => 'WASH Technician, Supervisor'],
                'prerequis' => ['fr' => 'Bac Technique', 'en' => 'Technical Bac'],
                'prix' => 160000.00,
                'duree' => '2 mois',
                'category_id' => 3
            ],
            [
                'titre' => ['fr' => 'Santé Mentale & Soutien Psychosocial', 'en' => 'MHPSS'],
                'slug' => 'sante-mentale',
                'description_courte' => ['fr' => 'Soigner les traumatismes invisibles.', 'en' => 'Heal invisible traumas.'],
                'description_complete' => ['fr' => 'Intervention en zone de conflit ou de catastrophe. Premiers secours psychologiques, gestion du stress post-traumatique et accompagnement des victimes.', 'en' => 'Intervention in conflict or disaster zones. Psychological first aid, post-traumatic stress management, and victim support.'],
                'debouches' => ['fr' => 'Psychologue humanitaire, Assistant social', 'en' => 'Humanitarian Psychologist, Social Worker'],
                'prerequis' => ['fr' => 'Licence Psycho/Socio', 'en' => 'Bachelor Psych/Soc'],
                'prix' => 180000.00,
                'duree' => '2.5 mois',
                'category_id' => 3
            ],
            [
                'titre' => ['fr' => 'Nutrition en Situation d\'Urgence', 'en' => 'Emergency Nutrition'],
                'slug' => 'nutrition-urgence',
                'description_courte' => ['fr' => 'Combattre la malnutrition.', 'en' => 'Fight malnutrition.'],
                'description_complete' => ['fr' => 'Dépistage de la malnutrition aiguë, prise en charge nutritionnelle (CRENAS/CRENI), programmes d\'alimentation thérapeutique.', 'en' => 'Screening for acute malnutrition, nutritional management (CRENAS/CRENI), therapeutic feeding programs.'],
                'debouches' => ['fr' => 'Nutritionniste projet, Assistant nutri', 'en' => 'Project Nutritionist, Nutri Assistant'],
                'prerequis' => ['fr' => 'Formation santé', 'en' => 'Health training'],
                'prix' => 175000.00,
                'duree' => '2.5 mois',
                'category_id' => 3
            ],

            // ===== CATÉGORIE 4: NUMÉRIQUE EN SANTÉ (ID 4) =====
            [
                'titre' => ['fr' => 'Data Analyst Santé', 'en' => 'Health Data Analyst'],
                'slug' => 'data-sante',
                'description_courte' => ['fr' => 'Faire parler les données médicales.', 'en' => 'Make medical data speak.'],
                'description_complete' => ['fr' => 'Maîtrisez les outils (DHIS2, Excel Avancé, PowerBI) pour collecter et analyser les staistiques sanitaires. Profil très recherché par les ministères et les grandes ONG.', 'en' => 'Master tools (DHIS2, Advanced Excel, PowerBI) to collect and analyze health statistics. Highly sought-after profile by ministries and major NGOs.'],
                'debouches' => ['fr' => 'Data Manager, Statisticien', 'en' => 'Data Manager, Statistician'],
                'prerequis' => ['fr' => 'Aisance informatique', 'en' => 'Computer literacy'],
                'prix' => 240000.00,
                'duree' => '4 mois',
                'category_id' => 4,
                'is_featured' => true
            ],
            [
                'titre' => ['fr' => 'SIG - Cartographie Sanitaire', 'en' => 'GIS Health Mapping'],
                'slug' => 'sig-sante',
                'description_courte' => ['fr' => 'Visualiser les enjeux de santé.', 'en' => 'Visualize health issues.'],
                'description_complete' => ['fr' => 'Apprenez à créer des cartes pour suivre des épidémies ou planifier l\'implantation de centres de santé avec QGIS et GPS.', 'en' => 'Learn to create maps to track epidemics or plan the location of health centers with QGIS and GPS.'],
                'debouches' => ['fr' => 'Chargé d\'études géographiques', 'en' => 'Geographic Studies Officer'],
                'prerequis' => ['fr' => 'Bac', 'en' => 'Bac'],
                'prix' => 200000.00,
                'duree' => '3 mois',
                'category_id' => 4
            ],
            [
                'titre' => ['fr' => 'e-Santé & Télémédecine', 'en' => 'e-Health'],
                'slug' => 'e-sante',
                'description_courte' => ['fr' => 'La santé à l\'ère du numérique.', 'en' => 'Health in the digital age.'],
                'description_complete' => ['fr' => 'Comprendre les enjeux de la santé digitale : dossier patient informatisé, téléconsultation, mHealth (santé mobile).', 'en' => 'Understand the challenges of digital health: electronic patient record, teleconsultation, mHealth (mobile health).'],
                'debouches' => ['fr' => 'Consultant e-Santé', 'en' => 'e-Health Consultant'],
                'prerequis' => ['fr' => 'Informatique/Santé', 'en' => 'IT/Health'],
                'prix' => 220000.00,
                'duree' => '3 mois',
                'category_id' => 4
            ],

            // ===== CATÉGORIE 5: MANAGEMENT & RECHERCHE (ID 5) =====
            [
                'titre' => ['fr' => 'Assistant de Recherche', 'en' => 'Research Assistant'],
                'slug' => 'assistant-recherche',
                'description_courte' => ['fr' => 'Au cœur de l\'enquête scientifique.', 'en' => 'At the heart of scientific inquiry.'],
                'description_complete' => ['fr' => 'Formation aux méthodologies d\'enquête : rédaction de protocoles, collecte de données sur le terrain (ODK, Kobo), éthique de la recherche.', 'en' => 'Training in survey methodologies: protocol writing, field data collection (ODK, Kobo), research ethics.'],
                'debouches' => ['fr' => 'Enquêteur, Assistant de recherche', 'en' => 'Surveyor, Research Assistant'],
                'prerequis' => ['fr' => 'Licence Sciences Sociales/Santé', 'en' => 'Social Sciences/Health Bachelor'],
                'prix' => 210000.00,
                'duree' => '3 mois',
                'category_id' => 5
            ],
            [
                'titre' => ['fr' => 'Suivi & Évaluation (S&E)', 'en' => 'Monitoring & Evaluation (M&E)'],
                'slug' => 'suivi-eval',
                'description_courte' => ['fr' => 'Mesurer la performance.', 'en' => 'Measure performance.'],
                'description_complete' => ['fr' => 'Devenez l\'œil expert des projets. Définition d\'indicateurs, tableaux de bord de suivi, rapports de performance pour les bailleurs.', 'en' => 'Become the expert eye of projects. Indicator definition, monitoring dashboards, performance reports for donors.'],
                'debouches' => ['fr' => 'Chargé de S&E', 'en' => 'M&E Officer'],
                'prerequis' => ['fr' => 'Licence/Master', 'en' => 'Bachelor/Master'],
                'prix' => 200000.00,
                'duree' => '3 mois',
                'category_id' => 5,
                'is_featured' => true
            ],
        ];

        foreach ($formations as $formation) {
            Formation::create($formation);
        }
    }
}

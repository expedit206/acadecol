<?php

namespace Database\Seeders;

use App\Models\Formation;
use Illuminate\Database\Seeder;

class FormationSeeder extends Seeder
{
    public function run(): void
    {
        $formations = [
            // ===== CATÉGORIE 1: LES LANGUES =====
            [
                'titre' => ['fr' => 'Français (A1-C2)', 'en' => 'French (A1-C2)'],
                'slug' => 'francais',
                'badge' => 'Certificat',
                'description_courte' => ['fr' => 'Tous niveaux (A1, A2, B1, B2, C1, C2)', 'en' => 'All levels (A1, A2, B1, B2, C1, C2)'],
                'description_complete' => ['fr' => 'Formation complète en français pour tous les niveaux. Préparation aux examens DELF/DALF.', 'en' => 'Complete French training for all levels. Preparation for DELF/DALF exams.'],
                'debouches' => ['fr' => 'Enseignement, Traduction, Administration', 'en' => 'Teaching, Translation, Administration'],
                'prerequis' => ['fr' => 'Aucun', 'en' => 'None'],
                'prix' => null,
                'duree' => '3-6 mois',
                'category_id' => 1
            ],
            [
                'titre' => ['fr' => 'Anglais (A1-C2)', 'en' => 'English (A1-C2)'],
                'slug' => 'anglais',
                'badge' => 'Certificat',
                'description_courte' => ['fr' => 'Formation à la carte et Préparation TOEFL/TOEIC/IELTS', 'en' => 'Custom training and TOEFL/TOEIC/IELTS Preparation'],
                'description_complete' => ['fr' => 'Anglais général et professionnel. Préparation intensive aux certifications internationales.', 'en' => 'General and professional English. Intensive preparation for international certifications.'],
                'debouches' => ['fr' => 'Organisations Internationales, Tourisme', 'en' => 'International Organizations, Tourism'],
                'prerequis' => ['fr' => 'Aucun', 'en' => 'None'],
                'prix' => null,
                'duree' => '3-6 mois',
                'category_id' => 1
            ],
            [
                'titre' => ['fr' => 'Espagnol (A1-C1)', 'en' => 'Spanish (A1-C1)'],
                'slug' => 'espagnol',
                'badge' => 'Certificat',
                'description_courte' => ['fr' => 'Niveaux A1, A2, B1, B2, C1', 'en' => 'Levels A1, A2, B1, B2, C1'],
                'description_complete' => ['fr' => 'Apprentissage de l\'espagnol pour la communication quotidienne et professionnelle.', 'en' => 'Learning Spanish for daily and professional communication.'],
                'debouches' => ['fr' => 'Commerce, Tourisme', 'en' => 'Trade, Tourism'],
                'prerequis' => ['fr' => 'Aucun', 'en' => 'None'],
                'prix' => null,
                'duree' => '3-6 mois',
                'category_id' => 1
            ],
            [
                'titre' => ['fr' => 'Allemand (A1-C1)', 'en' => 'German (A1-C1)'],
                'slug' => 'allemand',
                'badge' => 'Certificat',
                'description_courte' => ['fr' => 'Niveaux A1, A2, B1, B2, C1', 'en' => 'Levels A1, A2, B1, B2, C1'],
                'description_complete' => ['fr' => 'Maîtrise de l\'allemand pour études ou travail en pays germanophones.', 'en' => 'Mastering German for studies or work in German-speaking countries.'],
                'debouches' => ['fr' => 'Études en Allemagne, Ingénierie', 'en' => 'Studies in Germany, Engineering'],
                'prerequis' => ['fr' => 'Aucun', 'en' => 'None'],
                'prix' => null,
                'duree' => '3-6 mois',
                'category_id' => 1
            ],
            [
                'titre' => ['fr' => 'Italien (A1-C2)', 'en' => 'Italian (A1-C2)'],
                'slug' => 'italien',
                'badge' => 'Certificat',
                'description_courte' => ['fr' => 'Niveaux A1, A2, B1, B2, C1, C2', 'en' => 'Levels A1, A2, B1, B2, C1, C2'],
                'description_complete' => ['fr' => 'Langue et culture italienne pour le voyage ou les affaires.', 'en' => 'Italian language and culture for travel or business.'],
                'debouches' => ['fr' => 'Art, Mode, Gastronomie', 'en' => 'Art, Fashion, Gastronomy'],
                'prerequis' => ['fr' => 'Aucun', 'en' => 'None'],
                'prix' => null,
                'duree' => '3-6 mois',
                'category_id' => 1
            ],
            [
                'titre' => ['fr' => 'Chinois (A1-C1)', 'en' => 'Chinese (A1-C1)'],
                'slug' => 'chinois',
                'badge' => 'Certificat',
                'description_courte' => ['fr' => 'Niveaux A1, A2, B1, B2, C1', 'en' => 'Levels A1, A2, B1, B2, C1'],
                'description_complete' => ['fr' => 'Mandarin pour les affaires et les échanges internationaux.', 'en' => 'Mandarin for business and international exchanges.'],
                'debouches' => ['fr' => 'Commerce international', 'en' => 'International Trade'],
                'prerequis' => ['fr' => 'Aucun', 'en' => 'None'],
                'prix' => null,
                'duree' => '3-6 mois',
                'category_id' => 1
            ],

            // ===== CATÉGORIE 2: PARAMÉDICAL (DIPLÔMES 12 MOIS) =====
            [
                'titre' => ['fr' => 'Délégué ou Visiteur Médical', 'en' => 'Medical Delegate'],
                'slug' => 'delegue-medical',
                'badge' => 'Diplôme d\'État',
                'description_courte' => ['fr' => 'Formation de 12 mois', 'en' => '12-month training'],
                'description_complete' => ['fr' => 'Formation professionnelle pour devenir l\'intermédiaire privilégié entre les laboratoires et les professionnels de santé.', 'en' => 'Professional training to become the privileged intermediary between laboratories and healthcare professionals.'],
                'debouches' => ['fr' => 'Laboratoires pharmaceutiques', 'en' => 'Pharmaceutical laboratories'],
                'prerequis' => ['fr' => 'Baccalauréat', 'en' => 'Baccalaureate'],
                'prix' => 300000,
                'duree' => '12 mois',
                'category_id' => 2,
                'is_featured' => true
            ],
            [
                'titre' => ['fr' => 'Auxiliaire de Vie', 'en' => 'Care Giver'],
                'slug' => 'auxiliaire-vie',
                'badge' => 'Diplôme d\'État',
                'description_courte' => ['fr' => 'Formation de 12 mois', 'en' => '12-month training'],
                'description_complete' => ['fr' => 'Accompagnement des personnes fragiles, soins d\'hygiène et confort.', 'en' => 'Support for fragile people, hygiene and comfort care.'],
                'debouches' => ['fr' => 'Domicile, EHPAD, Hôpitaux', 'en' => 'Home care, Nursing homes, Hospitals'],
                'prerequis' => ['fr' => 'BEPC', 'en' => 'GCE Ordinary Level'],
                'prix' => 280000,
                'duree' => '12 mois',
                'category_id' => 2,
                'is_featured' => true
            ],
            [
                'titre' => ['fr' => 'Maintenance Biomédicale', 'en' => 'Biomedical Maintenance'],
                'slug' => 'maintenance-biomedicale',
                'badge' => 'Diplôme d\'État',
                'description_courte' => ['fr' => 'Formation de 12 mois', 'en' => '12-month training'],
                'description_complete' => ['fr' => 'Maintenance préventive et curative des équipements médicaux.', 'en' => 'Preventive and curative maintenance of medical equipment.'],
                'debouches' => ['fr' => 'Hôpitaux, Cliniques, Fournisseurs', 'en' => 'Hospitals, Clinics, Suppliers'],
                'prerequis' => ['fr' => 'Bac Technique/Scientifique', 'en' => 'Technical/Scientific Bac'],
                'prix' => 320000,
                'duree' => '12 mois',
                'category_id' => 2
            ],

            // ===== CATÉGORIE 3: HUMANITAIRE =====
            [
                'titre' => ['fr' => 'Les Bases de l\'Humanitaire', 'en' => 'Fundamentals of Humanitarian'],
                'slug' => 'bases-humanitaire',
                'badge' => 'Certificat',
                'description_courte' => ['fr' => 'En ligne', 'en' => 'Online'],
                'description_complete' => ['fr' => 'Comprendre l\'écosystème humanitaire, ses principes et ses acteurs.', 'en' => 'Understand the humanitarian ecosystem, its principles and actors.'],
                'debouches' => ['fr' => 'ONG', 'en' => 'NGOs'],
                'prerequis' => ['fr' => 'Aucun', 'en' => 'None'],
                'prix' => 150000,
                'duree' => '2 mois',
                'category_id' => 3
            ],
            [
                'titre' => ['fr' => 'Épidémiologie de Terrain et Urgences Sanitaires', 'en' => 'Field Epidemiology and Health Emergencies'],
                'slug' => 'epidemiologie-terrain',
                'badge' => 'Certificat',
                'description_courte' => ['fr' => 'En ligne', 'en' => 'Online'],
                'description_complete' => ['fr' => 'Gestion des crises sanitaires et surveillance épidémiologique.', 'en' => 'Managing health crises and epidemiological surveillance.'],
                'debouches' => ['fr' => 'ONG Santé, Ministères', 'en' => 'Health NGOs, Ministries'],
                'prerequis' => ['fr' => 'Santé Publique', 'en' => 'Public Health'],
                'prix' => 200000,
                'duree' => '3 mois',
                'category_id' => 3,
                'is_featured' => true
            ],
            [
                'titre' => ['fr' => 'Logistique Humanitaire', 'en' => 'Humanitarian Logistics'],
                'slug' => 'logistique-humanitaire',
                'badge' => 'Certificat',
                'description_courte' => ['fr' => 'En ligne', 'en' => 'Online'],
                'description_complete' => ['fr' => 'Chaîne d\'approvisionnement et gestion des stocks en urgence.', 'en' => 'Supply chain and stock management in emergencies.'],
                'debouches' => ['fr' => 'Logisticien', 'en' => 'Logistician'],
                'prerequis' => ['fr' => 'Bac+2', 'en' => 'Associate Degree'],
                'prix' => 170000,
                'duree' => '3 mois',
                'category_id' => 3
            ],
            [
                'titre' => ['fr' => 'Éducation en Situation d\'Urgence (ESU)', 'en' => 'Education in Emergencies (EiE)'],
                'slug' => 'education-urgence',
                'badge' => 'Certificat',
                'description_courte' => ['fr' => 'En ligne', 'en' => 'Online'],
                'description_complete' => ['fr' => 'Assurer la continuité éducative en zones de crise.', 'en' => 'Ensuring educational continuity in crisis zones.'],
                'debouches' => ['fr' => 'ONG Éducation, UNICEF', 'en' => 'Education NGOs, UNICEF'],
                'prerequis' => ['fr' => 'Enseignant/Pédagogue', 'en' => 'Teacher/Pedagogue'],
                'prix' => 160000,
                'duree' => '2 mois',
                'category_id' => 3
            ],
            [
                'titre' => ['fr' => 'Coordination de l\'Action Sanitaire en Crise', 'en' => 'Coordination of Health Emergencies'],
                'slug' => 'coordination-sanitaire',
                'badge' => 'Certificat',
                'description_courte' => ['fr' => 'En ligne', 'en' => 'Online'],
                'description_complete' => ['fr' => 'Coordonner les interventions de santé publique lors d\'urgences.', 'en' => 'Coordinate public health interventions during emergencies.'],
                'debouches' => ['fr' => 'Coordinateur Santé', 'en' => 'Health Coordinator'],
                'prerequis' => ['fr' => 'Médecin/Infirmier', 'en' => 'Doctor/Nurse'],
                'prix' => 220000,
                'duree' => '3 mois',
                'category_id' => 3
            ],
            [
                'titre' => ['fr' => 'Management de l\'Information Sanitaire en Crise', 'en' => 'Health Information Management in Emergencies'],
                'slug' => 'info-sanitaire-crise',
                'badge' => 'Certificat',
                'description_courte' => ['fr' => 'En ligne', 'en' => 'Online'],
                'description_complete' => ['fr' => 'Collecte et analyse des données de santé en situation d\'urgence.', 'en' => 'Collection and analysis of health data in emergencies.'],
                'debouches' => ['fr' => 'Data Manager humanitaire', 'en' => 'Humanitarian Data Manager'],
                'prerequis' => ['fr' => 'Informatique/Statistiques', 'en' => 'IT/Statistics'],
                'prix' => 190000,
                'duree' => '3 mois',
                'category_id' => 3
            ],
            [
                'titre' => ['fr' => 'Gestion de Projets Humanitaires', 'en' => 'Humanitarian Project Management'],
                'slug' => 'gestion-projets-humanitaires',
                'badge' => 'Certificat',
                'description_courte' => ['fr' => 'En ligne', 'en' => 'Online'],
                'description_complete' => ['fr' => 'Cycle de projet, cadre logique et financement.', 'en' => 'Project cycle, logical framework and funding.'],
                'debouches' => ['fr' => 'Chef de projet', 'en' => 'Project Manager'],
                'prerequis' => ['fr' => 'Bac+3', 'en' => 'Bachelor'],
                'prix' => 190000,
                'duree' => '3 mois',
                'category_id' => 3,
                'is_featured' => true
            ],
            [
                'titre' => ['fr' => 'Les Bases du Wash Humanitaire', 'en' => 'The Fundamentals of WaSH in Humanitarian Context'],
                'slug' => 'wash-humanitaire',
                'badge' => 'Certificat',
                'description_courte' => ['fr' => 'En ligne', 'en' => 'Online'],
                'description_complete' => ['fr' => 'Eau, Assainissement et Hygiène en urgence.', 'en' => 'Water, Sanitation and Hygiene in emergencies.'],
                'debouches' => ['fr' => 'Technicien WASH', 'en' => 'WASH Technician'],
                'prerequis' => ['fr' => 'Technique', 'en' => 'Technical'],
                'prix' => 160000,
                'duree' => '2 mois',
                'category_id' => 3
            ],
            [
                'titre' => ['fr' => 'Suivi-Évaluation et Redevabilité', 'en' => 'M&E and Accountability'],
                'slug' => 'suivi-evaluation-humanitaire',
                'badge' => 'Certificat',
                'description_courte' => ['fr' => 'En ligne', 'en' => 'Online'],
                'description_complete' => ['fr' => 'Mesure de l\'impact et reddition des comptes aux bénéficiaires.', 'en' => 'Measuring impact and accountability to beneficiaries.'],
                'debouches' => ['fr' => 'Chargé M&E', 'en' => 'M&E Officer'],
                'prerequis' => ['fr' => 'Gestion de projet', 'en' => 'Project Management'],
                'prix' => 200000,
                'duree' => '3 mois',
                'category_id' => 3
            ],
            [
                'titre' => ['fr' => 'L\'Infirmier dans l\'Humanitaire', 'en' => 'Nursing in Humanitarian Context'],
                'slug' => 'infirmier-humanitaire',
                'badge' => 'Certificat',
                'description_courte' => ['fr' => 'En ligne', 'en' => 'Online'],
                'description_complete' => ['fr' => 'Soins infirmiers en contexte précaire et de guerre.', 'en' => 'Nursing care in precarious and war contexts.'],
                'debouches' => ['fr' => 'Infirmier ONG', 'en' => 'NGO Nurse'],
                'prerequis' => ['fr' => 'Diplôme d\'Infirmier', 'en' => 'Nursing Diploma'],
                'prix' => 180000,
                'duree' => '3 mois',
                'category_id' => 3
            ],
            [
                'titre' => ['fr' => 'Psychologue Humanitaire et Santé Mentale', 'en' => 'Humanitarian Psychologist and Mental Health'],
                'slug' => 'psychologue-humanitaire',
                'badge' => 'Certificat',
                'description_courte' => ['fr' => 'En ligne', 'en' => 'Online'],
                'description_complete' => ['fr' => 'Soutien psychosocial en situation de crise.', 'en' => 'Psychosocial support in crisis situations.'],
                'debouches' => ['fr' => 'Psychologue terrain', 'en' => 'Field Psychologist'],
                'prerequis' => ['fr' => 'Psychologie', 'en' => 'Psychology'],
                'prix' => 190000,
                'duree' => '3 mois',
                'category_id' => 3
            ],
            [
                'titre' => ['fr' => 'Mobilisation des Ressources (Fundraising)', 'en' => 'Resource Mobilization (Fundraising)'],
                'slug' => 'fundraising',
                'badge' => 'Certificat',
                'description_courte' => ['fr' => 'En ligne', 'en' => 'Online'],
                'description_complete' => ['fr' => 'Techniques de recherche de fonds et rédaction de propositions.', 'en' => 'Fundraising techniques and proposal writing.'],
                'debouches' => ['fr' => 'Grant Manager', 'en' => 'Grant Manager'],
                'prerequis' => ['fr' => 'Marketing/Gestion', 'en' => 'Marketing/Management'],
                'prix' => 210000,
                'duree' => '2 mois',
                'category_id' => 3
            ],
            [
                'titre' => ['fr' => 'Enseignant Humanitaire', 'en' => 'Humanitarian Teacher'],
                'slug' => 'enseignant-humanitaire',
                'badge' => 'Certificat',
                'description_courte' => ['fr' => 'En ligne', 'en' => 'Online'],
                'description_complete' => ['fr' => 'Pédagogie adaptée aux contextes de crise.', 'en' => 'Pedagogy adapted to crisis contexts.'],
                'debouches' => ['fr' => 'Enseignant ONG', 'en' => 'NGO Teacher'],
                'prerequis' => ['fr' => 'Enseignant', 'en' => 'Teacher'],
                'prix' => 160000,
                'duree' => '2 mois',
                'category_id' => 3
            ],
            [
                'titre' => ['fr' => 'IA pour les Enseignants', 'en' => 'AI for Teachers'],
                'slug' => 'ia-enseignants',
                'badge' => 'Certificat',
                'description_courte' => ['fr' => 'En ligne', 'en' => 'Online'],
                'description_complete' => ['fr' => 'Utilisation de l\'IA pour améliorer la pédagogie.', 'en' => 'Using AI to improve pedagogy.'],
                'debouches' => ['fr' => 'Enseignant Innovant', 'en' => 'Innovative Teacher'],
                'prerequis' => ['fr' => 'Aucun', 'en' => 'None'],
                'prix' => 150000,
                'duree' => '2 mois',
                'category_id' => 3
            ],
            [
                'titre' => ['fr' => 'Nutrition Humanitaire', 'en' => 'Nutrition in Humanitarian Context'],
                'slug' => 'nutrition-humanitaire',
                'badge' => 'Certificat',
                'description_courte' => ['fr' => 'En ligne', 'en' => 'Online'],
                'description_complete' => ['fr' => 'Prise en charge de la malnutrition.', 'en' => 'Management of malnutrition.'],
                'debouches' => ['fr' => 'Nutritionniste', 'en' => 'Nutritionist'],
                'prerequis' => ['fr' => 'Santé/Nutrition', 'en' => 'Health/Nutrition'],
                'prix' => 175000,
                'duree' => '3 mois',
                'category_id' => 3
            ],
            [
                'titre' => ['fr' => 'Communication des Risques et Engagement Communautaire', 'en' => 'Risk Communication and Community Engagement'],
                'slug' => 'crec',
                'badge' => 'Certificat',
                'description_courte' => ['fr' => 'En ligne', 'en' => 'Online'],
                'description_complete' => ['fr' => 'Stratégies de communication en situation d\'urgence.', 'en' => 'Communication strategies in emergencies.'],
                'debouches' => ['fr' => 'Communicateur Santé', 'en' => 'Health Communicator'],
                'prerequis' => ['fr' => 'Communication/Socio', 'en' => 'Communication/Sociology'],
                'prix' => 170000,
                'duree' => '2 mois',
                'category_id' => 3
            ],
            [
                'titre' => ['fr' => 'Les Bases du Droit Humanitaire', 'en' => 'The Basics of Humanitarian Law'],
                'slug' => 'droit-humanitaire',
                'badge' => 'Certificat',
                'description_courte' => ['fr' => 'En ligne', 'en' => 'Online'],
                'description_complete' => ['fr' => 'Principes juridiques de la protection humanitaire.', 'en' => 'Legal principles of humanitarian protection.'],
                'debouches' => ['fr' => 'Juriste humanitaire', 'en' => 'Humanitarian Jurist'],
                'prerequis' => ['fr' => 'Droit', 'en' => 'Law'],
                'prix' => 180000,
                'duree' => '2 mois',
                'category_id' => 3
            ],

            // ===== CATÉGORIE 4: NUMÉRIQUE EN SANTÉ =====
            [
                'titre' => ['fr' => 'Analyste des Données / Data Analyst', 'en' => 'Data Analyst'],
                'slug' => 'data-analyst',
                'badge' => 'Diplôme d\'État',
                'description_courte' => ['fr' => 'Formation de 12 mois', 'en' => '12-month training'],
                'description_complete' => ['fr' => 'Devenez expert en analyse de données. Maîtrisez les outils modernes de la Data Science.', 'en' => 'Become an expert in data analysis. Master modern Data Science tools.'],
                'debouches' => ['fr' => 'Entreprises, Santé, Banques', 'en' => 'Companies, Health, Banks'],
                'prerequis' => ['fr' => 'Bac Scientifique/Eco', 'en' => 'Scientific/Economics Bac'],
                'prix' => 350000,
                'duree' => '12 mois',
                'category_id' => 4,
                'is_featured' => true
            ],
            [
                'titre' => ['fr' => 'Community Management', 'en' => 'Community Management'],
                'slug' => 'community-management',
                'badge' => 'Diplôme d\'État',
                'description_courte' => ['fr' => 'Formation de 12 mois', 'en' => '12-month training'],
                'description_complete' => ['fr' => 'Gestion des communautés en ligne et marketing digital.', 'en' => 'Online community management and digital marketing.'],
                'debouches' => ['fr' => 'Agences digitales, Entreprises', 'en' => 'Digital Agencies, Companies'],
                'prerequis' => ['fr' => 'Baccalauréat', 'en' => 'Baccalaureate'],
                'prix' => 300000,
                'duree' => '12 mois',
                'category_id' => 4
            ],
            [
                'titre' => ['fr' => 'Bases de l\'Analyse des Données Sanitaires', 'en' => 'Health Data Analysis'],
                'slug' => 'analyse-donnees-sanitaires',
                'badge' => 'Certificat',
                'description_courte' => ['fr' => 'Excel, SPSS, DHIS2, Python...', 'en' => 'Excel, SPSS, DHIS2, Python...'],
                'description_complete' => ['fr' => 'Outils techniques pour l\'analyse des données de santé.', 'en' => 'Technical tools for health data analysis.'],
                'debouches' => ['fr' => 'Analyste données santé', 'en' => 'Health Data Analyst'],
                'prerequis' => ['fr' => 'Informatique', 'en' => 'IT'],
                'prix' => 200000,
                'duree' => '3 mois',
                'category_id' => 4
            ],
            [
                'titre' => ['fr' => 'Cartographie SIG en Santé Publique', 'en' => 'Using Public Health Mapping Software'],
                'slug' => 'cartographie-sig',
                'badge' => 'Certificat',
                'description_courte' => ['fr' => 'QGIS, ArcGIS', 'en' => 'QGIS, ArcGIS'],
                'description_complete' => ['fr' => 'Systèmes d\'information géographique appliqués à la santé.', 'en' => 'Geographic Information Systems applied to health.'],
                'debouches' => ['fr' => 'Cartographe', 'en' => 'Cartographer'],
                'prerequis' => ['fr' => 'Aucun', 'en' => 'None'],
                'prix' => 200000,
                'duree' => '3 mois',
                'category_id' => 4
            ],
            [
                'titre' => ['fr' => 'IA pour Professionnels de la Santé (Cliniciens)', 'en' => 'AI for Health Professionals (Clinicians)'],
                'slug' => 'ia-sante-cliniciens',
                'badge' => 'Certificat',
                'description_courte' => ['fr' => 'IA Clinique', 'en' => 'Clinical AI'],
                'description_complete' => ['fr' => 'Applications de l\'IA pour le diagnostic et le soin.', 'en' => 'AI applications for diagnosis and care.'],
                'debouches' => ['fr' => 'Praticien augmenté', 'en' => 'Augmented Practitioner'],
                'prerequis' => ['fr' => 'Médecin/Infirmier', 'en' => 'Doctor/Nurse'],
                'prix' => 250000,
                'duree' => '3 mois',
                'category_id' => 4
            ],
            [
                'titre' => ['fr' => 'IA pour Experts Santé Publique', 'en' => 'AI for Public Health Experts'],
                'slug' => 'ia-sante-publique',
                'badge' => 'Certificat',
                'description_courte' => ['fr' => 'IA et Épidémiologie', 'en' => 'AI and Epidemiology'],
                'description_complete' => ['fr' => 'Modélisation prédictive et gestion de données en santé publique.', 'en' => 'Predictive modeling and data management in public health.'],
                'debouches' => ['fr' => 'Expert Santé Publique', 'en' => 'Public Health Expert'],
                'prerequis' => ['fr' => 'Santé Publique', 'en' => 'Public Health'],
                'prix' => 250000,
                'duree' => '3 mois',
                'category_id' => 4
            ],

            // ===== CATÉGORIE 5: MANAGEMENT & RECHERCHE =====
            [
                'titre' => ['fr' => 'Conception d\'un Protocole de Recherche', 'en' => 'Designing Health Research Protocol'],
                'slug' => 'protocole-recherche',
                'badge' => 'Certificat',
                'description_courte' => ['fr' => 'Méthodologie', 'en' => 'Methodology'],
                'description_complete' => ['fr' => 'Étapes clés pour élaborer un projet de recherche valide.', 'en' => 'Key steps to develop a valid research project.'],
                'debouches' => ['fr' => 'Chercheur', 'en' => 'Researcher'],
                'prerequis' => ['fr' => 'Master', 'en' => 'Master'],
                'prix' => 200000,
                'duree' => '3 mois',
                'category_id' => 5,
                'is_featured' => true
            ],
            [
                'titre' => ['fr' => 'Conduite d\'une Enquête CAP', 'en' => 'Conducting a KAP Survey'],
                'slug' => 'enquete-cap',
                'badge' => 'Certificat',
                'description_courte' => ['fr' => 'Connaissances, Attitudes, Pratiques', 'en' => 'Knowledge, Attitudes, Practices'],
                'description_complete' => ['fr' => 'Méthodologie des enquêtes CAP en santé communautaire.', 'en' => 'Methodology of KAP surveys in community health.'],
                'debouches' => ['fr' => 'Enquêteur', 'en' => 'Surveyor'],
                'prerequis' => ['fr' => 'Bac+2', 'en' => 'Associate Degree'],
                'prix' => 180000,
                'duree' => '2 mois',
                'category_id' => 5
            ],
            [
                'titre' => ['fr' => 'Conduite d\'Enquêtes Épidémiologiques', 'en' => 'Conducting Epidemiological Survey'],
                'slug' => 'enquete-epidemiologique',
                'badge' => 'Certificat',
                'description_courte' => ['fr' => 'Terrain', 'en' => 'Field'],
                'description_complete' => ['fr' => 'Mener des investigations épidémiologiques sur le terrain.', 'en' => 'Conduct epidemiological investigations in the field.'],
                'debouches' => ['fr' => 'Épidémiologiste terrain', 'en' => 'Field Epidemiologist'],
                'prerequis' => ['fr' => 'Santé', 'en' => 'Health'],
                'prix' => 200000,
                'duree' => '3 mois',
                'category_id' => 5
            ],
            [
                'titre' => ['fr' => 'Évaluation de Projet et Programme de Santé', 'en' => 'Health Project/Program Evaluation'],
                'slug' => 'evaluation-projet-sante',
                'badge' => 'Certificat',
                'description_courte' => ['fr' => 'Évaluation', 'en' => 'Evaluation'],
                'description_complete' => ['fr' => 'Méthodes d\'évaluation de l\'efficacité des programmes de santé.', 'en' => 'Methods for evaluating the effectiveness of health programs.'],
                'debouches' => ['fr' => 'Évaluateur', 'en' => 'Evaluator'],
                'prerequis' => ['fr' => 'Gestion de projet', 'en' => 'Project Management'],
                'prix' => 210000,
                'duree' => '3 mois',
                'category_id' => 5
            ],
            [
                'titre' => ['fr' => 'Évaluation d\'Impact Environnemental', 'en' => 'Conducting Environmental Impact Evaluation'],
                'slug' => 'impact-environnemental',
                'badge' => 'Certificat',
                'description_courte' => ['fr' => 'Santé & Environnement', 'en' => 'Health & Environment'],
                'description_complete' => ['fr' => 'Mesurer l\'impact des projets sur l\'environnement et la santé.', 'en' => 'Measuring the impact of projects on the environment and health.'],
                'debouches' => ['fr' => 'Consultant Environnement', 'en' => 'Environment Consultant'],
                'prerequis' => ['fr' => 'Sciences Environnement', 'en' => 'Environmental Sciences'],
                'prix' => 220000,
                'duree' => '3 mois',
                'category_id' => 5
            ],
            [
                'titre' => ['fr' => 'Évaluation des Méthodes Diagnostiques', 'en' => 'Evaluation of Diagnostic Methods'],
                'slug' => 'methodes-diagnostiques',
                'badge' => 'Certificat',
                'description_courte' => ['fr' => 'Laboratoire & Qualité', 'en' => 'Laboratory & Quality'],
                'description_complete' => ['fr' => 'Valider et évaluer la performance des tests diagnostiques.', 'en' => 'Validate and evaluate the performance of diagnostic tests.'],
                'debouches' => ['fr' => 'Biologiste, Qualiticien', 'en' => 'Biologist, Quality Manager'],
                'prerequis' => ['fr' => 'Biologie', 'en' => 'Biology'],
                'prix' => 200000,
                'duree' => '2 mois',
                'category_id' => 5
            ],
            [
                'titre' => ['fr' => 'Évaluation Système de Surveillance Épidémiologique', 'en' => 'Evaluation of Epi-Surveillance System'],
                'slug' => 'evaluation-surveillance',
                'badge' => 'Certificat',
                'description_courte' => ['fr' => 'Surveillance', 'en' => 'Surveillance'],
                'description_complete' => ['fr' => 'Auditer les systèmes de surveillance des maladies.', 'en' => 'Audit disease surveillance systems.'],
                'debouches' => ['fr' => 'Expert OMS, Consultant', 'en' => 'WHO Expert, Consultant'],
                'prerequis' => ['fr' => 'Épidémiologie', 'en' => 'Epidemiology'],
                'prix' => 210000,
                'duree' => '3 mois',
                'category_id' => 5
            ],
            [
                'titre' => ['fr' => 'Bases de l\'Épidémiologie de Terrain', 'en' => 'Fundamentals of Basic Field Epidemiology'],
                'slug' => 'bases-epidemiologie',
                'badge' => 'Certificat',
                'description_courte' => ['fr' => 'Fondamentaux', 'en' => 'Fundamentals'],
                'description_complete' => ['fr' => 'Concepts clés de l\'épidémiologie opérationnelle.', 'en' => 'Key concepts of operational epidemiology.'],
                'debouches' => ['fr' => 'Assistant épidémiologiste', 'en' => 'Assistant Epidemiologist'],
                'prerequis' => ['fr' => 'Santé', 'en' => 'Health'],
                'prix' => 190000,
                'duree' => '3 mois',
                'category_id' => 5
            ],
            [
                'titre' => ['fr' => 'Bases de l\'Évaluation d\'un Système de Santé', 'en' => 'Fundamentals of Health System Evaluation'],
                'slug' => 'bases-evaluation-systeme',
                'badge' => 'Certificat',
                'description_courte' => ['fr' => 'Systèmes de Santé', 'en' => 'Health Systems'],
                'description_complete' => ['fr' => 'Comprendre et analyser le fonctionnement d\'un système de santé.', 'en' => 'Understand and analyze the functioning of a health system.'],
                'debouches' => ['fr' => 'Analyste Santé', 'en' => 'Health Analyst'],
                'prerequis' => ['fr' => 'Santé Publique', 'en' => 'Public Health'],
                'prix' => 200000,
                'duree' => '3 mois',
                'category_id' => 5
            ],
            [
                'titre' => ['fr' => 'Bases de la Planification Sanitaire', 'en' => 'Fundamentals of Health Planning'],
                'slug' => 'planification-sanitaire',
                'badge' => 'Certificat',
                'description_courte' => ['fr' => 'Planification', 'en' => 'Planning'],
                'description_complete' => ['fr' => 'Techniques de planification stratégique en santé.', 'en' => 'Strategic planning techniques in health.'],
                'debouches' => ['fr' => 'Planificateur Santé', 'en' => 'Health Planner'],
                'prerequis' => ['fr' => 'Gestion', 'en' => 'Management'],
                'prix' => 200000,
                'duree' => '3 mois',
                'category_id' => 5
            ],
        ];

        foreach ($formations as $formation) {
            Formation::create($formation);
        }
    }
}

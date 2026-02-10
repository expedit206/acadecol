<script setup>
import { GraduationCap, Globe2, Heart, Laptop, BarChart3, Clock, CheckCircle2 } from 'lucide-vue-next';

// Diplômes nationaux d'État
const diplomas = [
  { 
    name: 'Vendeur en Pharmacie', 
    nameEn: 'Pharmacy Salesperson',
    duration: '12 mois',
    mode: 'Présentiel',
    image: 'https://images.unsplash.com/photo-1587854692152-cbe660dbde88?w=800&auto=format&fit=crop&q=60'
  },
  { 
    name: 'Délégué ou Visiteur Médical', 
    nameEn: 'Medical Delegate',
    duration: '12 mois',
    mode: 'Présentiel',
    image: 'https://images.unsplash.com/photo-1622253692010-333f2da6031d?w=800&auto=format&fit=crop&q=60'
  },
  { 
    name: 'Auxiliaire de Vie', 
    nameEn: 'Care Givers',
    duration: '12 mois',
    mode: 'Présentiel',
    image: 'https://images.unsplash.com/photo-1582750433449-648ed127bb54?w=800&auto=format&fit=crop&q=60'
  },
  { 
    name: 'Maintenance Biomédicale', 
    nameEn: 'Biomedical Maintenance',
    duration: '12 mois',
    mode: 'Présentiel',
    image: 'https://images.unsplash.com/photo-1582719508461-905c673771fd?w=800&auto=format&fit=crop&q=60'
  },
  { 
    name: 'Analyste des Données', 
    nameEn: 'Data Analyst',
    duration: '12 mois',
    mode: 'Présentiel',
    image: 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&auto=format&fit=crop&q=60'
  },
  { 
    name: 'Community Management', 
    nameEn: 'Community Management',
    duration: '12 mois',
    mode: 'Présentiel',
    image: 'https://images.unsplash.com/photo-1611224923853-80b023f02d71?w=800&auto=format&fit=crop&q=60'
  }
];

// Certificats de compétences linguistiques avec drapeaux
const languages = [
  { name: 'Français', nameEn: 'French', levels: 'A1 - C2', duration: '3 à 6 mois', mode: 'Présentiel ou en ligne', flag: '🇫🇷' },
  { name: 'Anglais', nameEn: 'English', levels: 'TOEFL / TOEIC / IELTS', duration: '3 à 6 mois', mode: 'Présentiel ou en ligne', flag: '🇬🇧' },
  { name: 'Espagnol', nameEn: 'Spanish', levels: 'A1 - C1', duration: '3 à 6 mois', mode: 'Présentiel ou en ligne', flag: '🇪🇸' },
  { name: 'Allemand', nameEn: 'German', levels: 'A1 - B2', duration: '3 à 6 mois', mode: 'Présentiel ou en ligne', flag: '🇩🇪' },
  { name: 'Italien', nameEn: 'Italian', levels: 'A1 - C2', duration: '3 à 6 mois', mode: 'Présentiel ou en ligne', flag: '🇮🇹' },
  { name: 'Chinois', nameEn: 'Chinese', levels: 'A1 - B1', duration: '3 à 6 mois', mode: 'Présentiel ou en ligne', flag: '🇨🇳' }
];

// Images pour les catégories
const categoryImages = {
  humanitarian: 'https://images.unsplash.com/photo-1532635241-17e820acc59f?w=1200&auto=format&fit=crop&q=60',
  digitalHealth: 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1f?w=1200&auto=format&fit=crop&q=60',
  managementResearch: 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=1200&auto=format&fit=crop&q=60'
};

// Certificats humanitaires
const humanitarian = [
  'Les bases de l\'Humanitaire',
  'Epidémiologie de terrain et urgences sanitaires',
  'Logistique humanitaire',
  'Education en situation d\'urgence (ESU)',
  'Coordination de l\'action sanitaire en crise',
  'Management de l\'information sanitaire en crise',
  'Gestions de projets humanitaires',
  'Les bases du Wash Humanitaire',
  'Suivi-Evaluation et recevabilité',
  'L\'infirmier dans l\'humanitaire',
  'Psychologue humanitaire et santé mentale',
  'Mobilisation des ressources/Fundraising',
  'Enseignant humanitaire',
  'IA pour les Enseignants',
  'Nutrition Humanitaire',
  'Communication des risques et engagement communautaire',
  'Les bases du droit humanitaire'
];

// Certificats Numérique en Santé
const digitalHealth = [
  'Data analyst/Data scientist',
  'Analyse des données sanitaires (Excel, SPSS, DHIS2, etc.)',
  'Cartographie en Santé Publique (QGIS, ArcGIS)',
  'IA pour Professionnels de la Santé Cliniciens',
  'IA pour Experts Santé publique'
];

// Certificats Management & Recherche
const management = [
  'Conception d\'un protocole de recherche en santé',
  'Conduite d\'une enquête CAP',
  'Conduite d\'enquêtes épidémiologiques',
  'Évaluation de projet et programme de Santé',
  'Évaluation d\'Impact Environnementale',
  'Évaluation des méthodes diagnostiques',
  'Évaluation d\'un système de Surveillance épidémiologique',
  'Les bases de l\'épidémiologie de terrain',
  'Les bases de l\'évaluation d\'un système de santé',
  'Les bases de la planification sanitaire'
];
</script>

<template>
  <section id="formations" class="section formations">
    <div class="container">
      <!-- Header -->
      <div class="formations-header reveal">
        <span class="badge badge-primary">Nos Programmes</span>
        <h2 class="section-title">Des formations pour <span class="gradient-text">tous les profils</span></h2>
        <p class="section-desc">
          Nos cursus sont conçus pour répondre aux besoins réels du marché de l'emploi en Afrique. 
          Formations courtes de 1 à 12 mois, axées sur la pratique opérationnelle.
        </p>
      </div>

      <!-- Diplômes Nationaux -->
      <div class="formation-category reveal">
        <div class="category-header">
          <GraduationCap class="cat-icon" :size="32" />
          <div>
            <h3>Diplômes Nationaux d'État</h3>
            <p>National State Diploma - Formation en présentiel de 12 mois</p>
          </div>
        </div>
        
        <div class="formations-grid">
          <div v-for="diploma in diplomas" :key="diploma.name" class="formation-card">
            <div class="card-image">
              <img :src="diploma.image" :alt="diploma.name" />
              <span class="badge-overlay">Diplôme d'État</span>
            </div>
            <div class="card-content">
              <h4>{{ diploma.name }}</h4>
              <p class="subtitle">{{ diploma.nameEn }}</p>
              <div class="card-meta">
                <span class="meta-item">
                  <Clock :size="16" />
                  {{ diploma.duration }}
                </span>
                <span class="meta-item">
                  <CheckCircle2 :size="16" />
                  {{ diploma.mode }}
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Langues -->
      <div class="formation-category reveal">
        <div class="category-header">
          <Globe2 class="cat-icon" :size="32" />
          <div>
            <h3>Certificats de Compétences Linguistiques</h3>
            <p>Linguistic Skills Certificate - 3 à 6 mois (Présentiel ou en ligne)</p>
          </div>
        </div>
        
        <div class="formations-grid">
          <div v-for="lang in languages" :key="lang.name" class="formation-card lang-card">
            <div class="card-image flag-container">
              <div class="flag-wrapper">
                <span class="flag">{{ lang.flag }}</span>
              </div>
              <span class="badge-overlay">Certificat</span>
            </div>
            <div class="card-content">
              <h4>{{ lang.name }}</h4>
              <p class="subtitle">{{ lang.nameEn }}</p>
              <div class="lang-levels">{{ lang.levels }}</div>
              <div class="card-meta">
                <span class="meta-item">
                  <Clock :size="16" />
                  {{ lang.duration }}
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Humanitaire -->
      <div class="formation-category reveal">
        <div class="category-header">
          <Heart class="cat-icon" :size="32" />
          <div>
            <h3>Certificats de Compétences Humanitaires</h3>
            <p>Humanitarian Skills Certificate - Formation en ligne</p>
          </div>
        </div>
        
        <div class="category-image-wrapper">
          <img :src="categoryImages.humanitarian" alt="Formation Humanitaire" class="category-img" />
        </div>
        
        <div class="competences-list">
          <div v-for="(item, index) in humanitarian" :key="index" class="competence-item">
            <CheckCircle2 :size="18" class="check-icon" />
            <span>{{ item }}</span>
          </div>
        </div>
      </div>

      <!-- Numérique en Santé -->
      <div class="formation-category reveal">
        <div class="category-header">
          <Laptop class="cat-icon" :size="32" />
          <div>
            <h3>Numérique Appliqué à la Santé Publique</h3>
            <p>Digital Skills in Public Health - Présentiel ou en ligne</p>
          </div>
        </div>
        
        <div class="category-image-wrapper">
          <img :src="categoryImages.digitalHealth" alt="Numérique Santé" class="category-img" />
        </div>
        
        <div class="competences-list">
          <div v-for="(item, index) in digitalHealth" :key="index" class="competence-item">
            <CheckCircle2 :size="18" class="check-icon" />
            <span>{{ item }}</span>
          </div>
        </div>
      </div>

      <!-- Management & Recherche -->
      <div class="formation-category reveal">
        <div class="category-header">
          <BarChart3 class="cat-icon" :size="32" />
          <div>
            <h3>Management & Recherche Opérationnelle en Santé</h3>
            <p>Health Management and Operational Research - Présentiel et en ligne</p>
          </div>
        </div>
        
        <div class="category-image-wrapper">
          <img :src="categoryImages.managementResearch" alt="Management Recherche" class="category-img" />
        </div>
        
        <div class="competences-list">
          <div v-for="(item, index) in management" :key="index" class="competence-item">
            <CheckCircle2 :size="18" class="check-icon" />
            <span>{{ item }}</span>
          </div>
        </div>
      </div>

      <!-- CTA -->
      <div class="formations-cta reveal">
        <div class="cta-box">
          <h3>Prêt à démarrer votre formation ?</h3>
          <p>Toutes nos formations sont certifiées par le Ministère de la Formation Professionnelle du Cameroun (MINEFOP)</p>
          <div class="cta-actions">
            <a href="#contact" class="btn btn-primary">Demander plus d'informations</a>
            <a href="#contact" class="btn btn-outline">Télécharger la brochure</a>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
.formations {
  background-color: var(--gray-100);
}

.formations-header {
  text-align: center;
  margin-bottom: 4rem;
}

.section-title { 
  font-size: clamp(2rem, 4vw, 2.5rem);
  margin-top: 1rem; 
}

.section-desc { 
  max-width: 700px; 
  margin: 1rem auto; 
  color: var(--gray-600); 
  font-size: 1.1rem;
  line-height: 1.7;
}

/* Category Section */
.formation-category {
  margin-bottom: 5rem;
}

.category-header {
  display: flex;
  align-items: flex-start;
  gap: 1.5rem;
  margin-bottom: 3rem;
  padding-bottom: 1.5rem;
  border-bottom: 3px solid var(--primary);
}

.cat-icon {
  color: var(--primary);
  flex-shrink: 0;
}

.category-header h3 {
  font-size: clamp(1.5rem, 3vw, 2rem);
  color: var(--dark);
  margin-bottom: 0.5rem;
}

.category-header p {
  color: var(--gray-600);
  font-size: 1rem;
  margin: 0;
}

/* Formations Grid */
.formations-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
  gap: 2rem;
}

.formation-card {
  background: var(--white);
  border-radius: 15px;
  overflow: hidden;
  box-shadow: var(--shadow-sm);
  transition: var(--transition);
}

.formation-card:hover {
  transform: translateY(-8px);
  box-shadow: var(--shadow-lg);
}

.card-image {
  position: relative;
  height: 200px;
  overflow: hidden;
  background: linear-gradient(135deg, var(--primary-light), var(--gray-200));
}

.card-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: var(--transition);
}

.formation-card:hover .card-image img {
  transform: scale(1.05);
}

/* Style spécifique pour les drapeaux des langues */
.flag-container {
  display: flex;
  align-items: center;
  justify-content: center;
  background: linear-gradient(135deg, #f8f9fa, #e9ecef);
}

.flag-wrapper {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 100%;
}

.flag {
  font-size: 80px;
  line-height: 1;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
}

.lang-card .flag-container:hover .flag {
  transform: scale(1.1);
  transition: transform 0.3s ease;
}

.badge-overlay {
  position: absolute;
  top: 1rem;
  right: 1rem;
  background: var(--primary);
  color: var(--white);
  padding: 0.4rem 0.8rem;
  border-radius: 20px;
  font-size: 0.75rem;
  font-weight: 700;
  text-transform: uppercase;
}

.card-content {
  padding: 1.5rem;
}

.card-content h4 {
  font-size: 1.2rem;
  color: var(--dark);
  margin-bottom: 0.5rem;
  line-height: 1.3;
}

.subtitle {
  font-size: 0.9rem;
  color: var(--gray-600);
  margin-bottom: 1rem;
  font-style: italic;
}

.lang-levels {
  background: var(--primary-light);
  color: var(--primary);
  padding: 0.5rem 1rem;
  border-radius: 8px;
  font-weight: 600;
  text-align: center;
  margin-bottom: 1rem;
  font-size: 0.9rem;
}

.card-meta {
  display: flex;
  flex-wrap: wrap;
  gap: 1rem;
  padding-top: 1rem;
  border-top: 1px solid var(--gray-200);
}

.meta-item {
  display: flex;
  align-items: center;
  gap: 0.4rem;
  font-size: 0.85rem;
  color: var(--gray-600);
}

.meta-item svg {
  color: var(--secondary);
}

/* Category Image */
.category-image-wrapper {
  margin-bottom: 2rem;
  border-radius: 20px;
  overflow: hidden;
  box-shadow: var(--shadow);
}

.category-img {
  width: 100%;
  height: 300px;
  object-fit: cover;
}

/* Competences List */
.competences-list {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  gap: 1rem;
}

.competence-item {
  display: flex;
  align-items: flex-start;
  gap: 0.75rem;
  background: var(--white);
  padding: 1rem 1.2rem;
  border-radius: 10px;
  transition: var(--transition);
  box-shadow: var(--shadow-sm);
}

.competence-item:hover {
  transform: translateX(5px);
  box-shadow: var(--shadow);
}

.check-icon {
  color: var(--secondary);
  flex-shrink: 0;
  margin-top: 2px;
}

.competence-item span {
  font-size: 0.95rem;
  color: var(--gray-700);
  line-height: 1.5;
}

/* CTA */
.formations-cta {
  margin-top: 5rem;
}

.cta-box {
  background: linear-gradient(135deg, var(--primary), var(--secondary));
  padding: 3rem 2rem;
  border-radius: 25px;
  text-align: center;
  color: var(--white);
}

.cta-box h3 {
  font-size: clamp(1.8rem, 3vw, 2.5rem);
  margin-bottom: 1rem;
}

.cta-box p {
  max-width: 600px;
  margin: 0 auto 2rem;
  opacity: 0.95;
  font-size: 1.1rem;
}

.cta-actions {
  display: flex;
  justify-content: center;
  gap: 1.5rem;
  flex-wrap: wrap;
}

.cta-box .btn-outline {
  background: var(--white);
  color: var(--primary);
  border-color: var(--white);
}

.cta-box .btn-outline:hover {
  background: transparent;
  color: var(--white);
}

/* Mobile Responsive */
@media (max-width: 768px) {
  .formations-header {
    margin-bottom: 2.5rem;
  }
  
  .category-header {
    flex-direction: column;
    gap: 1rem;
  }
  
  .formations-grid {
    grid-template-columns: 1fr;
  }
  
  .competences-list {
    grid-template-columns: 1fr;
  }
  
  .category-img {
    height: 200px;
  }
  
  .cta-box {
    padding: 2rem 1.5rem;
  }
  
  .cta-actions {
    flex-direction: column;
  }
  
  .cta-actions .btn {
    width: 100%;
  }
}

@media (max-width: 480px) {
  .card-image {
    height: 160px;
  }
  
  .flag {
    font-size: 60px;
  }
  
  .card-content {
    padding: 1rem;
  }
}
</style>
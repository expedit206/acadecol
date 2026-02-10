<script setup>
import { ArrowRight, CheckCircle } from 'lucide-vue-next';
</script>

<template>
  <section id="home" class="hero">
    <div class="hero-bg">
      <img src="/hero.png" alt="Hero Background" />
      <div class="overlay"></div>
    </div>
    
    <div class="container hero-content">
      <div class="hero-text reveal">
        <div class="badge-container">
          <span class="badge badge-primary">Agréé par le MINEFOP</span>
        </div>
        <h1>
          Construisez votre <span class="gradient-text">Avenir Professionnel</span> avec ACADECOL
        </h1>
        <p>
          L'Académie Africaine Bilingue développe vos compétences pour faciliter votre employabilité. Formations certifiées de 1 à 12 mois.
        </p>
        
        <div class="hero-cta">
          <a href="#formations" class="btn btn-primary btn-lg">
            Découvrir nos formations
            <ArrowRight :size="20" />
          </a>
          <a href="#about" class="btn btn-outline btn-lg">
            En savoir plus
          </a>
        </div>

        <div class="hero-features">
          <div class="h-feature">
            <CheckCircle class="icon" :size="18" />
            <span>Diplômes Nationaux</span>
          </div>
          <div class="h-feature">
            <CheckCircle class="icon" :size="18" />
            <span>Certifications Internationales</span>
          </div>
          <div class="h-feature">
            <CheckCircle class="icon" :size="18" />
            <span>En ligne & présentiel</span>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
.hero {
  position: relative;
  min-height: 100vh;
  min-height: 100dvh;
  display: flex;
  align-items: center;
  overflow: hidden;
  padding-top: 70px;
  padding-bottom: 2rem;
}

.hero-bg {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: -1;
}

.hero-bg img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(180deg, rgba(255,255,255,0.95) 0%, rgba(255,255,255,0.85) 100%);
}

.hero-content {
  z-index: 1;
}

.hero-text {
  max-width: 100%;
}

.badge-container {
  margin-bottom: 1rem;
}

h1 {
  font-size: clamp(1.8rem, 6vw, 4rem);
  margin-bottom: 1rem;
  color: var(--dark);
}

p {
  font-size: clamp(1rem, 2.5vw, 1.25rem);
  color: var(--gray-700);
  margin-bottom: 2rem;
  line-height: 1.7;
}

.hero-cta {
  display: flex;
  flex-direction: column;
  gap: 1rem;
  margin-bottom: 2rem;
}

.btn-lg {
  padding: 1rem 1.5rem;
  font-size: 1rem;
}

.hero-features {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.h-feature {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  font-weight: 600;
  font-size: 0.9rem;
  color: var(--gray-700);
}

.icon {
  color: var(--secondary);
  flex-shrink: 0;
}

/* Tablet */
@media (min-width: 768px) {
  .hero {
    padding-top: 100px;
  }

  .overlay {
    background: linear-gradient(90deg, rgba(255,255,255,0.95) 40%, rgba(255,255,255,0.5) 100%);
  }

  .hero-text {
    max-width: 600px;
  }

  .badge-container {
    margin-bottom: 1.5rem;
  }

  p {
    margin-bottom: 2.5rem;
  }

  .hero-cta {
    flex-direction: row;
    gap: 1.5rem;
    margin-bottom: 3rem;
  }

  .btn-lg {
    padding: 1rem 2rem;
    font-size: 1.1rem;
  }

  .hero-features {
    flex-direction: row;
    flex-wrap: wrap;
    gap: 2rem;
  }

  .h-feature {
    font-size: 1rem;
  }
}

/* Desktop */
@media (min-width: 1024px) {
  .hero-text {
    max-width: 650px;
  }
}
</style>

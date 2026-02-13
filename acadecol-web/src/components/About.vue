<script setup>
import { Award, BookOpen, Users, Globe } from "lucide-vue-next";

const stats = [
    { icon: Award, label: "Accréditations", value: "MINEFOP" },
    { icon: BookOpen, label: "Formations", value: "30+" },
    { icon: Users, label: "Expertise", value: "Pratique" },
    { icon: Globe, label: "Mode", value: "Bilingue" },
];

const domains = [
    "Les langues",
    "Le Paramédical et la biomédical",
    "L'Humanitaire",
    "Le Numérique en Santé",
    "Le Management & Recherche Opérationnelle en Santé",
];
</script>

<template>
    <section id="about" class="section about">
        <div class="container">
            <div class="about-grid">
                <div class="about-image reveal">
                    <div class="image-wrapper">
                        <img
                            src="/hero.png"
                            alt="About ACADECOL"
                            class="main-img"
                        />
                        <div class="floating-card">
                            <span class="number">100%</span>
                            <span class="label">Insertion Professionnelle</span>
                        </div>
                    </div>
                </div>

                <div class="about-content reveal">
                    <span class="badge badge-primary">À Propos de Nous</span>
                    <h2 class="section-title">
                        Plus qu'un Institut, une
                        <span class="gradient-text"
                            >Passerelle vers l'Emploi</span
                        >
                    </h2>
                    <p>
                        L'Institut de Formation Professionnelle ACADECOL, sis à
                        Bafoussam (Face ancien général voyage), a pour objectif
                        de développer les compétences des Africains actifs et
                        des diplômés pour faciliter leur insertion
                        professionnelle.
                    </p>
                    <p>
                        Sous l'arrêté N° : 000644/MINEFOP, nous proposons des
                        offres diversifiées et courtes, allant de 1 à 12 mois,
                        axées sur l'apprentissage en situation opérationnelle.
                    </p>

                    <!-- 5 Domaines -->
                    <div class="domains">
                        <h4>Nos 5 Domaines Ciblés :</h4>
                        <ul>
                            <li v-for="domain in domains" :key="domain">
                                {{ domain }}
                            </li>
                        </ul>
                    </div>

                    <div class="stats-grid">
                        <div
                            v-for="stat in stats"
                            :key="stat.label"
                            class="stat-item"
                        >
                            <div class="stat-icon">
                                <component :is="stat.icon" :size="22" />
                            </div>
                            <div class="stat-info">
                                <h3>{{ stat.value }}</h3>
                                <p>{{ stat.label }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
.about {
    background-color: var(--gray-100);
}

.about-grid {
    display: grid;
    gap: 3rem;
}

.image-wrapper {
    position: relative;
}

.main-img {
    border-radius: 20px;
    box-shadow: var(--shadow-lg);
    width: 100%;
}

.floating-card {
    position: absolute;
    bottom: -20px;
    right: 10%;
    background: var(--white);
    padding: 1.25rem;
    border-radius: 15px;
    box-shadow: var(--shadow-lg);
    display: flex;
    flex-direction: column;
    align-items: center;
    border-left: 4px solid var(--primary);
}

.floating-card .number {
    font-size: 1.5rem;
    font-weight: 800;
    color: var(--primary);
}

.floating-card .label {
    font-size: 0.7rem;
    font-weight: 600;
    text-align: center;
}

.section-title {
    font-size: clamp(1.8rem, 4vw, 2.5rem);
    margin: 1rem 0 1.5rem;
}

p {
    color: var(--gray-600);
    margin-bottom: 1rem;
    line-height: 1.7;
}

.domains {
    background: var(--white);
    padding: 1.25rem;
    border-radius: 15px;
    margin: 1.5rem 0;
    box-shadow: var(--shadow-sm);
}

.domains h4 {
    color: var(--primary);
    margin-bottom: 0.75rem;
    font-size: 1rem;
}

.domains ul {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.domains li {
    font-size: 0.9rem;
    color: var(--gray-700);
    padding-left: 1.25rem;
    position: relative;
}

.domains li::before {
    content: "→";
    position: absolute;
    left: 0;
    color: var(--secondary);
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
    margin-top: 2rem;
}

.stat-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.stat-icon {
    width: 45px;
    height: 45px;
    background: var(--primary-light);
    color: var(--primary);
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    flex-shrink: 0;
}

.stat-info h3 {
    font-size: 1rem;
    margin: 0;
}

.stat-info p {
    font-size: 0.8rem;
    margin: 0;
}

/* Tablet and up */
@media (min-width: 768px) {
    .about-grid {
        grid-template-columns: 1fr 1.2fr;
        align-items: center;
        gap: 4rem;
    }

    .floating-card {
        right: -30px;
        padding: 1.5rem;
    }

    .floating-card .number {
        font-size: 2rem;
    }

    .floating-card .label {
        font-size: 0.75rem;
    }

    .domains {
        padding: 1.5rem;
    }

    .stats-grid {
        gap: 1.5rem;
    }

    .stat-icon {
        width: 50px;
        height: 50px;
    }
}

/* Desktop */
@media (min-width: 1024px) {
    .floating-card {
        right: -50px;
    }
}
</style>

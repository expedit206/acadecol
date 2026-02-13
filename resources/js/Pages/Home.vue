<script setup>
import PublicLayout from "@/Layouts/PublicLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import { onMounted, computed } from "vue";

const props = defineProps({
    formations: {
        type: Array,
        default: () => [],
    },
    categories: {
        type: Array,
        default: () => [],
    },
});

// --- Utility Functions ---
function getText(jsonField) {
    if (!jsonField) return "";
    if (typeof jsonField === "string") {
        try {
            const parsed = JSON.parse(jsonField);
            return parsed.fr || parsed.en || jsonField;
        } catch (e) {
            return jsonField;
        }
    }
    return jsonField.fr || jsonField.en || "";
}

function formatPrice(price) {
    if (!price) return "Sur devis";
    return new Intl.NumberFormat("fr-CM", {
        style: "currency",
        currency: "XAF",
        maximumFractionDigits: 0,
    }).format(price);
}

function getFormationImage(formation) {
    if (formation.image && formation.image.path) {
        return `/${formation.image.path}`;
    }
    return "/img/school1.jpg"; // Image par défaut
}

// --- Data Categorization ---

// Helper to find category by loose name matching
const findCategory = (keywords) => {
    return props.categories.find((c) => {
        const name = getText(c.nom).toLowerCase();
        return keywords.some((k) => name.includes(k.toLowerCase()));
    });
};

const languagesCategory = computed(() =>
    findCategory(["langue", "linguistique"]),
);
const humanitarianCategory = computed(() => findCategory(["humanitaire"]));
const digitalHealthCategory = computed(() =>
    findCategory(["numérique", "digital", "informatique"]),
);
const managementCategory = computed(() =>
    findCategory(["management", "recherche", "gestion"]),
);

// Formations Filtering
const diplomas = computed(() => {
    // Fallback: Diplomas are those NOT in the other specific categories
    const otherCatIds = [
        languagesCategory.value?.id,
        humanitarianCategory.value?.id,
        digitalHealthCategory.value?.id,
        managementCategory.value?.id,
    ].filter(Boolean);

    // Filter out formations that belong to the other categories
    return props.formations
        .filter((f) => !otherCatIds.includes(f.category_id))
        .slice(0, 6);
});

const languages = computed(() => {
    if (!languagesCategory.value) return [];
    return props.formations.filter(
        (f) => f.category_id === languagesCategory.value.id,
    );
});

const humanitarian = computed(() => {
    if (!humanitarianCategory.value) return [];
    return props.formations.filter(
        (f) => f.category_id === humanitarianCategory.value.id,
    );
});

const digitalHealth = computed(() => {
    if (!digitalHealthCategory.value) return [];
    return props.formations.filter(
        (f) => f.category_id === digitalHealthCategory.value.id,
    );
});

const management = computed(() => {
    if (!managementCategory.value) return [];
    return props.formations.filter(
        (f) => f.category_id === managementCategory.value.id,
    );
});

// --- Static Data for UI ---
const stats = [
    { icon: "fas fa-certificate", label: "Accréditations", value: "MINEFOP" },
    { icon: "fas fa-book-open", label: "Formations", value: "30+" },
    { icon: "fas fa-users", label: "Expertise", value: "Pratique" },
    { icon: "fas fa-globe", label: "Mode", value: "Bilingue" },
];

const domains = computed(() => props.categories.map((c) => getText(c.nom)));

// Images pour les catégories (Static fallback)
const categoryImages = {
    humanitarian: "/storage/formations/humanitaire.png",
    digitalHealth: "/storage/formations/ia professionel sante.jpg",
    managementResearch: "/storage/formations/data_analyst.png",
};

// Flags mapping helper
const getFlag = (title) => {
    const t = (getText(title) || "").toLowerCase();
    if (t.includes("français")) return "🇫🇷";
    if (t.includes("anglais")) return "🇬🇧";
    if (t.includes("espagnol")) return "🇪🇸";
    if (t.includes("allemand")) return "🇩🇪";
    if (t.includes("italien")) return "🇮🇹";
    if (t.includes("chinois")) return "🇨🇳";
    return "🏳️";
};

onMounted(() => {
    const observerOptions = { threshold: 0.1 };
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("reveal-active");
            }
        });
    }, observerOptions);

    document.querySelectorAll(".reveal").forEach((section) => {
        observer.observe(section);
    });
});
</script>

<template>
    <PublicLayout>
        <Head title="Accueil">
            <meta
                name="description"
                content="Bienvenue à ACADECOL, l'Académie Africaine Bilingue. Découvrez nos formations professionnelles certifiées par l'État (MINEFOP) dans les domaines de la santé, du management, des langues et du numérique."
            />
            <meta
                property="og:title"
                content="Accueil - ACADECOL | Formations Professionnelles au Cameroun"
            />
            <meta
                property="og:description"
                content="Rejoignez ACADECOL pour des formations pratiques et certifiantes. Préparez votre avenir professionnel avec nos programmes reconnus."
            />
            <meta property="og:image" content="/img/school1.jpg" />
        </Head>

        <div class="home-container">
            <section
                id="hom"
                class="py-5  relative flex overflow-hidden pt-2"
            >
                <!-- Background -->
                <div class="absolute inset-0 z-0 py-">
                    <img
                        src="/img/school1.jpg"
                        alt="Hero Background"
                        class="w-full h-100 object-cover"
                        onerror="this.src = '/img/hero.png'"
                    />
                    <div class="overlay"></div>
                </div>

                <!-- Content -->
                <div class="relative z-10 w-full mt-2">
                    <div class="max-w-7xl mx-auto px-4 md:px-6">
                        <div
                            class="max-w-full lg:max-w-[650px] opacity-0 translate-y-5 transition-all duration-700 reveal"
                        >
                            <!-- Badge -->
                            <div class="mb-2">
                                <span
                                    class="inline-block px-3 py-1 text-xs font-semibold uppercase tracking-wide rounded-full bg-blue-50 text-blue-600"
                                >
                                    Agréé par le MINEFOP
                                </span>
                            </div>

                            <!-- Title -->
                            <h1
                                class="text-md lg:text-2xl mb-2 font-bold leading-tight text-slate-900"
                            >
                                Construisez votre
                                <span
                                    class="bg-gradient-to-r from-blue-600 to-green-500 text-transparent bg-clip-text"
                                >
                                    Avenir Professionnel
                                </span>
                                avec ACADECOL
                            </h1>

                            <!-- Description -->
                            <p class="text-slate-600 mb-2 leading-relaxed">
                                L'Académie Africaine Bilingue développe vos
                                compétences pour faciliter votre employabilité.
                                Formations certifiées de 1 à 12 mois.
                            </p>

                            <!-- CTA -->
                            <div
                                class="flex flex-col md:flex-row gap-2 md:gap-6 mb-4 md:mb-6"
                            >
                                <a
                                    href="#formations"
                                    class="inline-flex items-center justify-center gap-2 px-5 py-2 md:px-6 rounded-full font-semibold bg-blue-600 text-white hover:bg-blue-700 transition hover:-translate-y-0.5 shadow hover:shadow-lg"
                                >
                                    Découvrir nos formations
                                    <i class="fas fa-arrow-right"></i>
                                </a>

                                <a
                                    href="#about"
                                    class="inline-flex items-center justify-center gap-2 px-5 py-2 md:px-6 rounded-full font-semibold border-2 border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white transition"
                                >
                                    En savoir plus
                                </a>
                            </div>

                            <!-- Features -->
                            <div
                                class="flex flex-col md:flex-row md:flex-wrap gap-4 md:gap-8 text-slate-700 font-semibold mb-16"
                            >
                                <div class="flex items-center gap-2">
                                    <i
                                        class="fas fa-check-circle text-emerald-500"
                                    ></i>
                                    <span>Diplômes Nationaux</span>
                                </div>

                                <div class="flex items-center gap-2">
                                    <i
                                        class="fas fa-check-circle text-emerald-500"
                                    ></i>
                                    <span>Certifications Internationales</span>
                                </div>

                                <div class="flex items-center gap-2">
                                    <i
                                        class="fas fa-check-circle text-emerald-500"
                                    ></i>
                                    <span>En ligne & présentiel</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ABOUT SECTION -->
            <section id="about" class="section about">
                <div class="container">
                    <div class="about-grid">
                        <div class="about-image reveal">
                            <div class="image-wrapper">
                                <img
                                    src="/img/school1.jpg"
                                    alt="About ACADECOL"
                                    class="main-img"
                                />
                                <div class="floating-card">
                                    <span class="number">100%</span>
                                    <span class="label"
                                        >Insertion Professionnelle</span
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="about-content reveal">
                            <span class="badge badge-primary"
                                >À Propos de Nous</span
                            >
                            <h2 class="text-xl">
                                Plus qu'un Institut, une
                                <span class="gradient-text"
                                    >Passerelle vers l'Emploi</span
                                >
                            </h2>
                            <p class="text">
                                L'Institut de Formation Professionnelle
                                ACADECOL, sis à Bafoussam (Entrée Ecole
                                Normale), a objectif de développer les
                                compétences des Africains actifs et des diplômés
                                pour faciliter leur insertion professionnelle.
                            </p>
                            <p>
                                Sous l'arrêté N° : 000644/MINEFOP, nous
                                proposons des offres diversifiées et courtes,
                                allant de 1 à 12 mois, axées sur l'apprentissage
                                en situation opérationnelle.
                            </p>

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
                                        <i :class="stat.icon"></i>
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

            <!-- FORMATIONS SECTION -->
                <section id="formations" class="section formations">
                <div class="container">
                    <!-- Header -->
                    <div class="formations-header reveal">
                        <span class="badge badge-primary">Nos Programmes</span>
                        <h2 class=" !text-sm">
                            Des formations pour
                            <span class="gradient-text">tous les profils</span>
                        </h2>
                        <p class="section-desc !text-xs">
                            Nos cursus sont conçus pour répondre aux besoins
                            réels du marché de l'emploi en Afrique. Formations
                            courtes de 1 à 12 mois, axées sur la pratique
                            opérationnelle.
                        </p>
                    </div>

                    <!-- Diplômes Nationaux -->
                    <div class="formation-category reveal">
                        <div class="category-header">
                            <i
                                class="fas fa-graduation-cap cat-icon text-xl"
                            ></i>
                            <div>
                                <h3 class="!text-sm md:!text-md lg:!text-xl !font-semi-bold">Diplômes Nationaux d'État</h3>
                                <p class="!text-xs">
                                    National State Diploma - Formation en
                                    présentiel de 12 mois
                                </p>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 mx-auto">
                            <div
                                v-for="diploma in diplomas"
                                :key="diploma.id"
                                class="formation-card"
                            >
                                <div class="card-image h-24 md:h-40 lg:h-52">
                                    <img
                                        :src="getFormationImage(diploma)"
                                        :alt="getText(diploma.titre)"
                                        onerror="this.src = '/img/school1.jpg'"
                                    />
                                    <span class="badge-overlay text-[.4rem]"
                                        >Diplôme d'État</span
                                    >
                                </div>
                                <div class="px-2 lg:px-3 py-2">
                                    <h4 class="text-xs md:text-md">{{ getText(diploma.titre) }}</h4>
                                    <p class="text-[.5rem] italic md:text-md ">
                                        {{
                                            getText(diploma.description_courte)
                                        }}
                                    </p>
                                    <div class="">
                                        <span
                                            class="meta-item"
                                            v-if="diploma.details"
                                        >
                                            <i class="far fa-clock"></i>
                                            {{
                                                getText(
                                                    diploma.details
                                                        .duree_formation,
                                                )
                                            }}
                                        </span>
                                        <span
                                            class="meta-item"
                                            v-if="diploma.details"
                                        >
                                            <i class="fas fa-check-circle"></i>
                                            {{
                                                getText(
                                                    diploma.details
                                                        .mode_enseignement,
                                                )
                                            }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Langues -->
                    <div class="formation-category reveal">
                        <div class="category-header">
                            <i class="fas fa-globe cat-icon text-md lg:!text-2xl"></i>
                            <div>
                                <h3 class="!text-sm md:!text-md lg:!text-xl !font-semi-bold">
                                    Certificats de Compétences Linguistiques
                                </h3>
                                <p class="!text-xs md:!text-sm lg:!text-md ">
                                    Linguistic Skills Certificate - 3 à 6 mois
                                    (Présentiel ou en ligne)
                                </p>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4  gap-2 md">
                            <div
                                v-for="lang in languages"
                                :key="lang.id"
                                class=""
                            >
                                <div class="card-image flag-container">
                                    <div class="flag-wrapper">
                                        <span class="flag text-6xl">{{
                                            getFlag(getText(lang.titre))
                                        }}</span>
                                    </div>
                                    <span class="badge-overlay text-[.2rem]"
                                        >Certificat</span
                                    >
                                </div>
                                <div class="!text-sm md:!text-md lg:!text-xl !font-semi-bold pl-2 py-2">
                                    <h4>{{ getText(lang.titre) }}</h4>
                                    <p class="!text-xs md:!text-sm lg:!text-lg italic !font-semi-bold text-[.3rem]  ">
                                        {{ getText(lang.description_courte) }}
                                    </p>
                                    <div
                                        class="lang-levels"
                                        v-if="lang.details?.niveau_requis"
                                    >
                                        {{
                                            getText(lang.details.niveau_requis)
                                        }}
                                    </div>
                                    <div class="card-meta">
                                        <span
                                            class="meta-item"
                                            v-if="lang.details?.duree_formation"
                                        >
                                            <i class="far fa-clock"></i>
                                            {{
                                                getText(
                                                    lang.details
                                                        .duree_formation,
                                                )
                                            }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Humanitaire -->
                    <div class="formation-category reveal">
                        <div class="category-header">
                            <i class="fas fa-heartbeat cat-icon text-md lg:!text-2xl"></i>
                            <div>
                                <h3 class="!text-sm md:!text-md lg:!text-xl !font-semi-bold">Certificats de Compétences Humanitaires</h3>
                                <p class="!text-xs md:!text-sm lg:!text-md ">
                                    Humanitarian Skills Certificate - Formation
                                    en ligne
                                </p>
                            </div>
                        </div>

                        <div class="category-image-wrapper">
                            <img
                                :src="categoryImages.humanitarian"
                                alt="Formation Humanitaire"
                                class="category-img h-40 md:h-72"
                            />
                        </div>

                        <div class="competences-list">
                            <div
                                v-for="item in humanitarian"
                                :key="item.id"
                                class="competence-item"
                            >
                                <i class="fas fa-check-circle check-icon"></i>
                                <span>{{ getText(item.titre) }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Numérique en Santé -->
                    <div class="formation-category reveal">
                        <div class="category-header">
                            <i
                                class="fas fa-laptop-medical cat-icon text-md lg:!text-2xl"
                            ></i>
                            <div>
                                <h3 class="!text-sm md:!text-md lg:!text-xl !font-semi-bold">Numérique Appliqué à la Santé Publique</h3>
                                <p  class="!text-xs md:!text-sm lg:!text-md ">
                                    Digital Skills in Public Health - Présentiel
                                    ou en ligne
                                </p>
                            </div>
                        </div>

                        <div class="category-image-wrapper">
                            <img
                                :src="categoryImages.digitalHealth"
                                alt="Numérique Santé"
                                class="category-img h-40 md:h-72"
                            />
                        </div>

                        <div class="competences-list">
                            <div
                                v-for="item in digitalHealth"
                                :key="item.id"
                                class="competence-item"
                            >
                                <i class="fas fa-check-circle check-icon"></i>
                                <span>{{ getText(item.titre) }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Management & Recherche -->
                    <div class="formation-category reveal">
                        <div class="category-header">
                            <i class="fas fa-chart-line cat-icon  text-md lg:!text-2xl"></i>
                            <div>
                                <h3  class="!text-sm md:!text-md lg:!text-xl !font-semi-bold">
                                    Management & Recherche Opérationnelle en
                                    Santé
                                </h3>
                                <p class="!text-xs md:!text-sm lg:!text-md ">
                                    Health Management and Operational Research -
                                    Présentiel et en ligne
                                </p>
                            </div>
                        </div>

                        <div class="category-image-wrapper">
                            <img
                                :src="categoryImages.managementResearch"
                                alt="Management Recherche"
                                class="category-img h-40 md:h-72"
                            />
                        </div>

                        <div class="competences-list">
                            <div
                                v-for="item in management"
                                :key="item.id"
                                class="competence-item"
                            >
                                <i class="fas fa-check-circle check-icon"></i>
                                <span>{{ getText(item.titre) }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- CTA -->
                    <div class="formations-cta reveal">
                        <div class="cta-box">
                            <h3>Prêt à démarrer votre formation ?</h3>
                            <p>
                                Toutes nos formations sont certifiées par le
                                Ministère de la Formation Professionnelle du
                                Cameroun (MINEFOP)
                            </p>
                            <div class="cta-actions">
                                <a
                                    href="#contact"
                                    class="btn btn-outline hover:text-white"
                                    >Demander plus d'informations</a
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- CONTACT SECTION -->
            <section id="contact" class="section contact">
                <div class="container">
                    <div class="contact-grid">
                        <div class="contact-info reveal">
                            <span class="badge badge-primary"
                                >Contactez-nous</span
                            >
                            <h2 class="section-title">
                                Prenons
                                <span class="gradient-text">Contact</span>
                            </h2>
                            <p>
                                Vous avez des questions sur nos formations ?
                                Notre équipe est là pour vous accompagner dans
                                votre choix professionnel.
                            </p>

                            <div class="contact-methods">
                                <a href="tel:+237691056965" class="method-item">
                                    <div class="method-icon">
                                        <i class="fas fa-phone-alt"></i>
                                    </div>
                                    <div class="method-content">
                                        <h4>Téléphone / WhatsApp</h4>
                                        <p>+237 691 05 69 65</p>
                                        <p>+237 621 96 86 40</p>
                                    </div>
                                </a>

                                <a
                                    href="mailto:acadecol25@gmail.com"
                                    class="method-item"
                                >
                                    <div class="method-icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div class="method-content">
                                        <h4>Email</h4>
                                        <p>acadecol25@gmail.com</p>
                                    </div>
                                </a>

                                <div class="method-item">
                                    <div class="method-icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div class="method-content">
                                        <h4>Localisation</h4>
                                        <p>Bafoussam - Entrée École Normale</p>
                                        <p>République du Cameroun</p>
                                    </div>
                                </div>
                            </div>

                            <div class="social-links">
                                <a
                                    href="#"
                                    class="social-btn"
                                    aria-label="Facebook"
                                    ><i class="fab fa-facebook-f"></i
                                ></a>
                                <a
                                    href="#"
                                    class="social-btn"
                                    aria-label="LinkedIn"
                                    ><i class="fab fa-linkedin-in"></i
                                ></a>
                                <a
                                    href="#"
                                    class="social-btn"
                                    aria-label="Instagram"
                                    ><i class="fab fa-instagram"></i
                                ></a>
                            </div>
                        </div>

                        <div class="contact-form-container reveal">
                            <form class="contact-form" @submit.prevent>
                                <h3>Demande d'informations</h3>

                                <div class="form-group">
                                    <label for="name">Nom complet</label>
                                    <input
                                        type="text"
                                        id="name"
                                        placeholder="Ex: Jean Dupont"
                                        required
                                    />
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input
                                        type="email"
                                        id="email"
                                        placeholder="Ex: jean@email.com"
                                        required
                                    />
                                </div>

                                <div class="form-group">
                                    <label for="phone">Téléphone</label>
                                    <input
                                        type="tel"
                                        id="phone"
                                        placeholder="Ex: +237 6XX XXX XXX"
                                    />
                                </div>

                                <div class="form-group">
                                    <label for="formation"
                                        >Formation souhaitée</label
                                    >
                                    <select id="formation">
                                        <option value="">
                                            Sélectionnez une formation
                                        </option>
                                        <option>Vendeur en Pharmacie</option>
                                        <option>Délégué Médical</option>
                                        <option>Auxiliaire de Vie</option>
                                        <option>Maintenance Biomédicale</option>
                                        <option>Analyste des Données</option>
                                        <option>Community Management</option>
                                        <option>
                                            Langues (Français, Anglais, etc.)
                                        </option>
                                        <option>
                                            Certificats Humanitaires
                                        </option>
                                        <option>Numérique en Santé</option>
                                        <option>Management & Recherche</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea
                                        id="message"
                                        placeholder="Votre message ici..."
                                        rows="4"
                                    ></textarea>
                                </div>

                                <button
                                    type="submit"
                                    class="btn btn-primary btn-block"
                                >
                                    Envoyer la demande
                                    <i class="fas fa-paper-plane ml-2"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </PublicLayout>
</template>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap");

.home-container {
    /* Color Palette */
    --primary: #2563eb;
    --primary-hover: #1d4ed8;
    --primary-light: #eff6ff;
    --secondary: #10b981;
    --secondary-hover: #059669;
    --accent: #f59e0b;

    --dark: #0f172a;
    --dark-light: #1e293b;
    --gray-100: #f8fafc;
    --gray-200: #e2e8f0;
    --gray-300: #cbd5e1;
    --gray-600: #475569;
    --gray-700: #334155;

    --white: #ffffff;
    --glass: rgba(255, 255, 255, 0.7);
    --glass-border: rgba(255, 255, 255, 0.3);

    /* Typography */
    --font-main: "Inter", sans-serif;
    --font-heading: "Outfit", sans-serif;

    /* Spacing */
    --container-max: 1280px;
    --section-padding: 1rem 1rem;

    /* Utilities */
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
    --shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1);
    --shadow-lg: 0 20px 25px -5px rgb(0 0 0 / 0.1);

    font-family: var(--font-main);
    background-color: var(--white);
    color: var(--dark);
    line-height: 1.6;
}

@media (min-width: 768px) {
    .home-container {
        --section-padding: 2rem 1rem;
    }
}

/* Headings */
h1,
h2,
h3,
h4,
h5,
h6 {
    font-family: var(--font-heading);
    font-weight: 700;
    line-height: 1.2;
}

/* Common Components */
.container {
    width: 100%;
    max-width: var(--container-max);
    margin: 0 auto;
    padding: 0 1rem;
}

@media (min-width: 768px) {
    .container {
        padding: 0 1.5rem;
    }
}

.section {
    padding: var(--section-padding);
}

.btn {
    padding: 0.75rem .7rem;
    border-radius: 50px;
    font-weight: 600;
    /* font-size: 0.9rem; */
    transition: var(--transition);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    text-align: center;
    text-decoration: none;
    cursor: pointer;
}

@media (min-width: 768px) {
    .btn {
        padding: 0.8rem .7rem;
    }
}

.btn-primary {
    background-color: var(--primary);
    color: var(--white);
}

.btn-primary:hover {
    background-color: var(--primary-hover);
    transform: translateY(-2px);
    box-shadow: var(--shadow);
}

.btn-outline {
    border: 2px solid var(--primary);
    color: var(--primary);
    background: transparent;
}

.btn-outline:hover {
    background-color: var(--primary);
    color: var(--white);
}

.gradient-text {
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.badge {
    padding: 0.25rem 0.75rem;
    border-radius: 100px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    display: inline-block;
}

.badge-primary {
    background-color: var(--primary-light);
    color: var(--primary);
}

/* Animation */
.reveal {
    opacity: 0;
    transform: translateY(20px);
    transition:
        opacity 0.8s ease-out,
        transform 0.8s ease-out;
}

.reveal-active {
    opacity: 1;
    transform: translateY(0);
}

/* HERO */
.hero {
    position: relative;
    min-height: 45vh;
    display: flex;
    /* align-items: center; */
    overflow: hidden;
    padding-bottom: rem;
    padding-top: 20px;
}

.hero-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 0;
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
    background: linear-gradient(
        180deg,
        rgba(255, 255, 255, 0.95) 0%,
        rgba(255, 255, 255, 0.85) 100%
    );
    z-index: 1;
}

@media (min-width: 768px) {
    .hero {
        padding-top: 20px;
    }
    .overlay {
        background: linear-gradient(
            90deg,
            rgba(255, 255, 255, 0.95) 40%,
            rgba(255, 255, 255, 0.5) 100%
        );
    }
}

.hero-content {
    z-index: 2;
    position: relative;
}

.hero-text {
    max-width: 100%;
}

@media (min-width: 1024px) {
    .hero-text {
        max-width: 650px;
    }
}

.badge-container {
    margin-bottom: 1rem;
}

.hero h1 {
    /* font-size: clamp(1rem, 6vw, 2rem); */
    margin-bottom: 1rem;
    color: var(--dark);
}

.hero p {
    /* font-size: clamp(1rem, 2.5vw, 1.25rem); */
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

@media (min-width: 768px) {
    .hero-cta {
        flex-direction: row;
        gap: 1.5rem;
        margin-bottom: 3rem;
    }
}

.hero-features {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

@media (min-width: 768px) {
    .hero-features {
        flex-direction: row;
        flex-wrap: wrap;
        gap: 2rem;
    }
}

.h-feature {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 600;
    /* font-size: 0.9rem; */
    color: var(--gray-700);
}

.h-feature .icon {
    color: var(--secondary);
}

/* ABOUT */
.about {
    background-color: var(--gray-100);
}

.about-grid {
    display: grid;
    gap: 3rem;
}

@media (min-width: 768px) {
    .about-grid {
        grid-template-columns: 1fr 1.2fr;
        align-items: center;
        gap: 4rem;
    }
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

@media (min-width: 768px) {
    .floating-card {
        right: -30px;
        padding: 1.5rem;
    }
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
    font-size: clamp(1.2rem, 4vw, 2rem);
    margin: 0.5rem 0 1.5rem;
}

.about-content p {
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

@media (min-width: 768px) {
    .stats-grid {
        gap: 1.5rem;
    }
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

/* FORMATIONS */
.formations {
    background-color: var(--gray-100);
}

.formations-header {
    text-align: center;
    margin-bottom: 1rem;
}

.section-desc {
    max-width: 700px;
    margin: .4rem auto;
    color: var(--gray-600);
    font-size: 1.1rem;
    line-height: 1.7;
}

.formation-category {
    margin-bottom: 1rem;
}

.category-header {
    display: flex;
    align-items: center;
    gap: .5rem;
    margin-bottom: 1rem;
    padding-bottom: 1rem;
    border-bottom: 3px solid var(--primary);
}

.cat-icon {
    color: var(--primary);
    flex-shrink: 0;
    
}

.category-header h3 {
    font-size: clamp(1.5rem, 3vw, 2rem);
    color: var(--dark);
}

.category-header p {
    color: var(--gray-600);
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
    top: .5rem;
    right: 1rem;
    background: var(--primary);
    color: var(--white);
    padding: 0.1rem 0.4rem;
    border-radius: 20px;
    font-weight: 200;
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

.meta-item i {
    color: var(--secondary);
}

.category-image-wrapper {
    margin-bottom: 1rem;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: var(--shadow);
}

.category-img {
    width: 100%;
    object-fit: cover;
}

.competences-list {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: .7rem;
}

.competence-item {
    display: flex;
    align-items: center ;
    gap: 0.75rem;
    background: var(--white);
    padding: .5rem 1rem;
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

.formations-cta {
    margin-top: 5rem;
}

.cta-box {
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    padding: 1rem 2rem;
    border-radius: 25px;
    text-align: center;
    color: var(--white);
}

.cta-box h3 {
    font-size: clamp(1.5rem, 3vw, 2rem);
    margin-bottom: .6rem;
}

.cta-box p {
    max-width: 600px;
    margin: 0 auto 2rem;
    opacity: 0.95;
    font-size: .8rem;
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

/* CONTACT */
.contact {
    background-color: var(--gray-100);
}

.contact-grid {
    display: grid;
    gap: 3rem;
}

@media (min-width: 768px) {
    .contact-grid {
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
    }
}

.contact-info p {
    color: var(--gray-600);
    line-height: 1.7;
    margin-bottom: 2rem;
}

.contact-methods {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.method-item {
    display: flex;
    gap: 1rem;
    text-decoration: none;
    color: inherit;
}

.method-icon {
    width: 50px;
    height: 50px;
    background: var(--white);
    color: var(--primary);
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    box-shadow: var(--shadow-sm);
    flex-shrink: 0;
}

.method-content h4 {
    font-size: 1rem;
    margin-bottom: 0.25rem;
}

.method-content p {
    color: var(--gray-600);
    font-size: 0.9rem;
    margin: 0;
}

.social-links {
    display: flex;
    gap: 1rem;
}

.social-btn {
    width: 45px;
    height: 45px;
    background: var(--white);
    color: var(--gray-700);
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    transition: var(--transition);
    box-shadow: var(--shadow-sm);
}

.social-btn:hover {
    background: var(--primary);
    color: var(--white);
    transform: translateY(-3px);
}

.contact-form {
    background: var(--white);
    padding: 2rem 1.5rem;
    border-radius: 20px;
    box-shadow: var(--shadow);
}

.contact-form h3 {
    font-size: 1.5rem;
    margin-bottom: 1.5rem;
    color: var(--dark);
}

.form-group {
    margin-bottom: 1.25rem;
}

label {
    display: block;
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--gray-700);
    margin-bottom: 0.5rem;
}

input,
select,
textarea {
    width: 100%;
    padding: 0.9rem 1rem;
    border: 1px solid var(--gray-200);
    border-radius: 10px;
    font-family: inherit;
    font-size: 1rem;
    transition: var(--transition);
    background: var(--white);
}

input:focus,
select:focus,
textarea:focus {
    border-color: var(--primary);
    outline: none;
    box-shadow: 0 0 0 3px var(--primary-light);
}

.btn-block {
    width: 100%;
    justify-content: center;
    padding: 1rem;
}

@media (min-width: 768px) {
    .contact-form {
        padding: 2.5rem;
    }
}
</style>

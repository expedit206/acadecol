<script setup>
import PublicLayout from "@/Layouts/PublicLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import { onMounted, computed } from "vue";

import { useLocale } from "@/Composables/useLocale";

const { trans: getText, locale } = useLocale();

const props = defineProps({
    formations: {
        type: Array,
        default: () => [],
    },
    categories: {
        type: Array,
        default: () => [],
    },
    latestNews: {
        type: Array,
        default: () => [],
    },
});

// --- Utility Functions ---

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
    // Filter by badge containing "Diplôme" to catch all National State Diplomas
    return props.formations.filter((f) => {
        const badge = f.badge || "";
        return badge.includes("Diplôme") || badge.includes("Diploma");
    });
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
const stats = computed(() => [
    {
        icon: "fas fa-certificate",
        label: t.stats.accreditations[locale.value],
        value: "MINEFOP",
    },
    {
        icon: "fas fa-book-open",
        label: t.stats.trainings[locale.value],
        value: "30+",
    },
    {
        icon: "fas fa-users",
        label: t.stats.expertise[locale.value],
        value: t.stats.valueExpertise[locale.value],
    },
    {
        icon: "fas fa-globe",
        label: t.stats.mode[locale.value],
        value: t.stats.valueMode[locale.value],
    },
]);

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

// --- Translations ---
const t = {
    hero: {
        badge: {
            fr: "CFP ACADECOL",
            en: "CFP ACADECOL",
        },
        title: {
            fr: "La formation professionnelle",
            en: "Professional Training",
        },
        highlight: {
            fr: "qui vous connecte au terrain",
            en: "that connects you to the field",
        },
        description: {
            fr: "Basé à Bafoussam, ACADECOL est un centre de formation professionnelle axé sur la pratique, l'innovation locale et l'insertion professionnelle.",
            en: "Based in Bafoussam, ACADECOL is a professional training center focused on practice, local innovation and professional integration.",
        },
        stats: {
            items: [
                {
                    value: "150+",
                    label: { fr: "Apprenants formés", en: "Students trained" },
                },
                {
                    value: "100%",
                    label: { fr: "Taux d'insertion", en: "Placement rate" },
                },
                { value: "20+", label: { fr: "Partenaires", en: "Partners" } },
            ],
        },
        buttons: {
            primary: {
                fr: "Découvrir nos formations",
                en: "Discover our courses",
            },
            secondary: { fr: "Devenir partenaire", en: "Become a partner" },
        },
        features: [
            {
                title: { fr: "Formation Pratique", en: "Practical Training" },
                desc: {
                    fr: "80% pratique, 20% théorie",
                    en: "80% practice, 20% theory",
                },
                icon: "fas fa-users",
            },
            {
                title: {
                    fr: "Insertion Garantie",
                    en: "Guaranteed Integration",
                },
                desc: {
                    fr: "Taux d'insertion supérieur à 100%",
                    en: "Placement rate over 100%",
                },
                icon: "fas fa-briefcase",
            },
            {
                title: { fr: "Excellence", en: "Excellence" },
                desc: {
                    fr: "Formateurs expérimentés du terrain",
                    en: "Experienced field trainers",
                },
                icon: "fas fa-medal",
            },
        ],
    },
    about: {
        badge: {
            fr: "À Propos de Nous",
            en: "About Us",
        },
        title: {
            fr: "Plus qu'un Institut, une",
            en: "More than an Institute, a",
        },
        highlight: {
            fr: "Passerelle vers l'Emploi",
            en: "Gateway to Employment",
        },
        desc1: {
            fr: "L'Institut de Formation Professionnelle ACADECOL, sis à Bafoussam (Entrée Ecole Normale), a objectif de développer les compétences des Africains actifs et des diplômés pour faciliter leur insertion professionnelle.",
            en: "The ACADECOL Professional Training Institute, located in Bafoussam (Teachers' Training College Entrance), aims to develop the skills of active Africans and graduates to facilitate their professional integration.",
        },
        desc2: {
            fr: "Sous l'arrêté N° : 000644/MINEFOP, nous proposons des offres diversifiées et courtes, allant de 1 à 12 mois, axées sur l'apprentissage en situation opérationnelle.",
            en: "Under Decree No: 000644/MINEFOP, we offer diversified and short courses, ranging from 1 to 12 months, focused on learning in operational situations.",
        },
        domains: {
            fr: "Nos 5 Domaines Ciblés :",
            en: "Our 5 Targeted Areas:",
        },
    },
    stats: {
        accreditations: { fr: "Accréditations", en: "Accreditations" },
        trainings: { fr: "Formations", en: "Trainings" },
        expertise: { fr: "Expertise", en: "Expertise" },
        mode: { fr: "Mode", en: "Mode" },
        valueMode: { fr: "Bilingue", en: "Bilingual" },
        valueExpertise: { fr: "Pratique", en: "Practical" },
    },
    formations: {
        badge: { fr: "Nos Programmes", en: "Our Programs" },
        title: { fr: "Des formations pour", en: "Training for" },
        highlight: { fr: "tous les profils", en: "all profiles" },
        desc: {
            fr: "Nos cursus sont conçus pour répondre aux besoins réels du marché de l'emploi en Afrique. Formations courtes de 1 à 12 mois, axées sur la pratique opérationnelle.",
            en: "Our courses are designed to meet the real needs of the African job market. Short courses from 1 to 12 months, focused on operational practice.",
        },
        national: {
            title: {
                fr: "Diplômes Nationaux d'État",
                en: "National State Diplomas",
            },
            subtitle: {
                fr: "National State Diploma - Formation en présentiel de 12 mois",
                en: "National State Diploma - 12-month on-site training",
            },
            badge: { fr: "Diplôme d'État", en: "State Diploma" },
        },
        languages: {
            title: {
                fr: "Certificats de Compétences Linguistiques",
                en: "Linguistic Skills Certificates",
            },
            subtitle: {
                fr: "Linguistic Skills Certificate - 3 à 6 mois (Présentiel ou en ligne)",
                en: "Linguistic Skills Certificate - 3 to 6 months (On-site or Online)",
            },
            defaultDesc: {
                fr: "Formation linguistique certifiante",
                en: "Certified language training",
            },
            defaultDuration: { fr: "3-6 mois", en: "3-6 months" },
            viewAll: { fr: "Toutes les langues", en: "All languages" },
        },
        humanitarian: {
            title: {
                fr: "Certificats de Compétences Humanitaires",
                en: "Humanitarian Skills Certificates",
            },
            subtitle: {
                fr: "Humanitarian Skills Certificate - Formation en ligne",
                en: "Humanitarian Skills Certificate - Online Training",
            },
        },
        digital: {
            title: {
                fr: "Numérique Appliqué à la Santé Publique",
                en: "Digital Applied to Public Health",
            },
            subtitle: {
                fr: "Digital Skills in Public Health - Présentiel ou en ligne",
                en: "Digital Skills in Public Health - On-site or Online",
            },
        },
        management: {
            title: {
                fr: "Management & Recherche Opérationnelle en Santé",
                en: "Management & Operational Research in Health",
            },
            subtitle: {
                fr: "Health Management and Operational Research - Présentiel et en ligne",
                en: "Health Management and Operational Research - On-site and Online",
            },
        },
        cta: {
            title: {
                fr: "Prêt à démarrer votre formation ?",
                en: "Ready to start your training?",
            },
            desc: {
                fr: "Toutes nos formations sont certifiées par le Ministère de la Formation Professionnelle du Cameroun (MINEFOP)",
                en: "All our training courses are certified by the Ministry of Vocational Training of Cameroon (MINEFOP)",
            },
            button: {
                fr: "Demander plus d'informations",
                en: "Request more information",
            },
        },
    },
    contact: {
        badge: { fr: "Contactez-nous", en: "Contact Us" },
        title: { fr: "Prenons", en: "Let's Get in" },
        highlight: { fr: "Contact", en: "Touch" },
        desc: {
            fr: "Vous avez des questions sur nos formations ? Notre équipe est là pour vous accompagner dans votre choix professionnel.",
            en: "Do you have questions about our training courses? Our team is here to support you in your professional choice.",
        },
        methods: {
            phone: {
                title: { fr: "Téléphone / WhatsApp", en: "Phone / WhatsApp" },
            },
            email: { title: { fr: "Email", en: "Email" } },
            location: {
                title: { fr: "Localisation", en: "Location" },
                desc: {
                    fr: "Bafoussam - Entrée École Normale",
                    en: "Bafoussam - Teachers' Training College Entrance",
                },
                country: {
                    fr: "République du Cameroun",
                    en: "Republic of Cameroon",
                },
            },
        },
        form: {
            title: {
                fr: "Demande d'informations",
                en: "Request for Information",
            },
            name: {
                label: { fr: "Nom complet", en: "Full Name" },
                placeholder: { fr: "Ex: Jean Dupont", en: "Ex: John Doe" },
            },
            email: {
                label: { fr: "Email", en: "Email" },
                placeholder: {
                    fr: "Ex: jean@email.com",
                    en: "Ex: john@email.com",
                },
            },
            phone: {
                label: { fr: "Téléphone", en: "Phone" },
                placeholder: {
                    fr: "Ex: +237 6XX XXX XXX",
                    en: "Ex: +237 6XX XXX XXX",
                },
            },
            formation: {
                label: { fr: "Formation souhaitée", en: "Desired Training" },
                placeholder: {
                    fr: "Sélectionnez une formation",
                    en: "Select a training",
                },
                options: [
                    {
                        fr: "Vendeur en Pharmacie",
                        en: "Pharmacy Sales Assistant",
                    },
                    { fr: "Délégué Médical", en: "Medical Representative" },
                    { fr: "Auxiliaire de Vie", en: "Caregiver" },
                    {
                        fr: "Maintenance Biomédicale",
                        en: "Biomedical Maintenance",
                    },
                    { fr: "Analyste des Données", en: "Data Analyst" },
                    { fr: "Community Management", en: "Community Management" },
                    {
                        fr: "Langues (Français, Anglais, etc.)",
                        en: "Languages (French, English, etc.)",
                    },
                    {
                        fr: "Certificats Humanitaires",
                        en: "Humanitarian Certificates",
                    },
                    { fr: "Numérique en Santé", en: "Digital Health" },
                    {
                        fr: "Management & Recherche",
                        en: "Management & Research",
                    },
                ],
            },
            message: {
                label: { fr: "Message", en: "Message" },
                placeholder: {
                    fr: "Votre message ici...",
                    en: "Your message here...",
                },
            },
            submit: { fr: "Envoyer la demande", en: "Send Request" },
        },
    },
    news: {
        badge: { fr: "Actualités", en: "News" },
        title: { fr: "Dernières", en: "Latest" },
        highlight: { fr: "Nouvelles", en: "News" },
        desc: {
            fr: "Restez informé des événements et des opportunités chez ACADECOL.",
            en: "Stay informed about events and opportunities at ACADECOL.",
        },
        readMore: { fr: "Lire la suite", en: "Read more" },
        viewAll: { fr: "Voir toutes les actualités", en: "View all news" },
    },
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
                class="py-12 md:py-20 relative overflow-hidden bg-slate-900"
            >
                <!-- Background Gradient Effect -->
                <div
                    class="absolute top-0 right-0 w-1/2 h-full bg-gradient-to-l from-blue-900/20 to-transparent pointer-events-none"
                ></div>

                <div class="max-w-7xl mx-auto px-4 md:px-6 relative z-10">
                    <div
                        class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center"
                    >
                        <!-- TEXTE À GAUCHE -->
                        <div class="opacity-0 translate-y-5 reveal text-white">
                            <!-- Badge -->
                            <div class="mb-6">
                                <span
                                    class="inline-block px-4 py-1.5 text-xs font-bold uppercase tracking-wider rounded-full border border-blue-500/30 text-blue-400 bg-blue-900/30"
                                >
                                    {{ t.hero.badge[locale] }}
                                </span>
                            </div>

                            <!-- Title -->
                            <h1
                                class="text-4xl md:text-5xl lg:text-6xl font-black leading-tight mb-6"
                            >
                                {{ t.hero.title[locale] }}
                                <span class="block text-amber-500 mt-2">
                                    {{ t.hero.highlight[locale] }}
                                </span>
                            </h1>

                            <!-- Description -->
                            <p
                                class="text-slate-300 mb-8 text-lg leading-relaxed max-w-lg"
                            >
                                {{ t.hero.description[locale] }}
                            </p>

                            <!-- Stats -->
                            <div
                                class="flex flex-wrap gap-8 mb-10 border-t border-slate-800 pt-6"
                            >
                                <div
                                    v-for="(stat, index) in t.hero.stats.items"
                                    :key="index"
                                >
                                    <div
                                        class="text-2xl font-bold text-blue-400"
                                    >
                                        {{ stat.value }}
                                    </div>
                                    <div
                                        class="text-xs text-slate-400 uppercase tracking-wide font-medium"
                                    >
                                        {{ stat.label[locale] }}
                                    </div>
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="flex flex-wrap gap-4">
                                <a
                                    href="#formations"
                                    class="inline-flex items-center justify-center gap-2 px-8 py-3.5 rounded-md font-bold bg-blue-600 text-white hover:bg-blue-700 transition shadow-lg text-sm uppercase tracking-wide transform hover:-translate-y-1"
                                >
                                    {{ t.hero.buttons.primary[locale] }}
                                    <i class="fas fa-arrow-right"></i>
                                </a>

                                <a
                                    href="#contact"
                                    class="inline-flex items-center justify-center gap-2 px-8 py-3.5 rounded-md font-bold bg-emerald-600 text-white hover:bg-emerald-700 transition shadow-lg text-sm uppercase tracking-wide border border-emerald-500 transform hover:-translate-y-1"
                                >
                                    {{ t.hero.buttons.secondary[locale] }}
                                </a>
                            </div>
                        </div>

                        <!-- CARTE À DROITE (No Image) -->
                        <div class="hidden lg:block lg:order-2">
                            <div
                                class="relative bg-slate-800/40 backdrop-blur-xl border border-slate-700/50 rounded-xl p-8 max-w-md mx-auto transform rotate-1 hover:rotate-0 transition duration-500 shadow-2xl"
                            >
                                <div class="flex flex-col gap-8">
                                    <div
                                        v-for="(feat, i) in t.hero.features"
                                        :key="i"
                                        class="flex gap-4 items-start group"
                                    >
                                        <div
                                            class="w-12 h-12 rounded-lg bg-blue-900/30 flex items-center justify-center shrink-0 border border-blue-500/20 group-hover:bg-blue-600/20 transition"
                                        >
                                            <i
                                                :class="[
                                                    feat.icon,
                                                    'text-amber-500 text-xl group-hover:text-amber-400',
                                                ]"
                                            ></i>
                                        </div>
                                        <div>
                                            <h3
                                                class="text-white font-bold text-lg mb-1 group-hover:text-blue-400 transition"
                                            >
                                                {{ feat.title[locale] }}
                                            </h3>
                                            <p
                                                class="text-slate-400 text-sm leading-snug"
                                            >
                                                {{ feat.desc[locale] }}
                                            </p>
                                        </div>
                                    </div>
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
                                    src="/img/ACADECOL_20260107_114006_0000 (1).png"
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
                            <span class="badge badge-primary">{{
                                t.about.badge[locale]
                            }}</span>
                            <h2 class="text-xl">
                                {{ t.about.title[locale] }}
                                <span class="gradient-text">{{
                                    t.about.highlight[locale]
                                }}</span>
                            </h2>
                            <p class="text">
                                {{ t.about.desc1[locale] }}
                            </p>
                            <p>
                                {{ t.about.desc2[locale] }}
                            </p>

                            <div class="domains">
                                <h4>{{ t.about.domains[locale] }}</h4>
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
                        <span class="badge badge-primary">{{
                            t.formations.badge[locale]
                        }}</span>
                        <h2 class="text-2xl md:text-4xl font-bold mt-2">
                            {{ t.formations.title[locale] }}
                            <span class="gradient-text">{{
                                t.formations.highlight[locale]
                            }}</span>
                        </h2>
                        <p
                            class="section-desc text-base md:text-lg text-gray-600 mt-4 max-w-2xl mx-auto"
                        >
                            {{ t.formations.desc[locale] }}
                        </p>
                    </div>

                    <!-- Diplômes Nationaux -->
                    <div class="formation-category reveal">
                        <div class="category-header">
                            <i
                                class="fas fa-graduation-cap cat-icon text-xl"
                            ></i>
                            <div>
                                <h3
                                    class="text-lg md:text-xl lg:text-2xl font-bold"
                                >
                                    {{ t.formations.national.title[locale] }}
                                </h3>
                                <p class="text-sm md:text-base text-gray-500">
                                    {{ t.formations.national.subtitle[locale] }}
                                </p>
                            </div>
                        </div>

                        <div
                            class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 mx-auto"
                        >
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
                                    <span
                                        class="badge-overlay text-xs font-bold"
                                        >{{
                                            diploma.badge ||
                                            t.formations.national.badge[locale]
                                        }}</span
                                    >
                                </div>
                                <div class="px-3 lg:px-4 py-3">
                                    <h4
                                        class="text-sm md:text-lg font-bold text-gray-900 mb-1"
                                    >
                                        {{ getText(diploma.titre) }}
                                    </h4>
                                    <p
                                        class="text-xs md:text-sm text-gray-600 italic mb-2"
                                    >
                                        {{
                                            getText(diploma.description_courte)
                                        }}
                                    </p>
                                    <div class="flex items-center gap-2 mt-2">
                                        <span
                                            class="meta-item"
                                            v-if="diploma.duree"
                                        >
                                            <i class="far fa-clock"></i>
                                            {{ diploma.duree }}
                                        </span>
                                        <span
                                            class="meta-item"
                                            v-if="diploma.description_courte"
                                        >
                                            <i class="fas fa-check-circle"></i>
                                            {{
                                                getText(
                                                    diploma.description_courte,
                                                )
                                            }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Langues -->
                    <!-- Section Certificats de Compétences Linguistiques -->
                    <div class="formation-category reveal mb-8">
                        <!-- Header de catégorie -->
                        <div
                            class="flex items-center gap-3 mb-4 pb-3 border-b-3 border-blue-600"
                        >
                            <div
                                class="w-8 h-8 md:w-10 md:h-10 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 shrink-0"
                            >
                                <i
                                    class="fas fa-globe text-sm md:text-base"
                                ></i>
                            </div>
                            <div>
                                <h3
                                    class="text-sm md:text-base lg:text-lg font-bold text-gray-900"
                                >
                                    {{ t.formations.languages.title[locale] }}
                                </h3>
                                <p class="text-[10px] md:text-xs text-gray-500">
                                    {{
                                        t.formations.languages.subtitle[locale]
                                    }}
                                </p>
                            </div>
                        </div>

                        <!-- Grille des cartes - Redesign -->
                        <div
                            class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2 md:gap-3"
                        >
                            <div
                                v-for="lang in languages"
                                :key="lang.id"
                                class="group bg-white rounded-lg overflow-hidden border border-gray-100 hover:border-blue-200 hover:shadow-md transition-all duration-300"
                            >
                                <!-- Drapeau - Design épuré -->
                                <div
                                    class="relative h-20 sm:h-24 md:h-28 bg-gradient-to-br from-gray-50 to-gray-100 flex items-center justify-center"
                                >
                                    <span
                                        class="text-4xl sm:text-5xl md:text-6xl transform group-hover:scale-110 transition-transform duration-300"
                                    >
                                        {{ getFlag(getText(lang.titre)) }}
                                    </span>
                                    <!-- Badge niveau -->
                                    <span
                                        v-if="lang.description_courte"
                                        class="absolute bottom-2 right-2 bg-blue-600 text-white text-xs font-bold px-2 py-0.5 rounded-full"
                                    >
                                        {{ getText(lang.description_courte) }}
                                    </span>
                                </div>

                                <!-- Contenu compact -->
                                <div class="p-3 md:p-4">
                                    <!-- Titre et drapeau mini -->
                                    <div class="flex items-center gap-2 mb-2">
                                        <span class="text-lg md:text-2xl">{{
                                            getFlag(getText(lang.titre))
                                        }}</span>
                                        <h4
                                            class="text-sm md:text-base font-bold text-gray-900 truncate"
                                        >
                                            {{ getText(lang.titre) }}
                                        </h4>
                                    </div>

                                    <!-- Description courte -->
                                    <p
                                        class="text-xs md:text-sm text-gray-500 line-clamp-2 mb-3 min-h-[1.25rem]"
                                    >
                                        {{
                                            getText(lang.description_courte) ||
                                            t.formations.languages.defaultDesc[
                                                locale
                                            ]
                                        }}
                                    </p>

                                    <!-- Métadonnées -->
                                    <div
                                        class="flex items-center justify-between"
                                    >
                                        <div
                                            class="flex items-center gap-1.5 text-gray-500"
                                        >
                                            <i
                                                class="fas heroicon-o-clock fa-clock text-xs"
                                            ></i>
                                            <span
                                                class="text-xs md:text-sm font-medium"
                                            >
                                                {{
                                                    lang.duree ||
                                                    t.formations.languages
                                                        .defaultDuration[locale]
                                                }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Lien voir tout (optionnel) -->
                        <div class="text-right mt-3">
                            <a
                                href="#"
                                class="text-sm text-blue-600 font-bold inline-flex items-center gap-1 hover:gap-2 transition-all"
                            >
                                {{ t.formations.languages.viewAll[locale] }}
                                <i class="fas fa-arrow-right text-xs"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Humanitaire -->
                    <div class="formation-category reveal">
                        <div class="category-header">
                            <i
                                class="fas fa-heartbeat cat-icon text-md lg:!text-2xl"
                            ></i>
                            <div>
                                <h3
                                    class="text-lg md:text-xl lg:text-2xl font-bold"
                                >
                                    {{
                                        t.formations.humanitarian.title[locale]
                                    }}
                                </h3>
                                <p class="text-sm md:text-base text-gray-500">
                                    {{
                                        t.formations.humanitarian.subtitle[
                                            locale
                                        ]
                                    }}
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
                                <h3
                                    class="text-lg md:text-xl lg:text-2xl font-bold"
                                >
                                    {{ t.formations.digital.title[locale] }}
                                </h3>
                                <p class="text-sm md:text-base text-gray-500">
                                    {{ t.formations.digital.subtitle[locale] }}
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
                            <i
                                class="fas fa-chart-line cat-icon text-md lg:!text-2xl"
                            ></i>
                            <div>
                                <h3
                                    class="text-lg md:text-xl lg:text-2xl font-bold"
                                >
                                    {{ t.formations.management.title[locale] }}
                                </h3>
                                <p class="text-sm md:text-base text-gray-500">
                                    {{
                                        t.formations.management.subtitle[locale]
                                    }}
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
                            <h3>{{ t.formations.cta.title[locale] }}</h3>
                            <p>
                                {{ t.formations.cta.desc[locale] }}
                            </p>
                            <div class="cta-actions">
                                <a
                                    href="#contact"
                                    class="btn btn-outline hover:text-white"
                                    >{{ t.formations.cta.button[locale] }}</a
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- NEWS SECTION -->
            <section
                v-if="latestNews && latestNews.length > 0"
                id="news"
                class="section news bg-white"
            >
                <div class="container">
                    <div class="text-center mb-12 reveal">
                        <span class="badge badge-primary">{{
                            t.news.badge[locale]
                        }}</span>
                        <h2 class="text-3xl mt-4">
                            {{ t.news.title[locale] }}
                            <span class="gradient-text">{{
                                t.news.highlight[locale]
                            }}</span>
                        </h2>
                        <p class="section-desc">
                            {{ t.news.desc[locale] }}
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                        <article
                            v-for="item in latestNews"
                            :key="item.id"
                            class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 group overflow-hidden border border-gray-100 flex flex-col h-full reveal"
                        >
                            <Link
                                :href="route('news.show', item.slug)"
                                class="flex flex-col h-full"
                            >
                                <div class="h-48 overflow-hidden relative">
                                    <img
                                        v-if="item.image"
                                        :src="'/' + item.image"
                                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                        :alt="getText(item.title)"
                                    />
                                    <div
                                        v-else
                                        class="w-full h-full bg-gray-100 flex items-center justify-center"
                                    >
                                        <i
                                            class="fas fa-newspaper text-4xl text-gray-300"
                                        ></i>
                                    </div>
                                    <div class="absolute bottom-4 left-4">
                                        <span
                                        <span
                                            class="bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg"
                                        >
                                            {{
                                                new Date(
                                                    item.published_at,
                                                ).toLocaleDateString(
                                                    locale === "en"
                                                        ? "en-US"
                                                        : "fr-FR",
                                                    {
                                                        day: "numeric",
                                                        month: "short",
                                                    },
                                                )
                                            }}
                                        </span>
                                    </div>
                                </div>
                                <div class="p-6 flex flex-col flex-1">
                                    <h3
                                        class="text-lg font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors line-clamp-2"
                                    >
                                        {{ getText(item.title) }}
                                    </h3>
                                    <p
                                        class="text-gray-600 text-sm mb-6 line-clamp-3 flex-1"
                                    >
                                        {{
                                            getText(item.content).substring(
                                                0,
                                                100,
                                            )
                                        }}...
                                    </p>
                                    <div
                                        class="flex items-center text-blue-600 font-bold text-sm mt-auto"
                                    >
                                        {{ t.news.readMore[locale] }}
                                        <i
                                            class="fas fa-arrow-right ml-2 text-sm group-hover:translate-x-1 transition-transform"
                                        ></i>
                                    </div>
                                </div>
                            </Link>
                        </article>
                    </div>

                    <div class="text-center reveal">
                        <Link
                            :href="route('news')"
                            class="inline-flex items-center gap-2 text-blue-600 font-bold hover:gap-3 transition-all"
                        >
                            {{ t.news.viewAll[locale] }}
                            <i class="fas fa-arrow-right"></i>
                        </Link>
                    </div>
                </div>
            </section>

            <!-- CONTACT SECTION -->
            <section id="contact" class="section contact">
                <div class="container">
                    <div class="contact-grid">
                        <div class="contact-info reveal">
                            <span class="badge badge-primary">{{
                                t.contact.badge[locale]
                            }}</span>
                            <h2 class="section-title">
                                {{ t.contact.title[locale] }}
                                <span class="gradient-text">{{
                                    t.contact.highlight[locale]
                                }}</span>
                            </h2>
                            <p>
                                {{ t.contact.desc[locale] }}
                            </p>

                            <div class="contact-methods">
                                <a href="tel:+237691056965" class="method-item">
                                    <div class="method-icon">
                                        <i class="fas fa-phone-alt"></i>
                                    </div>
                                    <div class="method-content">
                                        <h4>
                                            {{
                                                t.contact.methods.phone.title[
                                                    locale
                                                ]
                                            }}
                                        </h4>
                                        <p>+237 691 05 69 65</p>
                                        <p>+237 691 05 69 65</p>
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
                                        <h4>
                                            {{
                                                t.contact.methods.email.title[
                                                    locale
                                                ]
                                            }}
                                        </h4>
                                        <p>acadecol25@gmail.com</p>
                                    </div>
                                </a>

                                <div class="method-item">
                                    <div class="method-icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div class="method-content">
                                        <h4>
                                            {{
                                                t.contact.methods.location
                                                    .title[locale]
                                            }}
                                        </h4>
                                        <p>
                                            {{
                                                t.contact.methods.location.desc[
                                                    locale
                                                ]
                                            }}
                                        </p>
                                        <p>
                                            {{
                                                t.contact.methods.location
                                                    .country[locale]
                                            }}
                                        </p>
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
                                <h3>{{ t.contact.form.title[locale] }}</h3>

                                <div class="form-group">
                                    <label for="name">{{
                                        t.contact.form.name.label[locale]
                                    }}</label>
                                    <input
                                        type="text"
                                        id="name"
                                        :placeholder="
                                            t.contact.form.name.placeholder[
                                                locale
                                            ]
                                        "
                                        required
                                    />
                                </div>

                                <div class="form-group">
                                    <label for="email">{{
                                        t.contact.form.email.label[locale]
                                    }}</label>
                                    <input
                                        type="email"
                                        id="email"
                                        :placeholder="
                                            t.contact.form.email.placeholder[
                                                locale
                                            ]
                                        "
                                        required
                                    />
                                </div>

                                <div class="form-group">
                                    <label for="phone">{{
                                        t.contact.form.phone.label[locale]
                                    }}</label>
                                    <input
                                        type="tel"
                                        id="phone"
                                        :placeholder="
                                            t.contact.form.phone.placeholder[
                                                locale
                                            ]
                                        "
                                    />
                                </div>

                                <div class="form-group">
                                    <label for="formation">{{
                                        t.contact.form.formation.label[locale]
                                    }}</label>
                                    <select id="formation">
                                        <option value="">
                                            {{
                                                t.contact.form.formation
                                                    .placeholder[locale]
                                            }}
                                        </option>
                                        <option
                                            v-for="(opt, i) in t.contact.form
                                                .formation.options"
                                            :key="i"
                                            :value="opt.fr"
                                        >
                                            {{ opt[locale] }}
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="message">{{
                                        t.contact.form.message.label[locale]
                                    }}</label>
                                    <textarea
                                        id="message"
                                        :placeholder="
                                            t.contact.form.message.placeholder[
                                                locale
                                            ]
                                        "
                                        rows="4"
                                    ></textarea>
                                </div>

                                <button
                                    type="submit"
                                    class="btn btn-primary btn-block"
                                >
                                    {{ t.contact.form.submit[locale] }}
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
    padding: 0.75rem 0.7rem;
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
        padding: 0.8rem 0.7rem;
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
    font-size: 0.75rem;
    font-weight: 600;
    text-align: center;
}

@media (min-width: 768px) {
    .floating-card .label {
        font-size: 0.875rem;
    }
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
    font-size: 1rem;
    color: var(--gray-700);
    padding-left: 1.25rem;
    position: relative;
}

@media (min-width: 768px) {
    .domains li {
        font-size: 1.05rem;
    }
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

@media (min-width: 768px) {
    .stat-info h3 {
        font-size: 1.125rem;
    }
    .stat-info p {
        font-size: 0.9rem;
    }
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
    margin: 0.4rem auto;
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
    gap: 0.5rem;
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
    top: 0.5rem;
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
    gap: 0.7rem;
}

.competence-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    background: var(--white);
    padding: 0.5rem 1rem;
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
    margin-bottom: 0.6rem;
}

.cta-box p {
    margin: 0 auto 2rem;
    opacity: 0.95;
    font-size: 0.85rem;
}

@media (min-width: 768px) {
    .cta-box p {
        font-size: 1rem;
    }
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

@media (min-width: 768px) {
    .method-content h4 {
        font-size: 1.125rem;
    }
    .method-content p {
        font-size: 1rem;
    }
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
    font-weight: 600;
    color: var(--gray-700);
    margin-bottom: 0.5rem;
}

@media (min-width: 768px) {
    label {
        font-size: 1rem;
    }
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

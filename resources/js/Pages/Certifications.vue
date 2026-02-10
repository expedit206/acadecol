<script setup>
import { Head } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";
import PublicLayout from "@/Layouts/PublicLayout.vue";
import { ref } from "vue";

const selectedDomain = ref("langues");

const domains = {
    langues: {
        icon: "🌍",
        title: "Certifications Linguistiques",
        color: "from-blue-400 to-blue-600",
        description:
            "Maîtrisez les langues internationales avec des certifications reconnues mondialement",
        certifications: [
            {
                name: "Français",
                levels: "A1, A2, B1, B2, C1, C2",
                duration: "3-6 mois",
                format: "Présentiel & Ligne",
            },
            {
                name: "Anglais",
                levels: "A1-C2, TOEFL, TOEIC, IELTS",
                duration: "3-6 mois",
                format: "Présentiel & Ligne",
            },
            {
                name: "Espagnol",
                levels: "A1, A2, B1, B2, C1",
                duration: "3-6 mois",
                format: "Présentiel & Ligne",
            },
            {
                name: "Allemand",
                levels: "A1, A2, B1, B2, C1",
                duration: "3-6 mois",
                format: "Présentiel & Ligne",
            },
            {
                name: "Italien",
                levels: "A1, A2, B1, B2, C1, C2",
                duration: "3-6 mois",
                format: "Présentiel & Ligne",
            },
            {
                name: "Chinois",
                levels: "A1, A2, B1, B2, C1",
                duration: "3-6 mois",
                format: "Présentiel & Ligne",
            },
        ],
    },
    paramedical: {
        icon: "⚕️",
        title: "Certifications Paramédicales & Biomédicales",
        color: "from-green-400 to-green-600",
        description:
            "Développez vos compétences dans le secteur de la santé avec des diplômes d'État",
        certifications: [
            {
                name: "Vendeur en Pharmacie",
                duration: "12 mois",
                format: "Présentiel",
                level: "Diplôme National d'État",
            },
            {
                name: "Délégué / Visiteur Médical",
                duration: "12 mois",
                format: "Présentiel",
                level: "Diplôme National d'État",
            },
            {
                name: "Auxiliaire de Vie / Care Givers",
                duration: "12 mois",
                format: "Présentiel",
                level: "Diplôme National d'État",
            },
            {
                name: "Maintenance Biomédicale",
                duration: "12 mois",
                format: "Présentiel",
                level: "Diplôme National d'État",
            },
        ],
    },
    humanitaire: {
        icon: "❤️",
        title: "Certifications Humanitaires",
        color: "from-red-400 to-red-600",
        description:
            "Intervenez efficacement dans les contextes humanitaires et les crises sanitaires",
        certifications: [
            {
                name: "Fondamentaux de l'Humanitaire",
                duration: "1-2 mois",
                format: "En ligne",
            },
            {
                name: "Épidémiologie de terrain & Urgences Sanitaires",
                duration: "2 mois",
                format: "En ligne",
            },
            {
                name: "Logistique Humanitaire",
                duration: "1-2 mois",
                format: "En ligne",
            },
            {
                name: "Éducation en Situation d'Urgence (ESU)",
                duration: "1-2 mois",
                format: "En ligne",
            },
            {
                name: "Coordination de l'Action Sanitaire en Crise",
                duration: "2 mois",
                format: "En ligne",
            },
            {
                name: "Infirmier dans l'Humanitaire",
                duration: "2 mois",
                format: "En ligne",
            },
            {
                name: "Psychologue Humanitaire & Santé Mentale",
                duration: "2 mois",
                format: "En ligne",
            },
            {
                name: "Nutrition Humanitaire",
                duration: "1-2 mois",
                format: "En ligne",
            },
            {
                name: "Droit Humanitaire International",
                duration: "1 mois",
                format: "En ligne",
            },
        ],
    },
    numerique: {
        icon: "💻",
        title: "Certifications Numériques en Santé",
        color: "from-purple-400 to-purple-600",
        description:
            "Maîtrisez les outils digitaux et l'IA pour la santé publique",
        certifications: [
            {
                name: "Data Analyst / Data Scientist",
                duration: "12 mois",
                format: "Présentiel & Ligne",
                level: "Diplôme National d'État",
            },
            {
                name: "Analyse des Données Sanitaires",
                duration: "2-3 mois",
                format: "Présentiel & Ligne",
                tools: "Excel, SPSS, DHIS2, Kobo, Python",
            },
            {
                name: "Cartographie en Santé Publique",
                duration: "2 mois",
                format: "Présentiel & Ligne",
                tools: "QGIS, ArcGIS",
            },
            {
                name: "IA pour Professionnels de Santé",
                duration: "1-2 mois",
                format: "Présentiel & Ligne",
            },
            {
                name: "IA pour Experts Santé Publique",
                duration: "2 mois",
                format: "Présentiel & Ligne",
            },
        ],
    },
    management: {
        icon: "📊",
        title: "Certifications Management & Recherche Opérationnelle",
        color: "from-orange-400 to-orange-600",
        description:
            "Développez des compétences en gestion et recherche appliquée en santé",
        certifications: [
            {
                name: "Conception de Protocole de Recherche en Santé",
                duration: "2 mois",
                format: "Présentiel & Ligne",
            },
            {
                name: "Conduite d'Enquête CAP (Knowledge, Attitudes, Practices)",
                duration: "1-2 mois",
                format: "Présentiel & Ligne",
            },
            {
                name: "Enquêtes Épidémiologiques",
                duration: "2 mois",
                format: "Présentiel & Ligne",
            },
            {
                name: "Évaluation de Projets & Programmes de Santé",
                duration: "2-3 mois",
                format: "Présentiel & Ligne",
            },
            {
                name: "Évaluation d'Impact Environnemental",
                duration: "2 mois",
                format: "Présentiel & Ligne",
            },
            {
                name: "Évaluation des Méthodes Diagnostiques",
                duration: "1-2 mois",
                format: "Présentiel & Ligne",
            },
            {
                name: "Évaluation du Système de Surveillance Épidémiologique",
                duration: "2 mois",
                format: "Présentiel & Ligne",
            },
            {
                name: "Fondamentaux de l'Épidémiologie de Terrain",
                duration: "2-3 mois",
                format: "Présentiel & Ligne",
            },
            {
                name: "Évaluation du Système de Santé",
                duration: "2-3 mois",
                format: "Présentiel & Ligne",
            },
            {
                name: "Planification Sanitaire",
                duration: "2 mois",
                format: "Présentiel & Ligne",
            },
        ],
    },
};
</script>

<template>
    <Head title="Certifications" />
    <PublicLayout>
        <!-- Hero Section -->
        <section
            class="bg-gradient-to-r from-slate-900 to-slate-700 text-white py-10 md:py-20"
        >
            <div class="container mx-auto px-4">
                <h1 class="text-3xl md:text-6xl font-bold mb-6">
                    Certifications ACADECOL
                </h1>
                <p class="text-xl text-slate-200 max-w-2xl">
                    Des formations certifiées par le Ministère de l'Emploi et de
                    la Formation Professionnelle du Cameroun
                </p>
                <p class="text-slate-300 mt-4">
                    📍 Bafoussam, Entrée École Normale • Tél: +237 691 05 69 65
                </p>
            </div>
        </section>

        <!-- Domain Selector -->
        <section class="py-12 bg-gray-50 border-b border-gray-200">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                    <button
                        v-for="(domain, key) in domains"
                        :key="key"
                        @click="selectedDomain = key"
                        :class="[
                            'p-4 rounded-lg transition transform hover:scale-105 font-semibold',
                            selectedDomain === key
                                ? `bg-gradient-to-br ${domain.color} text-white shadow-lg`
                                : 'bg-white text-gray-700 hover:shadow-md border border-gray-200',
                        ]"
                    >
                        <div class="text-2xl mb-2">{{ domain.icon }}</div>
                        <div class="text-sm line-clamp-2">
                            {{ domain.title.split("&")[0].trim() }}
                        </div>
                    </button>
                </div>
            </div>
        </section>

        <!-- Domain Details -->
        <section class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <div
                    v-for="(domain, key) in domains"
                    v-show="selectedDomain === key"
                    :key="key"
                    class="animate-fadeIn"
                >
                    <!-- Header -->
                    <div class="mb-12">
                        <div
                            :class="`inline-block p-4 rounded-lg bg-gradient-to-br ${domain.color} text-white text-3xl md:text-5xl mb-6`"
                        >
                            {{ domain.icon }}
                        </div>
                        <h2
                            class="text-2xl md:text-4xl font-bold text-gray-900 mb-4"
                        >
                            {{ domain.title }}
                        </h2>
                        <p class="text-lg text-gray-600 max-w-2xl">
                            {{ domain.description }}
                        </p>
                    </div>

                    <!-- Certifications Grid -->
                    <div
                        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"
                    >
                        <div
                            v-for="(cert, idx) in domain.certifications"
                            :key="idx"
                            class="group bg-white border-2 border-gray-200 rounded-xl p-6 hover:border-gray-400 hover:shadow-xl transition-all duration-300"
                        >
                            <!-- Certificate Icon -->
                            <div
                                :class="`inline-block p-3 rounded-lg bg-gradient-to-br ${domain.color} text-white text-2xl mb-4 group-hover:scale-110 transition`"
                            >
                                {{ domain.icon }}
                            </div>

                            <!-- Content -->
                            <h3
                                class="text-xl font-bold text-gray-900 mb-3 group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-gray-900 group-hover:to-gray-900 transition"
                            >
                                {{ cert.name }}
                            </h3>

                            <!-- Details -->
                            <div class="space-y-2 mb-4">
                                <div
                                    v-if="cert.levels"
                                    class="flex items-center gap-2 text-sm text-gray-600"
                                >
                                    <span class="font-semibold">Niveaux:</span>
                                    <span>{{ cert.levels }}</span>
                                </div>
                                <div
                                    v-if="cert.level"
                                    class="flex items-center gap-2 text-sm text-gray-600"
                                >
                                    <span class="font-semibold">Type:</span>
                                    <span
                                        class="px-2 py-1 bg-blue-100 text-blue-700 rounded text-xs font-semibold"
                                        >{{ cert.level }}</span
                                    >
                                </div>
                                <div
                                    class="flex items-center gap-2 text-sm text-gray-600"
                                >
                                    <span>⏱️</span>
                                    <span class="font-semibold">{{
                                        cert.duration
                                    }}</span>
                                </div>
                                <div
                                    class="flex items-center gap-2 text-sm text-gray-600"
                                >
                                    <span>📍</span>
                                    <span>{{ cert.format }}</span>
                                </div>
                                <div
                                    v-if="cert.tools"
                                    class="flex items-center gap-2 text-sm text-gray-600"
                                >
                                    <span>🛠️</span>
                                    <span class="text-xs">{{
                                        cert.tools
                                    }}</span>
                                </div>
                            </div>

                            <!-- CTA Button -->
                            <Link
                                href="/formations"
                                class="inline-block w-full text-center mt-4 px-4 py-2 bg-gradient-to-r from-gray-900 to-gray-700 text-white font-semibold rounded-lg hover:shadow-lg transition transform hover:scale-105"
                            >
                                En savoir plus
                            </Link>
                        </div>
                    </div>

                    <!-- Additional Info -->
                    <div
                        class="mt-8 md:mt-16 p-8 bg-gradient-to-br"
                        :class="`${domain.color} text-white rounded-xl`"
                    >
                        <h3 class="text-2xl font-bold mb-4">
                            Pourquoi choisir nos formations ?
                        </h3>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <li class="flex items-start gap-3">
                                <span class="text-2xl">✓</span>
                                <span
                                    >Certifiées par le Ministère de l'Emploi et
                                    Formation Professionnelle du Cameroun</span
                                >
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-2xl">✓</span>
                                <span
                                    >Formateurs expérimentés et professionnels
                                    actifs</span
                                >
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-2xl">✓</span>
                                <span
                                    >Cours pratiques en situation
                                    opérationnelle</span
                                >
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-2xl">✓</span>
                                <span
                                    >Disponibles en présentiel et en ligne</span
                                >
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-2xl">✓</span>
                                <span
                                    >Durées courtes (1 à 12 mois maximum)</span
                                >
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-2xl">✓</span>
                                <span
                                    >Assistance à l'emploi après la
                                    formation</span
                                >
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-10 md:py-20 bg-gray-900 text-white">
            <div class="container mx-auto px-4 text-center">
                <h2 class="text-2xl md:text-4xl font-bold mb-6">
                    Prêt à transformer votre carrière ?
                </h2>
                <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
                    Rejoignez des centaines d'apprenants qui ont réussi à
                    obtenir leur certification et leur premier emploi grâce à
                    ACADECOL
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <Link
                        href="/formations"
                        class="px-8 py-4 bg-gradient-to-r from-blue-500 to-blue-700 text-white font-bold rounded-lg hover:shadow-lg transition transform hover:scale-105"
                    >
                        Explorer toutes les formations
                    </Link>
                    <Link
                        href="/contact"
                        class="px-8 py-4 bg-white text-gray-900 font-bold rounded-lg hover:shadow-lg transition transform hover:scale-105"
                    >
                        Nous contacter
                    </Link>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <h2 class="text-2xl md:text-3xl font-bold text-center mb-12">
                    Nos Chiffres Clés
                </h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                    <div
                        class="p-6 bg-gradient-to-br from-blue-100 to-blue-50 rounded-xl"
                    >
                        <div
                            class="text-2xl md:text-4xl font-bold text-blue-600 mb-2"
                        >
                            50+
                        </div>
                        <p class="text-gray-700 font-semibold">
                            Certifications
                        </p>
                    </div>
                    <div
                        class="p-6 bg-gradient-to-br from-green-100 to-green-50 rounded-xl"
                    >
                        <div
                            class="text-2xl md:text-4xl font-bold text-green-600 mb-2"
                        >
                            2000+
                        </div>
                        <p class="text-gray-700 font-semibold">Apprenants</p>
                    </div>
                    <div
                        class="p-6 bg-gradient-to-br from-purple-100 to-purple-50 rounded-xl"
                    >
                        <div
                            class="text-2xl md:text-4xl font-bold text-purple-600 mb-2"
                        >
                            95%
                        </div>
                        <p class="text-gray-700 font-semibold">Réussite</p>
                    </div>
                    <div
                        class="p-6 bg-gradient-to-br from-orange-100 to-orange-50 rounded-xl"
                    >
                        <div
                            class="text-2xl md:text-4xl font-bold text-orange-600 mb-2"
                        >
                            5
                        </div>
                        <p class="text-gray-700 font-semibold">Domaines</p>
                    </div>
                </div>
            </div>
        </section>
    </PublicLayout>
</template>

<style scoped>
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fadeIn {
    animation: fadeIn 0.3s ease-in-out;
}

.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>

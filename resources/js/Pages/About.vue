<template>
    <PublicLayout>
        <!-- HERO SECTION - Moderne et percutant -->
        <section
            class="relative bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 text-white overflow-hidden"
        >
            <!-- Éléments décoratifs animés -->
            <div class="absolute inset-0 opacity-10">
                <div
                    class="absolute top-0 left-0 w-64 h-64 bg-white rounded-full -translate-x-1/2 -translate-y-1/2"
                ></div>
                <div
                    class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full translate-x-1/3 translate-y-1/3"
                ></div>
            </div>

            <!-- Pattern de points -->
            <div
                class="absolute inset-0 opacity-5"
                style="
                    background-image: radial-gradient(
                        circle at 2px 2px,
                        white 1px,
                        transparent 1px
                    );
                    background-size: 24px 24px;
                "
            ></div>

            <div class="container mx-auto px-4 py-4 md:py-8 relative">
                <div class="max-w-3xl mx-auto text-center">
                    <!-- Badge -->
                    <div
                        class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm px-3 py-1.5 rounded-full border border-white/20 mb-6"
                    >
                        <span
                            class="w-1.5 h-1.5 bg-yellow-400 rounded-full"
                        ></span>
                        <span
                            class="text-xs font-semibold uppercase tracking-wider"
                            >{{ t.hero.badge[locale] }}</span
                        >
                    </div>

                    <!-- Titre principal -->
                    <h1 class="text-xl md:text-3xl lg:text-5xl font-bold">
                        {{ t.hero.title[locale] }}
                        <span class="text-yellow-300">{{
                            t.hero.titleSuffix[locale]
                        }}</span>
                    </h1>

                    <!-- Description -->
                    <p
                        class="text-lg md:text-xl text-blue-100 mb-8 max-w-2xl mx-auto"
                    >
                        {{ t.hero.desc[locale] }}
                    </p>

                    <!-- Stats rapides -->
                    <div class="flex flex-wrap justify-center gap-6 md:gap-10">
                        <div class="text-center">
                            <div
                                class="text-2xl md:text-3xl font-bold text-white"
                            >
                                35+
                            </div>
                            <div class="text-xs md:text-sm text-blue-200">
                                Formations
                            </div>
                        </div>
                        <div class="text-center">
                            <div
                                class="text-2xl md:text-3xl font-bold text-white"
                            >
                                2000+
                            </div>
                            <div class="text-xs md:text-sm text-blue-200">
                                Apprenants
                            </div>
                        </div>
                        <div class="text-center">
                            <div
                                class="text-2xl md:text-3xl font-bold text-white"
                            >
                                95%
                            </div>
                            <div class="text-xs md:text-sm text-blue-200">
                                Réussite
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- MISSION & VISION - Design moderne en cartes -->
        <section class="py-8 md:py-12 bg-white">
            <div class="container mx-auto px-4">
                <!-- En-tête de section -->
                <div class="text-center max-w-2xl mx-auto mb-12 md:mb-16">
                    <span
                        class="inline-block px-3 py-1 bg-blue-50 text-blue-600 text-xs font-semibold rounded-full mb-4"
                    >
                        {{ t.mission.badge[locale] }}
                    </span>
                    <h2
                        class="text-2xl md:text-4xl font-bold text-gray-900 mb-4"
                    >
                        {{ t.mission.title[locale] }}
                        <span class="text-blue-600">{{
                            t.mission.titleSuffix[locale]
                        }}</span>
                    </h2>
                    <p class="text-gray-600 text-sm md:text-base">
                        {{ t.mission.desc[locale] }}
                    </p>
                </div>

                <!-- Cartes Mission/Vision/Valeurs -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Mission -->
                    <div
                        class="group relative bg-white p-8 rounded-2xl border border-gray-100 hover:border-blue-200 hover:shadow-xl transition-all duration-300"
                    >
                        <div
                            class="absolute top-0 right-0 w-20 h-20 bg-blue-50 rounded-bl-3xl -z-0"
                        ></div>
                        <div class="relative z-10">
                            <div
                                class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center text-2xl mb-6 group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300"
                            >
                                🎯
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">
                                {{ t.mission.missionTitle[locale] }}
                            </h3>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                {{ t.mission.missionDesc[locale] }}
                            </p>
                            <div
                                class="mt-4 h-1 w-12 bg-blue-600 rounded-full group-hover:w-20 transition-all"
                            ></div>
                        </div>
                    </div>

                    <!-- Vision -->
                    <div
                        class="group relative bg-white p-8 rounded-2xl border border-gray-100 hover:border-purple-200 hover:shadow-xl transition-all duration-300"
                    >
                        <div
                            class="absolute top-0 right-0 w-20 h-20 bg-purple-50 rounded-bl-3xl -z-0"
                        ></div>
                        <div class="relative z-10">
                            <div
                                class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center text-2xl mb-6 group-hover:scale-110 group-hover:bg-purple-600 group-hover:text-white transition-all duration-300"
                            >
                                👁️
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">
                                {{ t.mission.visionTitle[locale] }}
                            </h3>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                {{ t.mission.visionDesc[locale] }}
                            </p>
                            <div
                                class="mt-4 h-1 w-12 bg-purple-600 rounded-full group-hover:w-20 transition-all"
                            ></div>
                        </div>
                    </div>

                    <!-- Valeurs -->
                    <div
                        class="group relative bg-white p-8 rounded-2xl border border-gray-100 hover:border-green-200 hover:shadow-xl transition-all duration-300"
                    >
                        <div
                            class="absolute top-0 right-0 w-20 h-20 bg-green-50 rounded-bl-3xl -z-0"
                        ></div>
                        <div class="relative z-10">
                            <div
                                class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center text-2xl mb-6 group-hover:scale-110 group-hover:bg-green-600 group-hover:text-white transition-all duration-300"
                            >
                                💡
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">
                                {{ t.mission.valuesTitle[locale] }}
                            </h3>
                            <p
                                class="text-gray-600 text-sm leading-relaxed mb-4"
                            >
                                {{ t.mission.valuesDesc[locale] }}
                            </p>
                            <div class="flex flex-wrap gap-2">
                                <span
                                    class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded-full"
                                    >Excellence</span
                                >
                                <span
                                    class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded-full"
                                    >Innovation</span
                                >
                                <span
                                    class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded-full"
                                    >Intégrité</span
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- POURQUOI NOUS CHOISIR - Design type Duolingo/Coursera -->
        <section class="py-8 md:py-12 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="text-center max-w-2xl mx-auto mb-12">
                    <span
                        class="inline-block px-3 py-1 bg-blue-50 text-blue-600 text-xs font-semibold rounded-full mb-4"
                    >
                        {{ t.advantages.badge[locale] }}
                    </span>
                    <h2
                        class="text-2xl md:text-4xl font-bold text-gray-900 mb-4"
                    >
                        {{ t.advantages.title[locale] }}
                        <span class="text-blue-600">{{
                            t.advantages.titleHighlight[locale]
                        }}</span>
                    </h2>
                </div>

                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6"
                >
                    <!-- Avantage 1 -->
                    <div
                        class="bg-white p-5 rounded-xl border border-gray-100 hover:border-blue-200 hover:shadow-lg transition-all duration-300 flex items-start gap-3"
                    >
                        <div
                            class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center text-xl shrink-0"
                        >
                            📚
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-gray-900 mb-1">
                                {{ t.advantages.items.complete.title[locale] }}
                            </h4>
                            <p class="text-xs text-gray-500">
                                {{ t.advantages.items.complete.desc[locale] }}
                            </p>
                        </div>
                    </div>

                    <!-- Avantage 2 -->
                    <div
                        class="bg-white p-5 rounded-xl border border-gray-100 hover:border-blue-200 hover:shadow-lg transition-all duration-300 flex items-start gap-3"
                    >
                        <div
                            class="w-10 h-10 bg-purple-50 rounded-lg flex items-center justify-center text-xl shrink-0"
                        >
                            👨‍🏫
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-gray-900 mb-1">
                                {{ t.advantages.items.experts.title[locale] }}
                            </h4>
                            <p class="text-xs text-gray-500">
                                {{ t.advantages.items.experts.desc[locale] }}
                            </p>
                        </div>
                    </div>

                    <!-- Avantage 3 -->
                    <div
                        class="bg-white p-5 rounded-xl border border-gray-100 hover:border-blue-200 hover:shadow-lg transition-all duration-300 flex items-start gap-3"
                    >
                        <div
                            class="w-10 h-10 bg-green-50 rounded-lg flex items-center justify-center text-xl shrink-0"
                        >
                            🏅
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-gray-900 mb-1">
                                {{
                                    t.advantages.items.certification.title[
                                        locale
                                    ]
                                }}
                            </h4>
                            <p class="text-xs text-gray-500">
                                {{
                                    t.advantages.items.certification.desc[
                                        locale
                                    ]
                                }}
                            </p>
                        </div>
                    </div>

                    <!-- Avantage 4 -->
                    <div
                        class="bg-white p-5 rounded-xl border border-gray-100 hover:border-blue-200 hover:shadow-lg transition-all duration-300 flex items-start gap-3"
                    >
                        <div
                            class="w-10 h-10 bg-orange-50 rounded-lg flex items-center justify-center text-xl shrink-0"
                        >
                            💼
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-gray-900 mb-1">
                                {{ t.advantages.items.job.title[locale] }}
                            </h4>
                            <p class="text-xs text-gray-500">
                                {{ t.advantages.items.job.desc[locale] }}
                            </p>
                        </div>
                    </div>

                    <!-- Avantage 5 -->
                    <div
                        class="bg-white p-5 rounded-xl border border-gray-100 hover:border-blue-200 hover:shadow-lg transition-all duration-300 flex items-start gap-3"
                    >
                        <div
                            class="w-10 h-10 bg-indigo-50 rounded-lg flex items-center justify-center text-xl shrink-0"
                        >
                            🌐
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-gray-900 mb-1">
                                {{ t.advantages.items.flexible.title[locale] }}
                            </h4>
                            <p class="text-xs text-gray-500">
                                {{ t.advantages.items.flexible.desc[locale] }}
                            </p>
                        </div>
                    </div>

                    <!-- Avantage 6 -->
                    <div
                        class="bg-white p-5 rounded-xl border border-gray-100 hover:border-blue-200 hover:shadow-lg transition-all duration-300 flex items-start gap-3"
                    >
                        <div
                            class="w-10 h-10 bg-yellow-50 rounded-lg flex items-center justify-center text-xl shrink-0"
                        >
                            💰
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-gray-900 mb-1">
                                {{ t.advantages.items.price.title[locale] }}
                            </h4>
                            <p class="text-xs text-gray-500">
                                {{ t.advantages.items.price.desc[locale] }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- STATS SECTION - Design moderne -->
        <section class="py-8 md:py-12 bg-white">
            <div class="container mx-auto px-4">
                <div
                    class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center"
                >
                    <!-- Image/Illustration -->
                    <div class="relative">
                        <div class="relative z-10">
                            <img
                                src="/img/school1.jpg"
                                alt="ACADECOL"
                                class="rounded-2xl shadow-2xl"
                            />
                        </div>
                        <!-- Badges flottants -->
                        <div
                            class="absolute -top-4 -right-4 bg-white p-3 rounded-xl shadow-lg border border-gray-100"
                        >
                            <div class="flex items-center gap-2">
                                <span class="text-2xl">🏆</span>
                                <div>
                                    <span
                                        class="text-xs font-bold text-gray-900"
                                        >{{ t.impact.minefop[locale] }}</span
                                    >
                                    <span
                                        class="text-[10px] text-gray-500 block"
                                        >{{ t.impact.decree[locale] }}</span
                                    >
                                </div>
                            </div>
                        </div>
                        <div
                            class="absolute -bottom-4 -left-4 bg-white p-3 rounded-xl shadow-lg border border-gray-100"
                        >
                            <div class="flex items-center gap-2">
                                <span class="text-2xl">⭐</span>
                                <div>
                                    <span
                                        class="text-xs font-bold text-gray-900"
                                        >4.8/5</span
                                    >
                                    <span
                                        class="text-[10px] text-gray-500 block"
                                        >{{ t.impact.reviews[locale] }}</span
                                    >
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Stats -->
                    <div>
                        <span
                            class="inline-block px-3 py-1 bg-blue-50 text-blue-600 text-xs font-semibold rounded-full mb-4"
                        >
                            {{ t.impact.badge[locale] }}
                        </span>
                        <h2
                            class="text-2xl md:text-4xl font-bold text-gray-900 mb-6"
                        >
                            {{ t.impact.title[locale] }}
                            <span class="text-blue-600">{{
                                t.impact.titleHighlight[locale]
                            }}</span>
                        </h2>

                        <div class="grid grid-cols-2 gap-6">
                            <div class="border-l-4 border-blue-600 pl-4">
                                <div
                                    class="text-3xl md:text-4xl font-bold text-gray-900"
                                >
                                    35+
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{ t.impact.stats.formations[locale] }}
                                </div>
                            </div>
                            <div class="border-l-4 border-green-600 pl-4">
                                <div
                                    class="text-3xl md:text-4xl font-bold text-gray-900"
                                >
                                    2000+
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{ t.impact.stats.learners[locale] }}
                                </div>
                            </div>
                            <div class="border-l-4 border-purple-600 pl-4">
                                <div
                                    class="text-3xl md:text-4xl font-bold text-gray-900"
                                >
                                    150+
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{ t.impact.stats.modules[locale] }}
                                </div>
                            </div>
                            <div class="border-l-4 border-orange-600 pl-4">
                                <div
                                    class="text-3xl md:text-4xl font-bold text-gray-900"
                                >
                                    95%
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{ t.impact.stats.success[locale] }}
                                </div>
                            </div>
                        </div>

                        <!-- Témoignage rapide -->
                        <div class="mt-8 bg-gray-50 p-5 rounded-xl">
                            <p class="text-sm text-gray-600 italic mb-3">
                                {{ t.impact.testimonial.text[locale] }}
                            </p>
                            <div class="flex items-center gap-2">
                                <div
                                    class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center text-white text-xs font-bold"
                                >
                                    MP
                                </div>
                                <div>
                                    <span
                                        class="text-xs font-bold text-gray-900"
                                        >Marie P.</span
                                    >
                                    <span
                                        class="text-[10px] text-gray-500 block"
                                        >{{
                                            t.impact.testimonial.role[locale]
                                        }}</span
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ÉQUIPE - Design moderne -->
        <section class="py-8 md:py-12 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="text-center max-w-2xl mx-auto mb-12">
                    <span
                        class="inline-block px-3 py-1 bg-blue-50 text-blue-600 text-xs font-semibold rounded-full mb-4"
                    >
                        {{ t.team.badge[locale] }}
                    </span>
                    <h2
                        class="text-2xl md:text-4xl font-bold text-gray-900 mb-4"
                    >
                        {{ t.team.title[locale] }}
                    </h2>
                    <p class="text-gray-600 text-sm md:text-base">
                        {{ t.team.desc[locale] }}
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="text-center">
                        <div
                            class="w-20 h-20 md:w-24 md:h-24 mx-auto bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center text-white text-2xl font-bold mb-3"
                        >
                            JD
                        </div>
                        <h4 class="text-sm font-bold text-gray-900">
                            Jean Dupont
                        </h4>
                        <p class="text-xs text-gray-500">
                            {{ t.team.roles.director[locale] }}
                        </p>
                    </div>
                    <div class="text-center">
                        <div
                            class="w-20 h-20 md:w-24 md:h-24 mx-auto bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center text-white text-2xl font-bold mb-3"
                        >
                            MB
                        </div>
                        <h4 class="text-sm font-bold text-gray-900">
                            Marie B.
                        </h4>
                        <p class="text-xs text-gray-500">
                            {{ t.team.roles.coordinator[locale] }}
                        </p>
                    </div>
                    <div class="text-center">
                        <div
                            class="w-20 h-20 md:w-24 md:h-24 mx-auto bg-gradient-to-br from-purple-500 to-purple-600 rounded-full flex items-center justify-center text-white text-2xl font-bold mb-3"
                        >
                            PT
                        </div>
                        <h4 class="text-sm font-bold text-gray-900">Paul T.</h4>
                        <p class="text-xs text-gray-500">
                            {{ t.team.roles.trainer[locale] }}
                        </p>
                    </div>
                    <div class="text-center">
                        <div
                            class="w-20 h-20 md:w-24 md:h-24 mx-auto bg-gradient-to-br from-orange-500 to-orange-600 rounded-full flex items-center justify-center text-white text-2xl font-bold mb-3"
                        >
                            AN
                        </div>
                        <h4 class="text-sm font-bold text-gray-900">
                            Alice N.
                        </h4>
                        <p class="text-xs text-gray-500">
                            {{ t.team.roles.advisor[locale] }}
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA SECTION - Design moderne -->
        <section
            class="py-8 md:py-12 bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 text-white relative overflow-hidden"
        >
            <!-- Éléments décoratifs -->
            <div class="absolute inset-0 opacity-10">
                <div
                    class="absolute top-0 left-0 w-64 h-64 bg-white rounded-full -translate-x-1/2 -translate-y-1/2"
                ></div>
                <div
                    class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full translate-x-1/3 translate_y-1/3"
                ></div>
            </div>

            <div class="container mx-auto px-4 relative">
                <div class="max-w-3xl mx-auto text-center">
                    <span
                        class="inline-block px-3 py-1 bg-white/10 backdrop-blur-sm text-white text-xs font-semibold rounded-full border border-white/20 mb-6"
                    >
                        {{ t.cta.badge[locale] }}
                    </span>
                    <h2 class="text-2xl md:text-4xl lg:text-5xl font-bold mb-6">
                        {{ t.cta.title[locale] }}
                        <span class="text-yellow-300">{{
                            t.cta.titleHighlight[locale]
                        }}</span>
                    </h2>
                    <p
                        class="text-lg md:text-xl text-blue-100 mb-8 max-w-2xl mx-auto"
                    >
                        {{ t.cta.desc[locale] }}
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <Link
                            href="/formations"
                            class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white text-blue-600 font-bold rounded-xl hover:bg-blue-50 transition-all hover:scale-105 shadow-lg"
                        >
                            {{ t.cta.buttons.explore[locale] }}
                            <i class="fas fa-arrow-right text-sm"></i>
                        </Link>
                        <a
                            href="#contact"
                            class="inline-flex items-center justify-center gap-2 px-8 py-4 border-2 border-white/30 text-white font-bold rounded-xl hover:bg-white/10 transition-all backdrop-blur-sm"
                        >
                            <i class="fas fa-phone-alt"></i>
                            {{ t.cta.buttons.contact[locale] }}
                        </a>
                    </div>

                    <!-- Petite mention -->
                    <p class="text-xs text-blue-200 mt-6">
                        {{ t.cta.footer[locale] }}
                    </p>
                </div>
            </div>
        </section>
    </PublicLayout>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import PublicLayout from "@/Layouts/PublicLayout.vue";
import { useLocale } from "@/Composables/useLocale";

const { trans: getText, locale } = useLocale();

const t = {
    hero: {
        badge: { fr: "Qui sommes-nous", en: "Who are we" },
        title: { fr: "ACADECOL, c'est", en: "ACADECOL is" },
        titleSuffix: { fr: "plus qu'une école", en: "more than a school" },
        desc: {
            fr: "Depuis 2020, nous formons les talents de demain avec des programmes certifiants, conçus pour répondre aux besoins réels du marché.",
            en: "Since 2020, we have been training tomorrow's talents with certified programs designed to meet real market needs.",
        },
        stats: {
            formations: { fr: "Formations", en: "Trainings" },
            learners: { fr: "Apprenants", en: "Learners" },
            success: { fr: "Réussite", en: "Success Rate" },
        },
    },
    mission: {
        badge: { fr: "Notre raison d'être", en: "Our Purpose" },
        title: { fr: "Ce qui nous", en: "What drives" },
        titleSuffix: { fr: "anime", en: "us" },
        desc: {
            fr: "ACADECOL est né d'une conviction : l'éducation de qualité doit être accessible à tous.",
            en: "ACADECOL was born from a conviction: quality education must be accessible to all.",
        },
        missionTitle: { fr: "Notre Mission", en: "Our Mission" },
        missionDesc: {
            fr: "Offrir des formations de qualité accessibles à tous, combinant théorie et pratique pour préparer les apprenants à une carrière réussie.",
            en: "Offer quality training accessible to all, combining theory and practice to prepare learners for a successful career.",
        },
        visionTitle: { fr: "Notre Vision", en: "Our Vision" },
        visionDesc: {
            fr: "Être le leader incontournable de la formation professionnelle au Cameroun et en Afrique de l'Ouest.",
            en: "To be the undisputed leader in professional training in Cameroon and West Africa.",
        },
        valuesTitle: { fr: "Nos Valeurs", en: "Our Values" },
        valuesDesc: {
            fr: "Excellence, Intégrité, Innovation, Inclusivité et Engagement envers la réussite.",
            en: "Excellence, Integrity, Innovation, Inclusivity and Commitment to success.",
        },
    },
    advantages: {
        badge: { fr: "Nos avantages", en: "Our Advantages" },
        title: {
            fr: "Pourquoi des milliers d'apprenants",
            en: "Why thousands of learners",
        },
        titleHighlight: { fr: "nous choisissent", en: "choose us" },
        items: {
            complete: {
                title: {
                    fr: "Formations Complètes",
                    en: "Comprehensive Training",
                },
                desc: {
                    fr: "Compétences pratiques et théoriques pour exceller",
                    en: "Practical and theoretical skills to excel",
                },
            },
            experts: {
                title: { fr: "Instructeurs Experts", en: "Expert Instructors" },
                desc: {
                    fr: "Professionnels actifs avec années d'expérience",
                    en: "Active professionals with years of experience",
                },
            },
            certification: {
                title: {
                    fr: "Certifications Reconnues",
                    en: "Recognized Certifications",
                },
                desc: {
                    fr: "Nationales et internationales",
                    en: "National and international",
                },
            },
            job: {
                title: { fr: "Assistance à l'Emploi", en: "Job Assistance" },
                desc: {
                    fr: "Aide à trouver des opportunités",
                    en: "Help finding opportunities",
                },
            },
            flexible: {
                title: { fr: "Accès Flexible", en: "Flexible Access" },
                desc: {
                    fr: "En ligne, présentiel ou hybride",
                    en: "Online, on-site or hybrid",
                },
            },
            price: {
                title: { fr: "Prix Compétitifs", en: "Competitive Prices" },
                desc: {
                    fr: "Options de paiement flexibles",
                    en: "Flexible payment options",
                },
            },
        },
    },
    impact: {
        minefop: { fr: "Agréé MINEFOP", en: "MINEFOP Accredited" },
        decree: { fr: "Arrêté N°000644", en: "Decree N°000644" },
        reviews: { fr: "+500 avis", en: "+500 reviews" },
        badge: { fr: "Notre impact", en: "Our Impact" },
        title: { fr: "Des chiffres qui", en: "Numbers that" },
        titleHighlight: { fr: "parlent", en: "speak" },
        stats: {
            formations: {
                fr: "Formations certifiantes",
                en: "Certified trainings",
            },
            learners: { fr: "Apprenants formés", en: "Learners trained" },
            modules: { fr: "Modules disponibles", en: "Modules available" },
            success: { fr: "Taux de réussite", en: "Success rate" },
        },
        testimonial: {
            text: {
                fr: "\"J'ai suivi la formation Vendeur en Pharmacie. Aujourd'hui, je travaille dans une officine à Douala.\"",
                en: '"I took the Pharmacy Sales training. Today, I work in a pharmacy in Douala."',
            },
            role: { fr: "Promo 2023", en: "Class of 2023" },
        },
    },
    team: {
        badge: { fr: "Notre équipe", en: "Our Team" },
        title: { fr: "Des experts passionnés", en: "Passionate Experts" },
        desc: {
            fr: "Des professionnels expérimentés dédiés à votre réussite",
            en: "Experienced professionals dedicated to your success",
        },
        roles: {
            director: { fr: "Directeur", en: "Director" },
            coordinator: { fr: "Coordinatrice", en: "Coordinator" },
            trainer: { fr: "Formateur", en: "Trainer" },
            advisor: { fr: "Conseillère", en: "Advisor" },
        },
    },
    cta: {
        badge: { fr: "Prêt à commencer ?", en: "Ready to start?" },
        title: { fr: "Rejoignez", en: "Join" },
        titleHighlight: { fr: "+2000 apprenants", en: "+2000 learners" },
        desc: {
            fr: "Commencez votre parcours de transformation dès aujourd'hui. Formations certifiantes, flexibles et accessibles.",
            en: "Start your transformation journey today. Certified, flexible and accessible training.",
        },
        buttons: {
            explore: { fr: "Explorer les formations", en: "Explore trainings" },
            contact: { fr: "Nous contacter", en: "Contact us" },
        },
        footer: {
            fr: "*Formations certifiées par le MINEFOP - Arrêté N°000644",
            en: "*Trainings certified by MINEFOP - Decree N°000644",
        },
    },
};
</script>

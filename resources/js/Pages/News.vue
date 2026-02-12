<template>
    <PublicLayout>
        <Head title="Actualités">
            <meta
                name="description"
                content="Restez informé des dernières nouvelles, événements et lancements de formations à ACADECOL."
            />
            <meta property="og:title" content="Actualités - ACADECOL" />
            <meta
                property="og:description"
                content="Toutes les nouveautés de l'Académie Africaine Bilingue. Articles, événements et mises à jour."
            />
        </Head>
        <!-- Hero Section -->
        <section
            class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-10 md:py-16"
        >
            <div class="container mx-auto px-4">
                <h1 class="text-3xl md:text-5xl font-bold mb-4">Actualités</h1>
                <p class="text-xl text-blue-100">
                    Les dernières nouvelles et mises à jour d'AcadEcol
                </p>
            </div>
        </section>

        <!-- News Grid -->
        <section class="py-10 md:py-20 bg-gray-50">
            <div class="container mx-auto px-4">
                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"
                >
                    <!-- Article 1 -->
                    <article
                        class="bg-white rounded-lg shadow-md hover:shadow-lg transition overflow-hidden"
                    >
                        <div
                            class="h-48 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center text-6xl"
                        >
                            🎓
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-2 mb-2">
                                <span
                                    class="text-xs bg-blue-100 text-blue-600 px-3 py-1 rounded-full font-semibold"
                                    >Nouveauté</span
                                >
                                <span class="text-xs text-gray-500"
                                    >24 Jan 2026</span
                                >
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">
                                Lancement de 5 Nouvelles Formations
                            </h3>
                            <p class="text-gray-600 mb-4">
                                Nous sommes heureux d'annoncer le lancement de 5
                                formations innovantes en Data Science, Cloud
                                Computing et Cybersécurité.
                            </p>
                            <a
                                href="#"
                                class="text-blue-600 font-semibold hover:text-blue-700"
                                >En savoir plus →</a
                            >
                        </div>
                    </article>

                    <!-- Article 2 -->
                    <article
                        class="bg-white rounded-lg shadow-md hover:shadow-lg transition overflow-hidden"
                    >
                        <div
                            class="h-48 bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center text-6xl"
                        >
                            🏆
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-2 mb-2">
                                <span
                                    class="text-xs bg-green-100 text-green-600 px-3 py-1 rounded-full font-semibold"
                                    >Succès</span
                                >
                                <span class="text-xs text-gray-500"
                                    >20 Jan 2026</span
                                >
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">
                                2000+ Apprenants Certifiés
                            </h3>
                            <p class="text-gray-600 mb-4">
                                Nous franchissons le cap des 2000 apprenants
                                certifiés ! Merci pour votre confiance et vos
                                succès remarquables.
                            </p>
                            <a
                                href="#"
                                class="text-blue-600 font-semibold hover:text-blue-700"
                                >En savoir plus →</a
                            >
                        </div>
                    </article>

                    <!-- Article 3 -->
                    <article
                        class="bg-white rounded-lg shadow-md hover:shadow-lg transition overflow-hidden"
                    >
                        <div
                            class="h-48 bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center text-6xl"
                        >
                            💼
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-2 mb-2">
                                <span
                                    class="text-xs bg-purple-100 text-purple-600 px-3 py-1 rounded-full font-semibold"
                                    >Partenariat</span
                                >
                                <span class="text-xs text-gray-500"
                                    >15 Jan 2026</span
                                >
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">
                                Nouveau Partenariat avec TechCorp
                            </h3>
                            <p class="text-gray-600 mb-4">
                                Nous nous associons avec TechCorp pour créer des
                                opportunités d'emploi pour nos apprenants en
                                DevOps et Cloud.
                            </p>
                            <a
                                href="#"
                                class="text-blue-600 font-semibold hover:text-blue-700"
                                >En savoir plus →</a
                            >
                        </div>
                    </article>

                    <!-- Article 4 -->
                    <article
                        class="bg-white rounded-lg shadow-md hover:shadow-lg transition overflow-hidden"
                    >
                        <div
                            class="h-48 bg-gradient-to-br from-orange-400 to-orange-600 flex items-center justify-center text-6xl"
                        >
                            🎉
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-2 mb-2">
                                <span
                                    class="text-xs bg-orange-100 text-orange-600 px-3 py-1 rounded-full font-semibold"
                                    >Événement</span
                                >
                                <span class="text-xs text-gray-500"
                                    >10 Jan 2026</span
                                >
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">
                                Webinaire Gratuit: Web Development 2026
                            </h3>
                            <p class="text-gray-600 mb-4">
                                Rejoignez-nous pour un webinaire exclusif sur
                                les tendances du développement web en 2026.
                            </p>
                            <a
                                href="#"
                                class="text-blue-600 font-semibold hover:text-blue-700"
                                >En savoir plus →</a
                            >
                        </div>
                    </article>

                    <!-- Article 5 -->
                    <article
                        class="bg-white rounded-lg shadow-md hover:shadow-lg transition overflow-hidden"
                    >
                        <div
                            class="h-48 bg-gradient-to-br from-red-400 to-red-600 flex items-center justify-center text-6xl"
                        >
                            📱
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-2 mb-2">
                                <span
                                    class="text-xs bg-red-100 text-red-600 px-3 py-1 rounded-full font-semibold"
                                    >Annonce</span
                                >
                                <span class="text-xs text-gray-500"
                                    >5 Jan 2026</span
                                >
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">
                                Application Mobile AcadEcol Disponible
                            </h3>
                            <p class="text-gray-600 mb-4">
                                Téléchargez notre nouvelle application mobile
                                pour accéder à vos cours où que vous soyez.
                            </p>
                            <a
                                href="#"
                                class="text-blue-600 font-semibold hover:text-blue-700"
                                >En savoir plus →</a
                            >
                        </div>
                    </article>

                    <!-- Article 6 -->
                    <article
                        class="bg-white rounded-lg shadow-md hover:shadow-lg transition overflow-hidden"
                    >
                        <div
                            class="h-48 bg-gradient-to-br from-teal-400 to-teal-600 flex items-center justify-center text-6xl"
                        >
                            ✨
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-2 mb-2">
                                <span
                                    class="text-xs bg-teal-100 text-teal-600 px-3 py-1 rounded-full font-semibold"
                                    >Mise à jour</span
                                >
                                <span class="text-xs text-gray-500"
                                    >1 Jan 2026</span
                                >
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">
                                Plateforme Améliorée avec AI
                            </h3>
                            <p class="text-gray-600 mb-4">
                                Notre plateforme utilise maintenant l'IA pour
                                personnaliser votre parcours d'apprentissage.
                            </p>
                            <a
                                href="#"
                                class="text-blue-600 font-semibold hover:text-blue-700"
                                >En savoir plus →</a
                            >
                        </div>
                    </article>
                </div>

                <!-- See More Button -->
                <div class="text-center mt-12">
                    <button
                        class="px-8 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition"
                    >
                        Charger Plus d'Actualités
                    </button>
                </div>
            </div>
        </section>

        <!-- Subscribe Section -->
        <section
            class="py-10 md:py-16 bg-gradient-to-r from-blue-600 to-indigo-600 text-white"
        >
            <div class="container mx-auto px-4 max-w-2xl">
                <h2 class="text-2xl md:text-4xl font-bold text-center mb-6">
                    Recevez les Actualités
                </h2>
                <p class="text-center text-blue-100 mb-8">
                    Inscrivez-vous à notre newsletter pour recevoir les
                    dernières nouvelles et offres spéciales.
                </p>

                <div class="flex flex-col sm:flex-row gap-2">
                    <input
                        type="email"
                        placeholder="Votre email..."
                        class="flex-1 px-4 py-3 rounded-lg text-gray-900 focus:outline-none"
                    />
                    <button
                        class="px-8 py-3 bg-white text-blue-600 font-bold rounded-lg hover:bg-blue-50 transition"
                    >
                        S'inscrire
                    </button>
                </div>
            </div>
        </section>
    </PublicLayout>
</template>

<script setup>
import { Head } from "@inertiajs/vue3";
import PublicLayout from "@/Layouts/PublicLayout.vue";
</script>

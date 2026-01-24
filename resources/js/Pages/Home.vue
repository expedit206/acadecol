<template>
    <PublicLayout>
        <!-- Hero Section -->
        <section
            class="relative bg-gradient-to-br from-blue-600 via-blue-700 to-blue-900 text-white py-20 md:py-32 overflow-hidden"
        >
            <!-- Decorative Elements -->
            <div
                class="absolute top-0 right-0 w-96 h-96 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"
            ></div>
            <div
                class="absolute bottom-0 left-0 w-96 h-96 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"
            ></div>

            <div class="container mx-auto px-4 relative z-10">
                <div class="max-w-3xl mx-auto text-center">
                    <h1
                        class="text-4xl md:text-6xl font-bold mb-6 leading-tight"
                    >
                        Transformez Votre Avenir avec AcadEcol
                    </h1>
                    <p
                        class="text-xl md:text-2xl text-blue-100 mb-8 leading-relaxed"
                    >
                        Accédez à des formations professionnelles de qualité en
                        ligne et en présentiel. Obtenez des certifications
                        reconnues.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <Link
                            href="/formations"
                            class="px-8 py-4 bg-white text-blue-600 font-bold rounded-lg hover:bg-blue-50 transition-all duration-200 transform hover:scale-105 shadow-lg"
                        >
                            Explorer les Formations
                        </Link>
                        <a
                            href="#categories"
                            class="px-8 py-4 border-2 border-white text-white font-bold rounded-lg hover:bg-white hover:text-blue-600 transition-all duration-200 cursor-pointer"
                        >
                            En Savoir Plus
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="bg-white py-16">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                    <div>
                        <div class="text-4xl font-bold text-blue-600 mb-2">
                            35+
                        </div>
                        <p class="text-gray-600">Formations</p>
                    </div>
                    <div>
                        <div class="text-4xl font-bold text-green-600 mb-2">
                            25
                        </div>
                        <p class="text-gray-600">Utilisateurs</p>
                    </div>
                    <div>
                        <div class="text-4xl font-bold text-purple-600 mb-2">
                            150+
                        </div>
                        <p class="text-gray-600">Modules</p>
                    </div>
                    <div>
                        <div class="text-4xl font-bold text-orange-600 mb-2">
                            98%
                        </div>
                        <p class="text-gray-600">Satisfaction</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Formations -->
        <section class="py-20 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">
                        Formations en Vedette
                    </h2>
                    <p class="text-xl text-gray-600">
                        Découvrez nos meilleures formations recommandées par nos
                        experts
                    </p>
                </div>

                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8"
                >
                    <FormationCard
                        v-for="formation in featuredFormations"
                        :key="formation.id"
                        :title="formation.titre.fr"
                        :description="formation.description_courte.fr"
                        :category="formation.category.nom.fr"
                        :price="formation.prix"
                        :duration="formation.duree"
                        :badge="formation.is_featured ? 'VEDETTE' : null"
                        :link="`/formations/${formation.id}`"
                    />
                </div>

                <div class="text-center">
                    <Link
                        href="/formations"
                        class="inline-block px-8 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition"
                    >
                        Voir Toutes les Formations →
                    </Link>
                </div>
            </div>
        </section>

        <!-- Categories Section -->
        <section id="categories" class="py-20 bg-white">
            <div class="container mx-auto px-4">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">
                        Domaines de Formation
                    </h2>
                    <p class="text-xl text-gray-600">
                        Explorez nos catégories de formations professionnelles
                    </p>
                </div>

                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6"
                >
                    <div
                        v-for="category in mainCategories"
                        :key="category.id"
                        class="bg-gradient-to-br from-blue-50 to-indigo-50 p-6 rounded-lg hover:shadow-lg transition cursor-pointer border border-blue-100 hover:border-blue-300"
                    >
                        <div class="text-4xl mb-3">
                            {{ getCategoryEmoji(category.nom.fr) }}
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">
                            {{ category.nom.fr }}
                        </h3>
                        <p class="text-sm text-gray-600 mb-4 line-clamp-2">
                            {{ category.description.fr }}
                        </p>
                        <Link
                            :href="`/formations?cat=${category.slug}`"
                            class="text-blue-600 font-semibold hover:text-blue-700 flex items-center gap-2"
                        >
                            Explorez →
                        </Link>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section class="py-20 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">
                        Témoignages
                    </h2>
                    <p class="text-xl text-gray-600">
                        Ce que nos étudiants pensent de nos formations
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div
                        v-for="testimonial in testimonials"
                        :key="testimonial.id"
                        class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg transition"
                    >
                        <div class="flex items-center gap-4 mb-4">
                            <div
                                class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center text-white font-bold"
                            >
                                {{ testimonial.initials }}
                            </div>
                            <div>
                                <p class="font-bold text-gray-900">
                                    {{ testimonial.name }}
                                </p>
                                <p class="text-sm text-gray-600">
                                    {{ testimonial.formation }}
                                </p>
                            </div>
                        </div>
                        <div class="flex gap-1 mb-3">
                            <span
                                v-for="i in 5"
                                :key="i"
                                class="text-yellow-400"
                                >⭐</span
                            >
                        </div>
                        <p class="text-gray-700 italic">
                            {{ testimonial.text }}
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section
            class="py-16 bg-gradient-to-r from-blue-600 to-indigo-600 text-white"
        >
            <div class="container mx-auto px-4 text-center">
                <h2 class="text-4xl font-bold mb-6">Prêt à Commencer ?</h2>
                <p class="text-xl mb-8 text-blue-100">
                    Inscrivez-vous dès maintenant et accédez à toutes nos
                    formations
                </p>
                <Link
                    href="/register"
                    class="inline-block px-8 py-4 bg-white text-blue-600 font-bold rounded-lg hover:bg-blue-50 transition-all duration-200 transform hover:scale-105"
                >
                    S'inscrire Gratuitement
                </Link>
            </div>
        </section>
    </PublicLayout>
</template>

<script setup>
import { computed } from "vue";
import { Link } from "@inertiajs/vue3";
import PublicLayout from "@/Layouts/PublicLayout.vue";
import FormationCard from "@/Components/FormationCard.vue";

const props = defineProps({
    formations: Array,
    categories: Array,
});

const featuredFormations = computed(
    () => props.formations?.filter((f) => f.is_featured).slice(0, 3) || [],
);

const mainCategories = computed(
    () =>
        props.categories?.filter((c) => c.parent_id === null).slice(0, 8) || [],
);

const testimonials = [
    {
        id: 1,
        name: "Jean Durand",
        initials: "JD",
        formation: "Développement Web",
        text: "Excellente formation ! Les instructeurs sont très compétents et le contenu est pratique et applicable immédiatement.",
    },
    {
        id: 2,
        name: "Marie Martin",
        initials: "MM",
        formation: "Data Science",
        text: "Formation complète avec de vrais projets. J'ai pu appliquer mes apprentissages dans mon travail en moins de 3 mois.",
    },
    {
        id: 3,
        name: "Pierre Bernard",
        initials: "PB",
        formation: "Marketing Digital",
        text: "Vraiment satisfait ! Les modules sont bien structurés et le support pédagogique est excellent.",
    },
];

const getCategoryEmoji = (category) => {
    const emojis = {
        "Informatique & Technologie": "💻",
        "Santé & Paramédical": "⚕️",
        "Commerce & Gestion": "💼",
        "Ingénierie & Construction": "🔧",
        "Arts & Design": "🎨",
        "Langues & Certifications": "🌍",
        "Éducation & Développement": "📚",
        "Droit & Gouvernance": "⚖️",
    };
    return emojis[category] || "📚";
};
</script>

<style scoped>
@keyframes blob {
    0%,
    100% {
        transform: translate(0, 0) scale(1);
    }
    33% {
        transform: translate(30px, -50px) scale(1.1);
    }
    66% {
        transform: translate(-20px, 20px) scale(0.9);
    }
}

.animate-blob {
    animation: blob 7s infinite;
}

.animation-delay-2000 {
    animation-delay: 2s;
}

.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>

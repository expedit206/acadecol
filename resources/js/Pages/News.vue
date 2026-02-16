<template>
    <PublicLayout>
        <Head :title="t.meta.title[locale]">
            <meta name="description" :content="t.meta.desc[locale]" />
        </Head>

        <!-- Hero Section with Featured Article (First Item) -->
        <section
            v-if="news.data.length > 0"
            class="pt-8 pb-4 md:pt-12 bg-gray-50"
        >
            <div class="container mx-auto px-4">
                <div
                    class="relative rounded-2xl overflow-hidden shadow-2xl bg-white group cursor-pointer transition-transform hover:scale-[1.01]"
                >
                    <Link
                        :href="route('news.show', news.data[0].slug)"
                        class="md:flex h-full"
                    >
                        <!-- Image Container -->
                        <div
                            class="md:w-1/2 h-64 md:h-auto overflow-hidden relative"
                        >
                            <img
                                v-if="news.data[0].image"
                                :src="'/' + news.data[0].image"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                :alt="getTranslated(news.data[0].title)"
                            />
                            <div
                                v-else
                                class="w-full h-full bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center"
                            >
                                <span class="text-6xl">📰</span>
                            </div>
                            <!-- Date overlay for mobile -->
                            <div
                                class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-blue-600 shadow-sm md:hidden"
                            >
                                {{ formatDate(news.data[0].published_at) }}
                            </div>
                        </div>

                        <!-- Content Container -->
                        <div
                            class="md:w-1/2 p-6 md:p-10 flex flex-col justify-center"
                        >
                            <div class="hidden md:flex items-center gap-2 mb-4">
                                <span
                                    class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-bold uppercase tracking-wide"
                                >
                                    {{ t.hero.badge[locale] }}
                                </span>
                                <span class="text-gray-500 text-sm font-medium">
                                    {{
                                        formatDate(news.data[0].published_at, {
                                            year: "numeric",
                                            month: "long",
                                            day: "numeric",
                                        })
                                    }}
                                </span>
                            </div>

                            <h1
                                class="text-2xl md:text-4xl font-extrabold text-gray-900 mb-4 leading-tight group-hover:text-blue-600 transition-colors"
                            >
                                {{ getTranslated(news.data[0].title) }}
                            </h1>

                            <p
                                class="text-gray-600 mb-6 text-base md:text-lg line-clamp-3 md:line-clamp-4"
                            >
                                {{
                                    getTranslated(
                                        news.data[0].content,
                                    ).substring(0, 200)
                                }}...
                            </p>

                            <div
                                class="flex items-center text-blue-600 font-bold group-hover:translate-x-2 transition-transform"
                            >
                                {{ t.hero.readMore[locale] }}
                                <i class="fas fa-arrow-right ml-2"></i>
                            </div>
                        </div>
                    </Link>
                </div>
            </div>
        </section>

        <!-- Recent News Grid (Skipping the first one) -->
        <section class="py-8 md:py-16 bg-gray-50 min-h-screen">
            <div class="container mx-auto px-4">
                <div class="flex items-center justify-between mb-8">
                    <h2
                        class="text-2xl font-bold text-gray-900 border-l-4 border-blue-600 pl-4"
                    >
                        {{ t.recent.title[locale] }}
                    </h2>
                </div>

                <div
                    class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8"
                >
                    <!-- Loop starting from index 1 -->
                    <article
                        v-for="item in news.data.slice(1)"
                        :key="item.id"
                        class="bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 group flex flex-col h-full border border-gray-100"
                    >
                        <Link
                            :href="route('news.show', item.slug)"
                            class="flex flex-col h-full"
                        >
                            <!-- Card Image -->
                            <div
                                class="h-48 overflow-hidden rounded-t-xl relative"
                            >
                                <img
                                    v-if="item.image"
                                    :src="'/' + item.image"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                    :alt="getTranslated(item.title)"
                                />
                                <div
                                    v-else
                                    class="w-full h-full bg-gray-100 flex items-center justify-center"
                                >
                                    <span class="text-4xl text-gray-300"
                                        >🖼️</span
                                    >
                                </div>
                                <div
                                    class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/60 to-transparent p-4"
                                >
                                    <span
                                        class="text-white text-xs font-medium bg-black/30 px-2 py-1 rounded backdrop-blur-sm"
                                    >
                                        {{ formatDate(item.published_at) }}
                                    </span>
                                </div>
                            </div>

                            <!-- Card Content -->
                            <div class="p-5 flex flex-col flex-1">
                                <h3
                                    class="text-lg font-bold text-gray-900 mb-3 leading-snug group-hover:text-blue-600 transition-colors line-clamp-2"
                                >
                                    {{ getTranslated(item.title) }}
                                </h3>
                                <p
                                    class="text-gray-500 text-sm mb-4 line-clamp-3 flex-1"
                                >
                                    {{
                                        getTranslated(item.content).substring(
                                            0,
                                            120,
                                        )
                                    }}...
                                </p>

                                <div
                                    class="pt-4 border-t border-gray-50 flex items-center justify-between mt-auto"
                                >
                                    <span
                                        class="text-sm font-semibold text-blue-600 group-hover:underline"
                                    >
                                        {{ t.recent.readMore[locale] }}
                                    </span>
                                    <i
                                        class="fas fa-chevron-right text-xs text-blue-400 group-hover:translate-x-1 transition-transform"
                                    ></i>
                                </div>
                            </div>
                        </Link>
                    </article>
                </div>

                <!-- Pagination -->
                <div
                    class="mt-12 flex justify-center"
                    v-if="news.current_page < news.last_page"
                >
                    <Link
                        v-if="news.next_page_url"
                        :href="news.next_page_url"
                        class="px-8 py-3 bg-white text-blue-600 border-2 border-blue-100 font-bold rounded-full hover:bg-blue-600 hover:text-white hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1"
                    >
                        {{ t.recent.loadMore[locale] }}
                    </Link>
                </div>

                <div
                    v-else-if="news.data.length === 0"
                    class="text-center py-20"
                >
                    <div class="text-6xl mb-4">📭</div>
                    <h3 class="text-xl font-bold text-gray-900">
                        {{ t.empty.title[locale] }}
                    </h3>
                    <p class="text-gray-500">
                        {{ t.empty.subtitle[locale] }}
                    </p>
                </div>
            </div>
        </section>

        <!-- Newsletter Minimalist -->
        <section class="py-12 bg-blue-900 text-white relative overflow-hidden">
            <div class="absolute inset-0 opacity-10 pattern-dots"></div>
            <div class="container mx-auto px-4 relative z-10 text-center">
                <i
                    class="fas fa-envelope-open-text text-4xl mb-4 text-blue-300"
                ></i>
                <h2 class="text-2xl font-bold mb-2">
                    {{ t.newsletter.title[locale] }}
                </h2>
                <p class="text-blue-200 mb-6 max-w-lg mx-auto text-sm">
                    {{ t.newsletter.desc[locale] }}
                </p>

                <form class="max-w-md mx-auto flex gap-2">
                    <input
                        type="email"
                        :placeholder="t.newsletter.placeholder[locale]"
                        class="flex-1 px-4 py-3 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    />
                    <button
                        class="bg-blue-500 hover:bg-blue-400 text-white px-6 py-3 rounded-lg font-bold transition"
                    >
                        {{ t.newsletter.button[locale] }}
                    </button>
                </form>
            </div>
        </section>
    </PublicLayout>
</template>

<script setup>
import { Head, Link } from "@inertiajs/vue3";
import PublicLayout from "@/Layouts/PublicLayout.vue";
import { useLocale } from "@/Composables/useLocale";

const { trans, locale } = useLocale();

defineProps({
    news: Object,
});

const t = {
    meta: {
        title: { fr: "Actualités", en: "News" },
        desc: {
            fr: "Restez informé des dernières nouvelles, événements et lancements de formations à ACADECOL.",
            en: "Stay informed about the latest news, events and training launches at ACADECOL.",
        },
    },
    hero: {
        badge: { fr: "À la une", en: "Featured" },
        readMore: { fr: "Lire l'article complet", en: "Read full article" },
    },
    recent: {
        title: { fr: "Récemment", en: "Recently" },
        readMore: { fr: "Lire la suite", en: "Read more" },
        loadMore: { fr: "Afficher plus d'actualités", en: "Load more news" },
    },
    empty: {
        title: {
            fr: "Aucune actualité pour le moment",
            en: "No news for the moment",
        },
        subtitle: {
            fr: "Revenez bientôt pour des mises à jour !",
            en: "Check back soon for updates!",
        },
    },
    newsletter: {
        title: {
            fr: "Restez connecté avec AcadEcol",
            en: "Stay connected with AcadEcol",
        },
        desc: {
            fr: "Recevez nos dernières actualités et offres de formation directement dans votre boîte mail.",
            en: "Receive our latest news and training offers directly in your inbox.",
        },
        placeholder: { fr: "votre@email.com", en: "your@email.com" },
        button: { fr: "OK", en: "OK" },
    },
};

const formatDate = (dateString, options = {}) => {
    if (!dateString) return "";
    return new Date(dateString).toLocaleDateString(
        locale.value === "en" ? "en-US" : "fr-FR",
        options,
    );
};

const getTranslated = (field) => {
    if (!field) return "";
    // If field is an object {fr:..., en:...}, return correct locale
    // If field is a string, return as is (fallback)
    return field[locale.value] || field["fr"] || field || "";
};
</script>

<style scoped>
.pattern-dots {
    background-image: radial-gradient(currentColor 1px, transparent 1px);
    background-size: 20px 20px;
}
</style>

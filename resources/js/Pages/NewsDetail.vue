<template>
    <PublicLayout>
        <Head :title="getTranslated(newsItem.title) + ' | ACADECOL'">
            <meta
                name="description"
                :content="getTranslated(newsItem.content).substring(0, 160)"
            />
            <meta
                property="og:title"
                :content="getTranslated(newsItem.title)"
            />
            <meta
                property="og:description"
                :content="getTranslated(newsItem.content).substring(0, 160)"
            />
            <meta
                v-if="newsItem.image"
                property="og:image"
                :content="'/' + newsItem.image"
            />
            <meta name="twitter:card" content="summary_large_image" />
        </Head>

        <!-- Newsletter Minimalist -->
        <div class="bg-white min-h-screen">
            <!-- Article Header -->
            <header class="relative h-[40vh] md:h-[60vh] overflow-hidden">
                <img
                    v-if="newsItem.image"
                    :src="'/' + newsItem.image"
                    class="w-full h-full object-cover"
                    :alt="getTranslated(newsItem.title)"
                />
                <div
                    v-else
                    class="w-full h-full bg-gradient-to-br from-blue-600 to-indigo-900"
                ></div>

                <div
                    class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"
                ></div>

                <div class="absolute bottom-0 left-0 right-0 p-6 md:p-12">
                    <div class="container mx-auto">
                        <div class="max-w-4xl">
                            <Link
                                :href="route('news')"
                                class="inline-flex items-center text-blue-400 font-semibold mb-4 hover:text-blue-300 transition-colors"
                            >
                                <i class="fas fa-arrow-left mr-2"></i>
                                {{ t.back[locale] }}
                            </Link>

                            <div
                                class="flex items-center gap-4 mb-4 text-gray-300 text-sm md:text-base"
                            >
                                <span class="flex items-center gap-2">
                                    <i class="far fa-calendar-alt"></i>
                                    {{ formatDate(newsItem.published_at) }}
                                </span>
                                <span
                                    class="w-1.5 h-1.5 bg-blue-500 rounded-full"
                                ></span>
                                <span class="flex items-center gap-2">
                                    <i class="far fa-clock"></i>
                                    {{ readingTime }} min read
                                </span>
                            </div>

                            <h1
                                class="text-3xl md:text-5xl lg:text-6xl font-extrabold text-white leading-tight"
                            >
                                {{ getTranslated(newsItem.title) }}
                            </h1>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Article Content -->
            <div class="container mx-auto px-4 py-12 md:py-20">
                <div class="flex flex-col lg:flex-row gap-12">
                    <!-- Main Content -->
                    <main class="lg:w-2/3">
                        <div
                            class="prose prose-lg max-w-none text-gray-700 leading-relaxed whitespace-pre-wrap"
                            v-html="formattedContent"
                        ></div>

                        <!-- Share Buttons -->
                        <div class="mt-12 pt-8 border-t border-gray-100 italic">
                            <div class="flex items-center gap-4">
                                <span class="text-gray-500 font-medium"
                                    >Partager :</span
                                >
                                <div class="flex gap-2">
                                    <a
                                        href="#"
                                        class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 hover:bg-blue-600 hover:text-white transition-all"
                                    >
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a
                                        href="#"
                                        class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-blue-400 hover:bg-blue-400 hover:text-white transition-all"
                                    >
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a
                                        href="#"
                                        class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-blue-700 hover:bg-blue-700 hover:text-white transition-all"
                                    >
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </main>

                    <!-- Sidebar -->
                    <aside class="lg:w-1/3">
                        <div class="sticky top-24 space-y-8">
                            <!-- Recent News -->
                            <div
                                class="bg-gray-50 p-6 rounded-2xl border border-gray-100"
                            >
                                <h3
                                    class="text-xl font-bold text-gray-900 mb-6 border-l-4 border-blue-600 pl-4"
                                >
                                    {{ t.recent[locale] }}
                                </h3>

                                <div class="space-y-6">
                                    <Link
                                        v-for="recent in recentNews"
                                        :key="recent.id"
                                        :href="route('news.show', recent.slug)"
                                        class="group flex gap-4"
                                    >
                                        <div
                                            class="w-20 h-20 flex-shrink-0 rounded-lg overflow-hidden bg-gray-200"
                                        >
                                            <img
                                                v-if="recent.image"
                                                :src="'/' + recent.image"
                                                class="w-full h-full object-cover transition-transform group-hover:scale-110"
                                            />
                                        </div>
                                        <div class="flex-1">
                                            <h4
                                                class="font-bold text-gray-900 group-hover:text-blue-600 transition-colors line-clamp-2 leading-snug"
                                            >
                                                {{
                                                    getTranslated(recent.title)
                                                }}
                                            </h4>
                                            <span
                                                class="text-xs text-gray-500 mt-1 block"
                                            >
                                                {{
                                                    formatDate(
                                                        recent.published_at,
                                                    )
                                                }}
                                            </span>
                                        </div>
                                    </Link>
                                </div>
                            </div>

                            <!-- CTA Banner -->
                            <div
                                class="bg-gradient-to-br from-blue-600 to-indigo-800 p-8 rounded-2xl text-white relative overflow-hidden"
                            >
                                <div
                                    class="absolute -right-10 -bottom-10 w-40 h-40 bg-white/10 rounded-full blur-2xl"
                                ></div>
                                <h3 class="text-xl font-bold mb-4">
                                    Prêt à propulser votre carrière ?
                                </h3>
                                <p class="text-blue-100 mb-6 text-sm">
                                    Découvrez nos programmes de formation
                                    d'excellence.
                                </p>
                                <Link
                                    :href="route('formations')"
                                    class="inline-block w-full text-center bg-white text-blue-600 font-bold py-3 rounded-xl hover:bg-blue-50 transition-colors"
                                >
                                    Voir les formations
                                </Link>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </PublicLayout>
</template>

<script setup>
import { Head, Link } from "@inertiajs/vue3";
import PublicLayout from "@/Layouts/PublicLayout.vue";
import { useLocale } from "@/Composables/useLocale";
import { computed } from "vue";

const { trans, locale } = useLocale();

const props = defineProps({
    newsItem: Object,
    recentNews: Array,
});

const t = {
    back: { fr: "Retour aux actualités", en: "Back to news" },
    recent: { fr: "Articles récents", en: "Recent articles" },
};

const getTranslated = (field) => {
    if (!field) return "";
    return field[locale.value] || field["fr"] || field || "";
};

const formattedContent = computed(() => {
    const content = getTranslated(props.newsItem.content);
    if (!content) return "";
    return content
        .trim()
        .split(/\n\s*\n/)
        .map((p) => {
            const para = p.replace(/\n/g, "<br>");
            return `<p class="mb-6">${para}</p>`;
        })
        .join("");
});

const readingTime = computed(() => {
    const text = getTranslated(props.newsItem.content);
    const wordsPerMinute = 200;
    const noOfWords = text.split(/\s+/g).length;
    const minutes = noOfWords / wordsPerMinute;
    return Math.ceil(minutes);
});

const formatDate = (dateString) => {
    if (!dateString) return "";
    return new Date(dateString).toLocaleDateString(
        locale.value === "en" ? "en-US" : "fr-FR",
        {
            day: "numeric",
            month: "long",
            year: "numeric",
        },
    );
};
</script>

<style scoped>
.prose {
    font-family: "Inter", sans-serif;
}
</style>

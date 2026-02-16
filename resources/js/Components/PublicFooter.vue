<template>
    <footer class="bg-gray-900 text-gray-100 mt-8">
        <!-- Main Footer -->
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <!-- About -->
                <div>
                    <h3 class="text-lg font-bold mb-4 flex items-center gap-2">
<img src="/img/logofr.jpeg" alt="" class="h-10 rounded-sm">
                        AcadEcol
                    </h3>
                    <p class="text-gray-400 text-sm">
                        {{ t.about.desc[locale] }}
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="font-bold mb-4">{{ t.links.title[locale] }}</h4>
                    <ul class="space-y-2 text-sm">
                        <li>
                            <Link
                                href="/"
                                class="text-gray-400 hover:text-white transition"
                                >{{ t.links.home[locale] }}</Link
                            >
                        </li>
                        <li>
                            <Link
                                href="/formations"
                                class="text-gray-400 hover:text-white transition"
                                >{{ t.links.trainings[locale] }}</Link
                            >
                        </li>
                        <li>
                            <Link
                                href="/actualites"
                                class="text-gray-400 hover:text-white transition"
                                >{{ t.links.news[locale] }}</Link
                            >
                        </li>
                        <li>
                            <Link
                                href="/a-propos"
                                class="text-gray-400 hover:text-white transition"
                                >{{ t.links.about[locale] }}</Link
                            >
                        </li>
                    </ul>
                </div>

                <!-- Categories -->
                <div>
                    <h4 class="font-bold mb-4">
                        {{ t.categories.title[locale] }}
                    </h4>
                    <ul class="space-y-2 text-sm">
                        <li>
                            <a
                                href="/formations?cat=informatique"
                                class="text-gray-400 hover:text-white transition"
                                >{{ t.categories.it[locale] }}</a
                            >
                        </li>
                        <li>
                            <a
                                href="/formations?cat=sante"
                                class="text-gray-400 hover:text-white transition"
                                >{{ t.categories.health[locale] }}</a
                            >
                        </li>
                        <li>
                            <a
                                href="/formations?cat=commerce"
                                class="text-gray-400 hover:text-white transition"
                                >{{ t.categories.business[locale] }}</a
                            >
                        </li>
                        <li>
                            <a
                                href="/formations?cat=langues"
                                class="text-gray-400 hover:text-white transition"
                                >{{ t.categories.languages[locale] }}</a
                            >
                        </li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="font-bold mb-4">
                        {{ t.contact.title[locale] }}
                    </h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li class="flex items-center gap-2">
                            <span>📍</span>
                            <span>{{ t.contact.address[locale] }}</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span>📧</span>
                            <a
                                href="mailto:info@acadecol.cm"
                                class="hover:text-white transition"
                                >info@acadecol.cm</a
                            >
                        </li>
                        <li class="flex items-center gap-2">
                            <span>📱</span>
                            <a
                                href="tel:+237691056965"
                                class="hover:text-white transition"
                                >+237 691 05 69 65</a
                            >
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Divider -->
            <div class="border-t border-gray-700 pt-8">
                <!-- Social Links -->
                <div class="flex justify-center gap-6 mb-6">
                    <a
                        href="#"
                        class="text-gray-400 hover:text-white transition text-2xl"
                        ><i class="fab fa-facebook"></i
                    ></a>
                    <a
                        href="#"
                        class="text-gray-400 hover:text-white transition text-2xl"
                        ><i class="fab fa-twitter"></i
                    ></a>
                    <a
                        href="#"
                        class="text-gray-400 hover:text-white transition text-2xl"
                        ><i class="fab fa-instagram"></i
                    ></a>
                </div>

                <!-- Copyright -->
                <div class="text-center text-gray-500 text-sm">
                    <p>
                        {{
                            t.copyright[locale]?.replace(
                                "2026",
                                new Date().getFullYear(),
                            )
                        }}
                    </p>
                </div>
            </div>
        </div>
    </footer>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { useLocale } from "@/Composables/useLocale";

const { trans, locale } = useLocale();

const t = {
    about: {
        desc: {
            fr: "Plateforme leader en formations professionnelles et certifications en ligne.",
            en: "Leading platform for professional training and online certifications.",
        },
    },
    links: {
        title: { fr: "Liens Rapides", en: "Quick Links" },
        home: { fr: "Accueil", en: "Home" },
        trainings: { fr: "Formations", en: "Trainings" },
        news: { fr: "Actualités", en: "News" },
        about: { fr: "À Propos", en: "About" },
    },
    categories: {
        title: { fr: "Catégories", en: "Categories" },
        it: { fr: "Informatique", en: "IT" },
        health: { fr: "Santé", en: "Health" },
        business: { fr: "Commerce", en: "Business" },
        languages: { fr: "Langues", en: "Languages" },
    },
    contact: {
        title: { fr: "Nous Contacter", en: "Contact Us" },
        address: {
            fr: "Bafoussam, en face de l'ancienne gare routière général voyage",
            en: "Bafoussam, opposite the old General Voyage bus station",
        },
    },
    copyright: {
        fr: "© 2026 AcadEcol. Tous droits réservés.",
        en: "© 2026 AcadEcol. All rights reserved.",
    },
};
</script>

<template>
    <header
        class="sticky top-0 z-50 bg-white shadow-sm border-b border-gray-200"
    >
        <nav
            class="container mx-auto px-3 py-1 flex items-center justify-between"
        >
            <!-- Logo -->
            <!-- Socials, Contact, Search -->
            <div class="flex items-center gap-4">
                <!-- Socials -->
                <div class="flex items-center gap-3">
                    <!-- Language Switcher -->
                    <LanguageSwitcher />

                    <a
                        href="#"
                        class="text-gray-500 hover:text-blue-600 transition"
                        ><i class="fab fa-facebook text-lg"></i
                    ></a>
                    <a
                        href="#"
                        class="text-gray-500 hover:text-blue-700 transition"
                        ><i class="fab fa-linkedin text-lg"></i
                    ></a>
                    <a
                        href="https://wa.me/237691056965"
                        class="text-gray-500 hover:text-green-600 transition"
                        ><i class="fab fa-whatsapp text-lg"></i
                    ></a>
                </div>

                <!-- Contact (Desktop) -->
                <a
                    href="tel:+237691056965"
                    class="hidden xl:flex items-center gap-2 text-gray-600 hover:text-blue-600 transition text-sm font-medium"
                >
                    <i class="fas fa-phone-alt"></i>
                    <span>+237 691 05 69 65</span>
                </a>

                <!-- Search Bar (Desktop) -->
                <div class="relative hidden lg:block text-sm">
                    <input
                        v-model="searchQuery"
                        @keyup.enter="handleSearch"
                        type="text"
                        :placeholder="t.search.placeholder[locale]"
                        class="pl-8 text-[11px] pr-4 py-1.5 rounded-full border border-gray-300 bg-gray-50 text-sm focus:ring-1 focus:ring-blue-500 focus:border-blue-500 w-48 xl:w-64 transition-all"
                    />
                    <i
                        class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs cursor-pointer"
                        @click="handleSearch"
                    ></i>
                </div>
            </div>
            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center gap-5">
                <NavLink :prefetch="true" href="/" :active="isActive('/')">
                    {{ t.nav.home[locale] }}
                </NavLink>
                <NavLink href="/formations" :active="isActive('/formations')">
                    {{ t.nav.trainings[locale] }}
                </NavLink>
                <NavLink href="/actualites" :active="isActive('/actualites')">
                    {{ t.nav.news[locale] }}
                </NavLink>
                <NavLink href="/a-propos" :active="isActive('/a-propos')">
                    {{ t.nav.about[locale] }}
                </NavLink>
                <NavLink href="/contact" :active="isActive('/contact')">
                    {{ t.nav.contact[locale] }}
                </NavLink>
            </div>

            <!-- Auth Links -->
            <div class="flex items-center gap-4">
                <slot name="auth-links" />
                <!-- Mobile Menu Button -->
                <button
                    @click="mobileMenuOpen = !mobileMenuOpen"
                    class="lg:hidden p-2 text-gray-600 hover:text-gray-900"
                >
                    <svg
                        class="w-6 h-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                    </svg>
                </button>
            </div>
        </nav>

        <!-- Mobile Menu -->
        <div
            v-if="mobileMenuOpen"
            class="lg:hidden bg-white border-t border-gray-200"
        >
            <div class="container mx-auto px-4 py-4 space-y-2">
                <!-- Mobile Search -->
                <div class="relative mb-4">
                    <input
                        v-model="searchQuery"
                        @keyup.enter="handleSearch"
                        type="text"
                        :placeholder="t.search.placeholder[locale]"
                        class="w-full pl-9 pr-4 py-2 rounded-lg border border-gray-300 bg-gray-50 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />
                    <i
                        class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 cursor-pointer"
                        @click="handleSearch"
                    ></i>
                </div>

                <Link
                    href="/"
                    class="block px-4 py-2 text-gray-700 hover:bg-blue-50 rounded"
                    >{{ t.nav.home[locale] }}</Link
                >
                <Link
                    href="/formations"
                    class="block px-4 py-2 text-gray-700 hover:bg-blue-50 rounded"
                    >{{ t.nav.trainings[locale] }}</Link
                >
                <Link
                    href="/actualites"
                    class="block px-4 py-2 text-gray-700 hover:bg-blue-50 rounded"
                    >{{ t.nav.news[locale] }}</Link
                >
                <Link
                    href="/a-propos"
                    class="block px-4 py-2 text-gray-700 hover:bg-blue-50 rounded"
                    >{{ t.nav.about[locale] }}</Link
                >
                <Link
                    href="/contact"
                    class="block px-4 py-2 text-gray-700 hover:bg-blue-50 rounded"
                    >{{ t.nav.contact[locale] }}</Link
                >

                <div class="border-t border-gray-200 mt-2 pt-2">
                    <template v-if="$page.props.auth.user">
                        <Link
                            :href="route('admin.dashboard')"
                            class="block px-4 py-2 text-green-600 font-bold hover:bg-green-50 rounded"
                        >
                            <i class="fas fa-cog mr-2"></i
                            >{{ t.auth.admin[locale] }}
                        </Link>
                    </template>
                    <template v-else-if="$page.props.auth.is_student">
                        <Link
                            :href="route('pre-registration.show')"
                            class="block px-4 py-2 text-blue-600 font-bold hover:bg-blue-50 rounded"
                        >
                            <i class="fas fa-user-check mr-2"></i
                            >{{ t.auth.myFile[locale] }}
                        </Link>
                    </template>
                    <template v-else>
                        <Link
                            :href="route('pre-registration.create')"
                            class="block px-4 py-2 text-blue-600 font-bold hover:bg-blue-50 rounded"
                        >
                            <i class="fas fa-pencil mr-2"></i
                            >
                            {{ t.auth.register[locale] }}
                        </Link>
                    </template>
                </div>
            </div>
        </div>
    </header>
</template>

<script setup>
import { ref } from "vue";
import { Link, usePage, router } from "@inertiajs/vue3";
import NavLink from "@/Components/NavLink.vue";
import ApplicationLogo from "./ApplicationLogo.vue";
import LanguageSwitcher from "@/Components/LanguageSwitcher.vue";
import { useLocale } from "@/Composables/useLocale";

const { trans, locale } = useLocale();

const t = {
    search: {
        placeholder: {
            fr: "Rechercher une formation...",
            en: "Search for a training...",
        },
    },
    nav: {
        home: { fr: "Accueil", en: "Home" },
        trainings: { fr: "Formations", en: "Trainings" },
        news: { fr: "Actualités", en: "News" },
        about: { fr: "À Propos", en: "About" },
        contact: { fr: "Contact", en: "Contact" },
    },
    auth: {
        admin: { fr: "Administration", en: "Administration" },
        myFile: { fr: "Mon Dossier", en: "My File" },
        register: { fr: "Se Préinscrire", en: "Pre-register" },
    },
};

const mobileMenuOpen = ref(false);
const page = usePage();
const searchQuery = ref(
    page.url.includes("search=")
        ? new URLSearchParams(window.location.search).get("search")
        : "",
);

const isActive = (path) => {
    return page.url === path || page.url.startsWith(path + "/");
};

const handleSearch = () => {
    if (searchQuery.value.trim()) {
        router.get(
            "/formations",
            { search: searchQuery.value },
            {
                preserveState: true,
                preserveScroll: true,
                replace: false,
            },
        );
        mobileMenuOpen.value = false;
    }
};
</script>

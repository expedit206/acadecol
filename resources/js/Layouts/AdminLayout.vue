<template>
    <Head title="Administration" />

    <div class="min-h-screen bg-gray-100">
        <!-- Navigation -->
        <nav class="bg-white border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <Link
                                :href="route('admin.dashboard')"
                                class="text-2xl font-bold text-blue-600"
                            >
                                ACADECOL Admin
                            </Link>
                        </div>

                        <!-- Navigation Links -->
                        <div
                            class="hidden space-x-8 sm:-my-px sm:ml-10 lg:flex"
                        >
                            <NavLink
                                :href="route('admin.dashboard')"
                                :active="route().current('admin.dashboard')"
                            >
                                <i class="fas fa-home mr-2"></i>
                                Tableau de bord
                            </NavLink>
                            <NavLink
                                :href="route('admin.categories.index')"
                                :active="route().current('admin.categories.*')"
                            >
                                <i class="fas fa-folder mr-2"></i>
                                Catégories
                            </NavLink>
                            <NavLink
                                :href="route('admin.formations.index')"
                                :active="route().current('admin.formations.*')"
                            >
                                <i class="fas fa-graduation-cap mr-2"></i>
                                Formations
                            </NavLink>
                            <NavLink
                                :href="route('admin.pre-registrations.index')"
                                :active="
                                    route().current('admin.pre-registrations.*')
                                "
                            >
                                <i class="fas fa-clipboard-list mr-2"></i>
                                Pré-inscriptions
                            </NavLink>
                            <NavLink
                                :href="route('admin.news.index')"
                                :active="route().current('admin.news.*')"
                            >
                                <i class="fas fa-newspaper mr-2"></i>
                                Actualités
                            </NavLink>
                        </div>
                    </div>

                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <!-- Site Link -->
                        <Link
                            :href="route('home')"
                            class="mr-4 text-gray-600 hover:text-gray-900"
                        >
                            <i class="fas fa-external-link-alt mr-2"></i>
                            Voir le site
                        </Link>

                        <!-- Settings Dropdown -->
                        <div class="ml-3 relative">
                            <Dropdown align="right" width="48">
                                <template #trigger>
                                    <span class="inline-flex rounded-md">
                                        <button
                                            type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                        >
                                            {{ $page.props.auth.user.name }}

                                            <svg
                                                class="ml-2 -mr-0.5 h-4 w-4"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20"
                                                fill="currentColor"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"
                                                />
                                            </svg>
                                        </button>
                                    </span>
                                </template>

                                <template #content>
                                    <DropdownLink :href="route('profile.edit')">
                                        <i class="fas fa-user mr-2"></i>
                                        Profil
                                    </DropdownLink>
                                    <DropdownLink
                                        :href="route('logout')"
                                        method="post"
                                        as="button"
                                    >
                                        <i class="fas fa-sign-out-alt mr-2"></i>
                                        Déconnexion
                                    </DropdownLink>
                                </template>
                            </Dropdown>
                        </div>
                    </div>

                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center lg:hidden">
                        <button
                            @click="
                                showingNavigationDropdown =
                                    !showingNavigationDropdown
                            "
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                        >
                            <svg
                                class="h-6 w-6"
                                stroke="currentColor"
                                fill="none"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    :class="{
                                        hidden: showingNavigationDropdown,
                                        'inline-flex':
                                            !showingNavigationDropdown,
                                    }"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"
                                />
                                <path
                                    :class="{
                                        hidden: !showingNavigationDropdown,
                                        'inline-flex':
                                            showingNavigationDropdown,
                                    }"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Responsive Navigation Menu -->
            <div
                :class="{
                    block: showingNavigationDropdown,
                    hidden: !showingNavigationDropdown,
                }"
                class="md:hidden"
            >
                <div class="pt-2 pb-3 space-y-1">
                    <ResponsiveNavLink
                        :href="route('admin.dashboard')"
                        :active="route().current('admin.dashboard')"
                    >
                        Tableau de bord
                    </ResponsiveNavLink>
                    <ResponsiveNavLink
                        :href="route('admin.categories.index')"
                        :active="route().current('admin.categories.*')"
                    >
                        Catégories
                    </ResponsiveNavLink>
                    <ResponsiveNavLink
                        :href="route('admin.formations.index')"
                        :active="route().current('admin.formations.*')"
                    >
                        Formations
                    </ResponsiveNavLink>
                    <ResponsiveNavLink
                        :href="route('admin.pre-registrations.index')"
                        :active="route().current('admin.pre-registrations.*')"
                    >
                        Pré-inscriptions
                    </ResponsiveNavLink>
                    <ResponsiveNavLink
                        :href="route('admin.news.index')"
                        :active="route().current('admin.news.*')"
                    >
                        Actualités
                    </ResponsiveNavLink>
                </div>

                <!-- Responsive Settings Options -->
                <div class="pt-4 pb-1 border-t border-gray-200">
                    <div class="px-4">
                        <div class="font-medium text-base text-gray-800">
                            {{ $page.props.auth.user.name }}
                        </div>
                        <div class="font-medium text-sm text-gray-500">
                            {{ $page.props.auth.user.email }}
                        </div>
                    </div>

                    <div class="mt-3 space-y-1">
                        <ResponsiveNavLink :href="route('profile.edit')">
                            Profil
                        </ResponsiveNavLink>
                        <ResponsiveNavLink
                            :href="route('logout')"
                            method="post"
                            as="button"
                        >
                            Déconnexion
                        </ResponsiveNavLink>
                    </div>
                </div>

                <div class="flex items-center ml-4 pb-6">
                    <!-- Site Link -->
                    <Link
                        :href="route('home')"
                        class="mr-4 text-gray-600 hover:text-gray-900"
                    >
                        <i class="fas fa-external-link-alt mr-2"></i>
                        Voir le site
                    </Link>
                </div>
            </div>
        </nav>

        <!-- Page Heading -->
        <header class="bg-white shadow" v-if="$slots.header">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <slot name="header" />
            </div>
        </header>

        <!-- Page Content -->
        <main>
            <slot />
        </main>
    </div>
</template>

<script setup>
import { ref } from "vue";
import { Head, Link } from "@inertiajs/vue3";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";

const showingNavigationDropdown = ref(false);
</script>

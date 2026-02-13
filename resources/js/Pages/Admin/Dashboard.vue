<template>
    <AdminLayout title="Tableau de Bord">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h1 class="text-3xl font-bold mb-6">Tableau de Bord</h1>

                        <!-- Stats Cards -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                            <div
                                class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl p-6 text-white shadow-lg"
                            >
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p
                                            class="text-blue-100 text-sm font-medium"
                                        >
                                            Total Formations
                                        </p>
                                        <p class="text-3xl font-bold mt-2">
                                            {{ stats.formations }}
                                        </p>
                                    </div>
                                    <div class="bg-white/20 p-4 rounded-lg">
                                        <i
                                            class="fas fa-graduation-cap text-3xl"
                                        ></i>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl p-6 text-white shadow-lg"
                            >
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p
                                            class="text-green-100 text-sm font-medium"
                                        >
                                            Catégories
                                        </p>
                                        <p class="text-3xl font-bold mt-2">
                                            {{ stats.categories }}
                                        </p>
                                    </div>
                                    <div class="bg-white/20 p-4 rounded-lg">
                                        <i class="fas fa-folder text-3xl"></i>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl p-6 text-white shadow-lg"
                            >
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p
                                            class="text-purple-100 text-sm font-medium"
                                        >
                                            Pré-inscriptions
                                        </p>
                                        <p class="text-3xl font-bold mt-2">
                                            {{ stats.pre_registrations }}
                                        </p>
                                    </div>
                                    <div class="bg-white/20 p-4 rounded-lg">
                                        <i class="fas fa-users text-3xl"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Actions -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div
                                class="border-2 border-gray-200 rounded-xl p-6 hover:border-blue-500 transition-colors"
                            >
                                <h3
                                    class="text-xl font-bold mb-4 flex items-center gap-2"
                                >
                                    <i
                                        class="fas fa-graduation-cap text-blue-600"
                                    ></i>
                                    Gestion des Formations
                                </h3>
                                <p class="text-gray-600 mb-4">
                                    Créer, modifier ou supprimer des formations
                                </p>
                                <Link
                                    :href="route('admin.formations.index')"
                                    class="inline-flex items-center gap-2 bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors"
                                >
                                    <i class="fas fa-arrow-right"></i>
                                    Gérer les formations
                                </Link>
                            </div>

                            <div
                                class="border-2 border-gray-200 rounded-xl p-6 hover:border-green-500 transition-colors"
                            >
                                <h3
                                    class="text-xl font-bold mb-4 flex items-center gap-2"
                                >
                                    <i class="fas fa-folder text-green-600"></i>
                                    Gestion des Catégories
                                </h3>
                                <p class="text-gray-600 mb-4">
                                    Organiser les catégories de formations
                                </p>
                                <Link
                                    :href="route('admin.categories.index')"
                                    class="inline-flex items-center gap-2 bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition-colors"
                                >
                                    <i class="fas fa-arrow-right"></i>
                                    Gérer les catégories
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link } from "@inertiajs/vue3";

defineProps({
    stats: {
        type: Object,
        default: () => ({
            formations: 0,
            categories: 0,
            pre_registrations: 0,
        }),
    },
});
</script>

<template>
    <AdminLayout title="Catégories">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Header -->
                <div class="mb-6 flex justify-between items-center">
                    <h1 class="text-3xl font-bold text-gray-900">
                        Gestion des Catégories
                    </h1>
                    <Link
                        :href="route('admin.categories.create')"
                        class="inline-flex items-center gap-2 bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors shadow-lg"
                    >
                        <i class="fas fa-plus"></i>
                        Nouvelle Catégorie
                    </Link>
                </div>

                <!-- Success Message -->
                <div
                    v-if="$page.props.flash.success"
                    class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg"
                >
                    <div class="flex items-center">
                        <i class="fas fa-check-circle mr-3 text-xl"></i>
                        <p>{{ $page.props.flash.success }}</p>
                    </div>
                </div>

                <!-- Error Message -->
                <div
                    v-if="$page.props.flash.error"
                    class="mb-6 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg"
                >
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-circle mr-3 text-xl"></i>
                        <p>{{ $page.props.flash.error }}</p>
                    </div>
                </div>

                <!-- Categories Table -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        >
                                            Icône
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        >
                                            Nom (FR)
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        >
                                            Nom (EN)
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        >
                                            Formations
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        >
                                            Ordre
                                        </th>
                                        <th
                                            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        >
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody
                                    class="bg-white divide-y divide-gray-200"
                                >
                                    <tr
                                        v-for="category in categories"
                                        :key="category.id"
                                        class="hover:bg-gray-50"
                                    >
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div
                                                class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-lg"
                                            >
                                                <i
                                                    :class="
                                                        category.icon_class ||
                                                        'fas fa-folder'
                                                    "
                                                    class="text-blue-600 text-xl"
                                                ></i>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div
                                                class="text-sm font-medium text-gray-900"
                                            >
                                                {{ category.nom.fr }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-500">
                                                {{ category.nom.en }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800"
                                            >
                                                {{
                                                    category.formations_count
                                                }}
                                                formation(s)
                                            </span>
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                                        >
                                            {{
                                                category.ordre_affichage || "-"
                                            }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                                        >
                                            <div
                                                class="flex items-center justify-end gap-2"
                                            >
                                                <Link
                                                    :href="
                                                        route(
                                                            'admin.categories.edit',
                                                            category.id,
                                                        )
                                                    "
                                                    class="text-blue-600 hover:text-blue-900"
                                                >
                                                    <i class="fas fa-edit"></i>
                                                </Link>
                                                <button
                                                    @click="
                                                        deleteCategory(category)
                                                    "
                                                    class="text-red-600 hover:text-red-900"
                                                >
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div
                                v-if="categories.length === 0"
                                class="text-center py-12"
                            >
                                <i
                                    class="fas fa-folder-open text-6xl text-gray-300 mb-4"
                                ></i>
                                <p class="text-gray-500 text-lg">
                                    Aucune catégorie trouvée
                                </p>
                                <Link
                                    :href="route('admin.categories.create')"
                                    class="inline-block mt-4 text-blue-600 hover:text-blue-800"
                                >
                                    Créer la première catégorie
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
import { Link, router } from "@inertiajs/vue3";

defineProps({
    categories: Array,
});

const deleteCategory = (category) => {
    if (
        confirm(
            `Êtes-vous sûr de vouloir supprimer la catégorie "${category.nom.fr}" ?`,
        )
    ) {
        router.delete(route("admin.categories.destroy", category.id));
    }
};
</script>

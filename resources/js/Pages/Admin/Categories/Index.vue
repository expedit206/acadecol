    <template>
        <AdminLayout title="Catégories">
            <div class="py-12">
                <div class="hidden lg:block max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <!-- Header -->
                    <div class="mb-6 flex justify-between items-center">
                        <h1 class="text-3xl font-bold text-gray-900">
                            Gestion des Catégories
                        </h1>
                        <Link :href="route('admin.categories.create')"
                            class="inline-flex items-center gap-2 bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors shadow-lg">
                            <i class="fas fa-plus"></i>
                            Nouvelle Catégorie
                        </Link>
                    </div>

                    <!-- Success Message -->
                    <div v-if="$page.props.flash.success"
                        class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle mr-3 text-xl"></i>
                            <p>{{ $page.props.flash.success }}</p>
                        </div>
                    </div>

                    <!-- Error Message -->
                    <div v-if="$page.props.flash.error"
                        class="mb-6 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-circle mr-3 text-xl"></i>
                            <p>{{ $page.props.flash.error }}</p>
                        </div>
                    </div>

                    <!-- Categories Table -->
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Icône
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nom (FR)
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nom (EN)
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Formations
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Ordre
                                </th>
                                <th
                                    class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="category in categories" :key="category.id" class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-lg">
                                        <i :class="category.icon_class ||
                                            'fas fa-folder'
                                            " class="text-blue-600 text-xl"></i>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">
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
                                        class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                        {{
                                            category.formations_count
                                        }}
                                        formation(s)
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{
                                        category.ordre_affichage || "-"
                                    }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex items-center justify-end gap-2">
                                        <Link :href="route(
                                            'admin.categories.edit',
                                            category.id,
                                        )
                                            " class="text-blue-600 hover:text-blue-900">
                                            <i class="fas fa-edit"></i>
                                        </Link>
                                        <button @click="
                                            deleteCategory(category)
                                            " class="text-red-600 hover:text-red-900">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div v-if="categories.length === 0" class="text-center py-12">
                        <i class="fas fa-folder-open text-6xl text-gray-300 mb-4"></i>
                        <p class="text-gray-500 text-lg">
                            Aucune catégorie trouvée
                        </p>
                        <Link :href="route('admin.categories.create')"
                            class="inline-block mt-4 text-blue-600 hover:text-blue-800">
                            Créer la première catégorie
                        </Link>
                    </div>
                </div>

                <!-- Mobile Cards -->
                <div class="lg:hidden space-y-4">
                    <div v-for="category in categories" :key="category.id"
                        class="bg-white overflow-hidden shadow-sm rounded-lg p-4">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <div class="flex items-center justify-center w-12 h-12 bg-blue-100 rounded-lg">
                                    <i :class="category.icon_class ||
                                        'fas fa-folder'
                                        " class="text-blue-600 text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-900">
                                        {{ category.nom.fr }}
                                    </h3>
                                    <p class="text-sm text-gray-500">
                                        {{ category.nom.en }}
                                    </p>
                                </div>
                            </div>
                            <span
                                class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                Ordre: {{ category.ordre_affichage || "-" }}
                            </span>
                        </div>

                        <div class="mb-4">
                            <span
                                class="w-full text-center px-3 py-1 inline-block text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                {{ category.formations_count }} formation(s)
                            </span>
                        </div>

                        <div class="grid grid-cols-2 gap-2 mt-4 pt-4 border-t border-gray-100">
                            <Link :href="route('admin.categories.edit', category.id)"
                                class="flex items-center justify-center px-4 py-2 bg-blue-50 text-blue-700 rounded-lg hover:bg-blue-100 transition text-sm font-medium">
                                <i class="fas fa-edit mr-2"></i> Modifier
                            </Link>
                            <button @click="deleteCategory(category)"
                                class="flex items-center justify-center px-4 py-2 bg-red-50 text-red-700 rounded-lg hover:bg-red-100 transition text-sm font-medium">
                                <i class="fas fa-trash mr-2"></i> Supprimer
                            </button>
                        </div>
                    </div>

                    <!-- Mobile Empty State -->
                    <div v-if="categories.length === 0" class="text-center py-12 bg-white rounded-lg shadow">
                        <i class="fas fa-folder-open text-6xl text-gray-300 mb-4"></i>
                        <p class="text-gray-500 text-lg">
                            Aucune catégorie trouvée
                        </p>
                        <Link :href="route('admin.categories.create')"
                            class="inline-block mt-4 text-blue-600 hover:text-blue-800">
                            Créer la première catégorie
                        </Link>
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

<template>
    <AdminLayout title="Formations">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Header -->
                <div class="mb-6 flex justify-between items-center">
                    <h1 class="text-3xl font-bold text-gray-900">
                        Gestion des Formations
                    </h1>
                    <Link
                        :href="route('admin.formations.create')"
                        class="inline-flex items-center gap-2 bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors shadow-lg"
                    >
                        <i class="fas fa-plus"></i>
                        Nouvelle Formation
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

                <!-- Formations Table -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        >
                                            Formation
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        >
                                            Catégorie
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        >
                                            Prix
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        >
                                            Durée
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        >
                                            Statut
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
                                        v-for="formation in formations.data"
                                        :key="formation.id"
                                        class="hover:bg-gray-50"
                                    >
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <div
                                                    class="flex-shrink-0 h-10 w-16 mr-4 bg-gray-100 rounded overflow-hidden"
                                                >
                                                    <img
                                                        v-if="formation.image"
                                                        :src="`/${formation.image.path}`"
                                                        class="h-full w-full object-cover"
                                                        onerror="
                                                            this.src =
                                                                '/img/school1.jpg'
                                                        "
                                                    />
                                                    <div
                                                        v-else
                                                        class="h-full w-full flex items-center justify-center text-gray-400"
                                                    >
                                                        <i
                                                            class="fas fa-image"
                                                        ></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div
                                                        class="text-sm font-medium text-gray-900"
                                                    >
                                                        {{ formation.titre.fr }}
                                                    </div>
                                                    <div
                                                        class="text-sm text-gray-500"
                                                    >
                                                        {{ formation.titre.en }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800"
                                            >
                                                {{
                                                    formation.category?.nom
                                                        ?.fr || "N/A"
                                                }}
                                            </span>
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                                        >
                                            {{
                                                formation.prix
                                                    ? formatPrice(
                                                          formation.prix,
                                                      )
                                                    : "Gratuit"
                                            }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                                        >
                                            {{ formation.duree || "-" }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <button
                                                @click="
                                                    toggleFeatured(formation)
                                                "
                                                :class="
                                                    formation.is_featured
                                                        ? 'bg-green-100 text-green-800'
                                                        : 'bg-gray-100 text-gray-800'
                                                "
                                                class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full cursor-pointer hover:opacity-75"
                                            >
                                                <i
                                                    :class="
                                                        formation.is_featured
                                                            ? 'fas fa-star'
                                                            : 'far fa-star'
                                                    "
                                                    class="mr-1"
                                                ></i>
                                                {{
                                                    formation.is_featured
                                                        ? "Mise en avant"
                                                        : "Standard"
                                                }}
                                            </button>
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
                                                            'admin.formations.edit',
                                                            formation.id,
                                                        )
                                                    "
                                                    class="text-blue-600 hover:text-blue-900"
                                                >
                                                    <i class="fas fa-edit"></i>
                                                </Link>
                                                <button
                                                    @click="
                                                        deleteFormation(
                                                            formation,
                                                        )
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
                                v-if="formations.data.length === 0"
                                class="text-center py-12"
                            >
                                <i
                                    class="fas fa-graduation-cap text-6xl text-gray-300 mb-4"
                                ></i>
                                <p class="text-gray-500 text-lg">
                                    Aucune formation trouvée
                                </p>
                                <Link
                                    :href="route('admin.formations.create')"
                                    class="inline-block mt-4 text-blue-600 hover:text-blue-800"
                                >
                                    Créer la première formation
                                </Link>
                            </div>
                        </div>

                        <!-- Pagination -->
                        <div
                            v-if="formations.data.length > 0"
                            class="mt-6 flex items-center justify-between border-t pt-4"
                        >
                            <div class="text-sm text-gray-700">
                                Affichage de
                                <span class="font-medium">{{
                                    formations.from
                                }}</span>
                                à
                                <span class="font-medium">{{
                                    formations.to
                                }}</span>
                                sur
                                <span class="font-medium">{{
                                    formations.total
                                }}</span>
                                résultats
                            </div>
                            <div class="flex gap-2">
                                <template
                                    v-for="link in formations.links"
                                    :key="link.label"
                                >
                                    <!-- Link actif -->
                                    <Link
                                        v-if="link.url"
                                        :href="link.url"
                                        :class="[
                                            'px-4 py-2 border rounded-lg text-sm transition',
                                            link.active
                                                ? 'bg-blue-600 text-white border-blue-600'
                                                : 'bg-white text-gray-700 border-gray-300 hover:bg-gray-50',
                                        ]"
                                        v-html="link.label"
                                    />
                                    <!-- Lien désactivé (Previous/Next sans URL) -->
                                    <span
                                        v-else
                                        :class="[
                                            'px-4 py-2 border rounded-lg text-sm cursor-not-allowed opacity-50',
                                            'bg-gray-100 text-gray-400 border-gray-200',
                                        ]"
                                        v-html="link.label"
                                    />
                                </template>
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
    formations: Object,
});

const formatPrice = (price) => {
    return new Intl.NumberFormat("fr-FR", {
        style: "currency",
        currency: "XAF",
    }).format(price);
};

const toggleFeatured = (formation) => {
    router.post(route("admin.formations.toggle-featured", formation.id));
};

const deleteFormation = (formation) => {
    if (
        confirm(
            `Êtes-vous sûr de vouloir supprimer la formation "${formation.titre.fr}" ?`,
        )
    ) {
        router.delete(route("admin.formations.destroy", formation.id));
    }
};
</script>

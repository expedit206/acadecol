<template>
    <AdminLayout title="Actualités">
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Gestion des Actualités
                </h2>
                <Link
                    :href="route('admin.news.create')"
                    class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700"
                >
                    Nouvelle Actualité
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                    >
                                        Titre
                                    </th>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                    >
                                        Statut
                                    </th>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                    >
                                        Date de Publication
                                    </th>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider"
                                    >
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr v-for="item in news.data" :key="item.id">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div
                                                class="flex-shrink-0 h-10 w-10"
                                            >
                                                <img
                                                    class="h-10 w-10 rounded-full object-cover"
                                                    :src="
                                                        item.image
                                                            ? '/' + item.image
                                                            : 'https://ui-avatars.com/api/?name=' +
                                                              item.slug
                                                    "
                                                    alt=""
                                                />
                                            </div>
                                            <div class="ml-4">
                                                <div
                                                    class="text-sm font-medium text-gray-900"
                                                >
                                                    {{ item.title.fr }}
                                                </div>
                                                <div
                                                    class="text-sm text-gray-500"
                                                >
                                                    {{ item.title.en }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
                                            :class="getStatusClass(item)"
                                        >
                                            {{ getStatusLabel(item) }}
                                        </span>
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                                    >
                                        {{
                                            item.published_at
                                                ? new Date(
                                                      item.published_at,
                                                  ).toLocaleDateString()
                                                : "-"
                                        }}
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                                    >
                                        <Link
                                            :href="
                                                route(
                                                    'admin.news.edit',
                                                    item.id,
                                                )
                                            "
                                            class="text-indigo-600 hover:text-indigo-900 mr-4"
                                        >
                                            Modifier
                                        </Link>
                                        <button
                                            @click="deleteNews(item)"
                                            class="text-red-600 hover:text-red-900"
                                        >
                                            Supprimer
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="mt-4" v-if="news.links.length > 3">
                            <div class="flex flex-wrap -mb-1">
                                <template
                                    v-for="(link, p) in news.links"
                                    :key="p"
                                >
                                    <div
                                        v-if="link.url === null"
                                        class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded"
                                        v-html="link.label"
                                    />
                                    <Link
                                        v-else
                                        class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-white focus:border-indigo-500 focus:text-indigo-500"
                                        :class="{
                                            'bg-blue-700 text-white':
                                                link.active,
                                        }"
                                        :href="link.url"
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
    news: Object,
});

const deleteNews = (item) => {
    if (confirm("Êtes-vous sûr de vouloir supprimer cette actualité ?")) {
        router.delete(route("admin.news.destroy", item.id));
    }
};

const getStatusLabel = (item) => {
    if (!item.is_published) return "Brouillon";
    if (new Date(item.published_at) > new Date()) return "Planifié";
    return "Publié";
};

const getStatusClass = (item) => {
    if (!item.is_published) return "bg-red-100 text-red-800";
    if (new Date(item.published_at) > new Date())
        return "bg-blue-100 text-blue-800";
    return "bg-green-100 text-green-800";
};
</script>

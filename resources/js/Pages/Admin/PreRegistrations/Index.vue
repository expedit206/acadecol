<template>
    <AdminLayout title="Pré-inscriptions">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Header -->
                <div class="mb-6 flex justify-between items-center">
                    <h1 class="text-3xl font-bold text-gray-900">
                        Pré-inscriptions
                    </h1>
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

                <!-- Table (Desktop) -->
                <div
                    class="hidden md:block bg-white overflow-hidden shadow-sm sm:rounded-lg"
                >
                    <div class="p-6">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        >
                                            Étudiant
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        >
                                            Formation
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        >
                                            Date
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
                                        v-for="registration in preRegistrations.data"
                                        :key="registration.id"
                                        class="hover:bg-gray-50"
                                    >
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <div>
                                                    <div
                                                        class="text-sm font-medium text-gray-900"
                                                    >
                                                        {{
                                                            registration.first_name
                                                        }}
                                                        {{
                                                            registration.last_name
                                                        }}
                                                    </div>
                                                    <div
                                                        class="text-sm text-gray-500"
                                                    >
                                                        {{ registration.email }}
                                                    </div>
                                                    <div
                                                        class="text-sm text-gray-500"
                                                    >
                                                        {{ registration.phone }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800"
                                            >
                                                {{
                                                    registration.formation
                                                        ?.titre?.fr || "N/A"
                                                }}
                                            </span>
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                                        >
                                            {{
                                                new Date(
                                                    registration.created_at,
                                                ).toLocaleDateString("fr-FR")
                                            }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full"
                                                :class="{
                                                    'bg-yellow-100 text-yellow-800':
                                                        registration.status ===
                                                        'pending',
                                                    'bg-green-100 text-green-800':
                                                        registration.status ===
                                                        'validated',
                                                    'bg-red-100 text-red-800':
                                                        registration.status ===
                                                        'cancelled',
                                                }"
                                            >
                                                {{
                                                    registration.status ===
                                                    "pending"
                                                        ? "En attente"
                                                        : registration.status ===
                                                            "validated"
                                                          ? "Validée"
                                                          : "Annulée"
                                                }}
                                            </span>
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                                        >
                                            <Link
                                                :href="
                                                    route(
                                                        'admin.pre-registrations.show',
                                                        registration.id,
                                                    )
                                                "
                                                class="text-blue-600 hover:text-blue-900"
                                            >
                                                <i class="fas fa-eye"></i> Voir
                                            </Link>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Cards (Mobile) -->
                <div class="md:hidden space-y-4">
                    <div
                        v-for="registration in preRegistrations.data"
                        :key="registration.id"
                        class="bg-white overflow-hidden shadow-sm rounded-lg p-4"
                    >
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="font-bold text-lg text-gray-900">
                                    {{ registration.first_name }}
                                    {{ registration.last_name }}
                                </h3>
                                <div class="text-sm text-gray-500">
                                    {{ registration.email }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{ registration.phone }}
                                </div>
                            </div>
                            <span
                                class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full"
                                :class="{
                                    'bg-yellow-100 text-yellow-800':
                                        registration.status === 'pending',
                                    'bg-green-100 text-green-800':
                                        registration.status === 'validated',
                                    'bg-red-100 text-red-800':
                                        registration.status === 'cancelled',
                                }"
                            >
                                {{
                                    registration.status === "pending"
                                        ? "En attente"
                                        : registration.status === "validated"
                                          ? "Validée"
                                          : "Annulée"
                                }}
                            </span>
                        </div>

                        <div class="mb-4">
                            <div class="text-sm font-medium text-gray-700 mb-1">
                                Formation:
                            </div>
                            <span
                                class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800"
                            >
                                {{ registration.formation?.titre?.fr || "N/A" }}
                            </span>
                        </div>

                        <div
                            class="flex justify-between items-center border-t pt-4"
                        >
                            <div class="text-sm text-gray-500">
                                {{
                                    new Date(
                                        registration.created_at,
                                    ).toLocaleDateString("fr-FR")
                                }}
                            </div>
                            <Link
                                :href="
                                    route(
                                        'admin.pre-registrations.show',
                                        registration.id,
                                    )
                                "
                                class="text-blue-600 hover:text-blue-900 font-medium"
                            >
                                <i class="fas fa-eye mr-1"></i> Détails
                            </Link>
                        </div>
                    </div>

                    <!-- Empty State Mobile -->
                    <div
                        v-if="preRegistrations.data.length === 0"
                        class="text-center py-12 bg-white rounded-lg shadow"
                    >
                        <i class="fas fa-inbox text-6xl text-gray-300 mb-4"></i>
                        <p class="text-gray-500 text-lg">
                            Aucune pré-inscription reçue
                        </p>
                    </div>
                </div>

                <!-- Pagination -->
                <div
                    v-if="preRegistrations.data.length > 0"
                    class="mt-6 flex flex-col sm:flex-row items-center justify-between border-t pt-4 gap-4"
                >
                    <div class="text-sm text-gray-700 text-center sm:text-left">
                        Affichage de
                        <span class="font-medium">{{
                            preRegistrations.from
                        }}</span>
                        à
                        <span class="font-medium">{{
                            preRegistrations.to
                        }}</span>
                        sur
                        <span class="font-medium">{{
                            preRegistrations.total
                        }}</span>
                        résultats
                    </div>
                    <div class="flex gap-2 justify-center">
                        <Link
                            v-for="link in preRegistrations.links"
                            :key="link.label"
                            :href="link.url"
                            :class="[
                                'px-4 py-2 border rounded-lg text-sm',
                                link.active
                                    ? 'bg-blue-600 text-white border-blue-600'
                                    : 'bg-white text-gray-700 border-gray-300 hover:bg-gray-50',
                            ]"
                            v-html="link.label"
                            :disabled="!link.url"
                        />
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
    preRegistrations: Object,
});
</script>

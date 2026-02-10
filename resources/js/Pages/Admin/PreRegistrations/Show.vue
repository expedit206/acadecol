<template>
    <AdminLayout title="Détails Pré-inscription">
        <div class="py-12">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <!-- Header -->
                <div class="mb-6 flex items-center gap-4">
                    <Link
                        :href="route('admin.pre-registrations.index')"
                        class="text-gray-600 hover:text-gray-900"
                    >
                        <i class="fas fa-arrow-left text-xl"></i>
                    </Link>
                    <h1 class="text-3xl font-bold text-gray-900">
                        Pré-inscription #{{
                            preRegistration.registration_number
                        }}
                    </h1>
                </div>

                <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-6">
                    <div
                        class="px-4 py-5 sm:px-6 flex justify-between items-center"
                    >
                        <div>
                            <h3
                                class="text-lg leading-6 font-medium text-gray-900"
                            >
                                Informations de l'étudiant
                            </h3>
                            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                Données personnelles et académiques.
                            </p>
                        </div>
                        <span
                            class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full"
                            :class="{
                                'bg-yellow-100 text-yellow-800':
                                    preRegistration.status === 'pending',
                                'bg-green-100 text-green-800':
                                    preRegistration.status === 'validated',
                                'bg-red-100 text-red-800':
                                    preRegistration.status === 'cancelled',
                            }"
                        >
                            {{
                                preRegistration.status === "pending"
                                    ? "En attente"
                                    : preRegistration.status === "validated"
                                      ? "Validée"
                                      : "Annulée"
                            }}
                        </span>
                    </div>
                    <div class="border-t border-gray-200">
                        <dl>
                            <div
                                class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                            >
                                <dt class="text-sm font-medium text-gray-500">
                                    Nom complet
                                </dt>
                                <dd
                                    class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
                                >
                                    {{ preRegistration.first_name }}
                                    {{ preRegistration.last_name }}
                                </dd>
                            </div>
                            <div
                                class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                            >
                                <dt class="text-sm font-medium text-gray-500">
                                    Contact
                                </dt>
                                <dd
                                    class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
                                >
                                    {{ preRegistration.email }} <br />
                                    {{ preRegistration.phone }}
                                </dd>
                            </div>
                            <div
                                class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                            >
                                <dt class="text-sm font-medium text-gray-500">
                                    Formation demandée
                                </dt>
                                <dd
                                    class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 font-bold"
                                >
                                    {{ preRegistration.formation?.titre?.fr }}
                                </dd>
                            </div>
                            <div
                                class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                            >
                                <dt class="text-sm font-medium text-gray-500">
                                    Date de naissance
                                </dt>
                                <dd
                                    class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
                                >
                                    {{
                                        new Date(
                                            preRegistration.birth_date,
                                        ).toLocaleDateString("fr-FR")
                                    }}
                                    ({{
                                        preRegistration.gender === "M"
                                            ? "Homme"
                                            : "Femme"
                                    }})
                                </dd>
                            </div>
                            <div
                                class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                            >
                                <dt class="text-sm font-medium text-gray-500">
                                    Adresse
                                </dt>
                                <dd
                                    class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
                                >
                                    {{ preRegistration.address }}
                                </dd>
                            </div>
                            <div
                                class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                            >
                                <dt class="text-sm font-medium text-gray-500">
                                    Niveau d'étude
                                </dt>
                                <dd
                                    class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
                                >
                                    {{ preRegistration.education_level }}
                                </dd>
                            </div>
                            <div
                                class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                            >
                                <dt class="text-sm font-medium text-gray-500">
                                    Dernier établissement
                                </dt>
                                <dd
                                    class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
                                >
                                    {{ preRegistration.last_school || "-" }}
                                </dd>
                            </div>
                            <div
                                class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                            >
                                <dt class="text-sm font-medium text-gray-500">
                                    Message
                                </dt>
                                <dd
                                    class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 italic"
                                >
                                    "{{
                                        preRegistration.message ||
                                        "Aucun message"
                                    }}"
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <!-- Actions -->
                <div
                    class="bg-white shadow sm:rounded-lg p-6 flex justify-end gap-4"
                >
                    <button
                        v-if="preRegistration.status !== 'validated'"
                        @click="updateStatus('validated')"
                        class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition"
                    >
                        Valider l'inscription
                    </button>
                    <button
                        v-if="preRegistration.status !== 'cancelled'"
                        @click="updateStatus('cancelled')"
                        class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition"
                    >
                        Annuler / Rejeter
                    </button>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link, router } from "@inertiajs/vue3";

const props = defineProps({
    preRegistration: Object,
});

const updateStatus = (status) => {
    if (
        confirm(
            "Êtes-vous sûr de vouloir changer le statut de cette pré-inscription ?",
        )
    ) {
        router.patch(
            route("admin.pre-registrations.update", props.preRegistration.id),
            {
                status: status,
            },
        );
    }
};
</script>

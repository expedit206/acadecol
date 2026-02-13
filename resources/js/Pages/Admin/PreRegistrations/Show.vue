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
                                    {{ preRegistration.phone }} <br />
                                    <span v-if="preRegistration.whatsapp">
                                        WhatsApp: {{ preRegistration.whatsapp }}
                                    </span>
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
                                    <span v-if="preRegistration.birth_place">
                                        à {{ preRegistration.birth_place }}
                                    </span>
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
                                    <span v-if="preRegistration.major_field">
                                        - {{ preRegistration.major_field }}
                                    </span>
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
                                    <span
                                        v-if="preRegistration.graduation_year"
                                    >
                                        (Année:
                                        {{ preRegistration.graduation_year }})
                                    </span>
                                </dd>
                            </div>

                            <!-- Situation Professionnelle -->
                            <div
                                class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                            >
                                <dt class="text-sm font-medium text-gray-500">
                                    Situation Professionnelle
                                </dt>
                                <dd
                                    class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
                                >
                                    <div
                                        v-if="
                                            preRegistration.professional_status
                                        "
                                    >
                                        <span class="font-semibold">{{
                                            preRegistration.professional_status
                                        }}</span>
                                        <span
                                            v-if="
                                                preRegistration.current_position
                                            "
                                        >
                                            -
                                            {{
                                                preRegistration.current_position
                                            }}
                                        </span>
                                        <span
                                            v-if="preRegistration.company_name"
                                        >
                                            chez
                                            {{ preRegistration.company_name }}
                                        </span>
                                    </div>
                                    <div
                                        v-if="
                                            preRegistration.years_of_experience
                                        "
                                        class="text-gray-500 text-xs mt-1"
                                    >
                                        Expérience:
                                        {{
                                            preRegistration.years_of_experience
                                        }}
                                    </div>
                                    <span v-else class="text-gray-400 italic"
                                        >Non renseigné</span
                                    >
                                </dd>
                            </div>

                            <!-- Langues -->
                            <div
                                class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                            >
                                <dt class="text-sm font-medium text-gray-500">
                                    Langues
                                </dt>
                                <dd
                                    class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
                                >
                                    <div class="grid grid-cols-2 gap-2">
                                        <div>
                                            Français:
                                            <span class="font-medium">{{
                                                preRegistration.french_level ||
                                                "-"
                                            }}</span>
                                        </div>
                                        <div>
                                            Anglais:
                                            <span class="font-medium">{{
                                                preRegistration.english_level ||
                                                "-"
                                            }}</span>
                                        </div>
                                    </div>
                                    <div
                                        v-if="preRegistration.other_languages"
                                        class="mt-1 text-xs"
                                    >
                                        Autres:
                                        {{ preRegistration.other_languages }}
                                    </div>
                                </dd>
                            </div>

                            <!-- Disponibilité -->
                            <div
                                class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                            >
                                <dt class="text-sm font-medium text-gray-500">
                                    Disponibilité & Préférences
                                </dt>
                                <dd
                                    class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
                                >
                                    <div>
                                        Disponibilité:
                                        {{
                                            preRegistration.availability || "-"
                                        }}
                                    </div>
                                    <div>
                                        Horaire préféré:
                                        {{
                                            preRegistration.preferred_schedule ||
                                            "-"
                                        }}
                                    </div>
                                </dd>
                            </div>

                            <div
                                class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
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
                    class="bg-white shadow sm:rounded-lg p-6 flex flex-col sm:flex-row justify-end gap-4"
                >
                    <button
                        v-if="preRegistration.status !== 'validated'"
                        @click="updateStatus('validated')"
                        class="w-full sm:w-auto bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition flex justify-center items-center"
                    >
                        <i class="fas fa-check mr-2"></i> Valider l'inscription
                    </button>
                    <button
                        v-if="preRegistration.status !== 'cancelled'"
                        @click="updateStatus('cancelled')"
                        class="w-full sm:w-auto bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition flex justify-center items-center"
                    >
                        <i class="fas fa-times mr-2"></i> Annuler / Rejeter
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

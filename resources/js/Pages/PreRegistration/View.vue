<template>
    <PublicLayout>
        <div class="py-12 bg-gray-50 min-h-screen">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Messages Flash -->
                <div
                    v-if="$page.props.flash?.success"
                    class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded shadow-sm"
                >
                    <p class="font-bold">Succès</p>
                    <p>{{ $page.props.flash.success }}</p>
                </div>

                <!-- Navigation de retour (si en mode édition) -->
                <div v-if="isEditing" class="mb-4">
                    <button
                        @click="isEditing = false"
                        class="text-blue-600 hover:text-blue-800 font-medium flex items-center"
                    >
                        <i class="fas fa-arrow-left mr-2"></i> Retour à la fiche
                    </button>
                </div>

                <!-- VUE FICHE (Lecture Seule) -->
                <div
                    v-if="!isEditing"
                    class="bg-white shadow-xl rounded-lg overflow-hidden border border-gray-200"
                >
                    <!-- En-tête de la fiche -->
                    <div
                        class="bg-blue-600 text-white p-6 sm:p-10 flex flex-col sm:flex-row justify-between items-start sm:items-center relative overflow-hidden"
                    >
                        <div class="relative z-10 w-full">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h1
                                        class="text-2xl sm:text-3xl font-bold uppercase tracking-wider border-b-2 border-blue-400 pb-2 mb-2 inline-block"
                                    >
                                        Fiche de Pré-inscription
                                    </h1>
                                    <p
                                        class="text-blue-100 mt-1 text-sm sm:text-base"
                                    >
                                        Année Académique 2024-2025
                                    </p>
                                </div>
                                <div
                                    class="bg-white text-blue-800 px-4 py-2 rounded-lg font-mono font-bold text-lg shadow-md hidden sm:block"
                                >
                                    N° {{ preRegistration.registration_number }}
                                </div>
                            </div>
                        </div>
                        <!-- Filigrane déco -->
                        <i
                            class="fas fa-file-contract absolute -right-6 -bottom-6 text-9xl text-blue-700 opacity-20 transform rotate-12 z-0"
                        ></i>
                    </div>

                    <!-- Barre de statut mobile et info -->
                    <div
                        class="bg-gray-100 px-6 py-3 border-b border-gray-200 flex flex-col sm:flex-row justify-between items-center gap-4"
                    >
                        <div
                            class="sm:hidden font-mono font-bold text-gray-700 text-lg"
                        >
                            N° {{ preRegistration.registration_number }}
                        </div>
                        <div class="flex items-center space-x-4">
                            <span
                                class="mr-2 text-gray-600 font-medium hidden sm:inline"
                                >Statut :</span
                            >
                            <span
                                :class="
                                    getStatusBadgeClass(preRegistration.status)
                                "
                                class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide"
                            >
                                {{ getStatusLabel(preRegistration.status) }}
                            </span>
                            <button
                                @click="logout"
                                class="text-red-500 hover:text-red-700 text-sm font-medium underline flex items-center print:hidden"
                            >
                                <i class="fas fa-sign-out-alt mr-1"></i> Sortir
                            </button>
                        </div>
                        <div v-if="canEdit" class="print:hidden">
                            <button
                                @click="isEditing = true"
                                class="text-blue-600 hover:text-blue-800 font-medium text-sm flex items-center bg-white px-3 py-1 rounded border border-blue-200 shadow-sm hover:shadow"
                            >
                                <i class="fas fa-edit mr-2"></i> Modifier mes
                                informations
                            </button>
                        </div>
                    </div>

                    <!-- Contenu de la fiche -->
                    <div
                        class="p-6 sm:p-10 grid grid-cols-1 md:grid-cols-2 gap-8 sm:gap-12"
                    >
                        <!-- Col Gauche : Identité -->
                        <div>
                            <h3
                                class="text-gray-400 text-xs font-bold uppercase tracking-widest mb-4 border-b pb-1"
                            >
                                Identité du Candidat
                            </h3>
                            <div class="space-y-4">
                                <div>
                                    <label
                                        class="block text-xs text-gray-500 uppercase"
                                        >Nom & Prénom</label
                                    >
                                    <p class="text-lg font-bold text-gray-900">
                                        {{ preRegistration.last_name }}
                                        {{ preRegistration.first_name }}
                                    </p>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label
                                            class="block text-xs text-gray-500 uppercase"
                                            >Date de naissance</label
                                        >
                                        <p class="text-gray-800 font-medium">
                                            {{
                                                formatDate(
                                                    preRegistration.birth_date,
                                                )
                                            }}
                                        </p>
                                    </div>
                                    <div>
                                        <label
                                            class="block text-xs text-gray-500 uppercase"
                                            >Sexe</label
                                        >
                                        <p class="text-gray-800 font-medium">
                                            {{
                                                preRegistration.gender === "M"
                                                    ? "Masculin"
                                                    : "Féminin"
                                            }}
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <label
                                        class="block text-xs text-gray-500 uppercase"
                                        >Adresse / Ville</label
                                    >
                                    <p class="text-gray-800 font-medium">
                                        {{ preRegistration.address }}
                                    </p>
                                </div>
                            </div>

                            <h3
                                class="text-gray-400 text-xs font-bold uppercase tracking-widest mb-4 border-b pb-1 mt-8"
                            >
                                Contact
                            </h3>
                            <div class="space-y-4">
                                <div>
                                    <label
                                        class="block text-xs text-gray-500 uppercase"
                                        >Email</label
                                    >
                                    <p class="text-gray-800 font-medium">
                                        {{ preRegistration.email }}
                                    </p>
                                </div>
                                <div>
                                    <label
                                        class="block text-xs text-gray-500 uppercase"
                                        >Téléphone (WhatsApp)</label
                                    >
                                    <p class="text-gray-800 font-medium">
                                        {{ preRegistration.phone }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Col Droite : Formation -->
                        <div>
                            <h3
                                class="text-gray-400 text-xs font-bold uppercase tracking-widest mb-4 border-b pb-1"
                            >
                                Formation Sollicitée
                            </h3>
                            <div
                                class="bg-blue-50 p-4 rounded-lg border border-blue-100 mb-6"
                            >
                                <p
                                    class="text-blue-800 font-bold text-lg leading-tight"
                                >
                                    {{
                                        getFormationTitle(
                                            preRegistration.formation,
                                        )
                                    }}
                                </p>
                            </div>

                            <h3
                                class="text-gray-400 text-xs font-bold uppercase tracking-widest mb-4 border-b pb-1"
                            >
                                Parcours Scolaire
                            </h3>
                            <div class="space-y-4">
                                <div>
                                    <label
                                        class="block text-xs text-gray-500 uppercase"
                                        >Niveau d'étude</label
                                    >
                                    <p class="text-gray-800 font-medium">
                                        {{ preRegistration.education_level }}
                                    </p>
                                </div>
                                <div v-if="preRegistration.last_school">
                                    <label
                                        class="block text-xs text-gray-500 uppercase"
                                        >Dernier Établissement</label
                                    >
                                    <p class="text-gray-800 font-medium">
                                        {{ preRegistration.last_school }}
                                    </p>
                                </div>
                            </div>

                            <div v-if="preRegistration.message" class="mt-8">
                                <h3
                                    class="text-gray-400 text-xs font-bold uppercase tracking-widest mb-4 border-b pb-1"
                                >
                                    Message / Note
                                </h3>
                                <p
                                    class="text-gray-600 italic text-sm bg-gray-50 p-3 rounded"
                                >
                                    "{{ preRegistration.message }}"
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Footer de la fiche -->
                    <div
                        class="bg-gray-50 px-6 py-4 border-t border-gray-200 text-center sm:text-right"
                    >
                        <p class="text-xs text-gray-400">
                            Fiche créée le
                            {{ formatDate(preRegistration.created_at) }}
                        </p>
                    </div>
                </div>

                <!-- MODE ÉDITION (Formulaire) -->
                <div
                    v-else
                    class="bg-white shadow-lg rounded-lg overflow-hidden"
                >
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-xl font-bold text-gray-800">
                            Modifier mes informations
                        </h2>
                        <p class="text-sm text-gray-500">
                            Mettez à jour les informations de votre dossier.
                            Certains champs comme l'email ne sont pas
                            modifiables.
                        </p>
                    </div>

                    <div class="p-6">
                        <form @submit.prevent="submit" class="space-y-6">
                            <!-- Même formulaire qu'avant -->

                            <!-- Formation -->
                            <div>
                                <InputLabel
                                    for="formation_id"
                                    value="Formation souhaitée"
                                />
                                <select
                                    id="formation_id"
                                    v-model="form.formation_id"
                                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    required
                                >
                                    <option value="">
                                        Sélectionnez une formation
                                    </option>
                                    <option
                                        v-for="formation in formations"
                                        :key="formation.id"
                                        :value="formation.id"
                                    >
                                        {{ getText(formation.titre) }}
                                    </option>
                                </select>
                                <InputError
                                    :message="form.errors.formation_id"
                                    class="mt-2"
                                />
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <InputLabel for="last_name" value="Nom" />
                                    <TextInput
                                        id="last_name"
                                        type="text"
                                        class="mt-1 block w-full"
                                        v-model="form.last_name"
                                        required
                                    />
                                    <InputError
                                        :message="form.errors.last_name"
                                        class="mt-2"
                                    />
                                </div>
                                <div>
                                    <InputLabel
                                        for="first_name"
                                        value="Prénom"
                                    />
                                    <TextInput
                                        id="first_name"
                                        type="text"
                                        class="mt-1 block w-full"
                                        v-model="form.first_name"
                                        required
                                    />
                                    <InputError
                                        :message="form.errors.first_name"
                                        class="mt-2"
                                    />
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <InputLabel
                                        for="email"
                                        value="Email (Non modifiable)"
                                    />
                                    <TextInput
                                        id="email"
                                        type="email"
                                        class="mt-1 block w-full bg-gray-100 text-gray-500 cursor-not-allowed"
                                        v-model="form.email"
                                        disabled
                                    />
                                </div>
                                <div>
                                    <InputLabel
                                        for="phone"
                                        value="Téléphone (WhatsApp)"
                                    />
                                    <TextInput
                                        id="phone"
                                        type="tel"
                                        class="mt-1 block w-full"
                                        v-model="form.phone"
                                        required
                                    />
                                    <InputError
                                        :message="form.errors.phone"
                                        class="mt-2"
                                    />
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <InputLabel
                                        for="birth_date"
                                        value="Date de naissance"
                                    />
                                    <TextInput
                                        id="birth_date"
                                        type="date"
                                        class="mt-1 block w-full"
                                        v-model="form.birth_date"
                                        required
                                    />
                                    <InputError
                                        :message="form.errors.birth_date"
                                        class="mt-2"
                                    />
                                </div>
                                <div>
                                    <InputLabel for="gender" value="Sexe" />
                                    <select
                                        id="gender"
                                        v-model="form.gender"
                                        class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                        required
                                    >
                                        <option value="M">Masculin</option>
                                        <option value="F">Féminin</option>
                                    </select>
                                    <InputError
                                        :message="form.errors.gender"
                                        class="mt-2"
                                    />
                                </div>
                            </div>

                            <div>
                                <InputLabel
                                    for="address"
                                    value="Adresse / Ville"
                                />
                                <TextInput
                                    id="address"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.address"
                                    required
                                />
                                <InputError
                                    :message="form.errors.address"
                                    class="mt-2"
                                />
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <InputLabel
                                        for="education_level"
                                        value="Niveau d'étude"
                                    />
                                    <select
                                        id="education_level"
                                        v-model="form.education_level"
                                        class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                        required
                                    >
                                        <option value="CEP">CEP / FSLC</option>
                                        <option value="BEPC">
                                            BEPC / GCE O Level
                                        </option>
                                        <option value="Probatoire">
                                            Probatoire
                                        </option>
                                        <option value="Baccalauréat">
                                            Baccalauréat / GCE A Level
                                        </option>
                                        <option value="Licence">
                                            Licence / Bachelor
                                        </option>
                                        <option value="Master">Master</option>
                                        <option value="Autre">Autre</option>
                                    </select>
                                    <InputError
                                        :message="form.errors.education_level"
                                        class="mt-2"
                                    />
                                </div>
                                <div>
                                    <InputLabel
                                        for="last_school"
                                        value="Dernier établissement"
                                    />
                                    <TextInput
                                        id="last_school"
                                        type="text"
                                        class="mt-1 block w-full"
                                        v-model="form.last_school"
                                    />
                                    <InputError
                                        :message="form.errors.last_school"
                                        class="mt-2"
                                    />
                                </div>
                            </div>

                            <div>
                                <InputLabel
                                    for="message"
                                    value="Message (Optionnel)"
                                />
                                <textarea
                                    id="message"
                                    v-model="form.message"
                                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    rows="3"
                                ></textarea>
                                <InputError
                                    :message="form.errors.message"
                                    class="mt-2"
                                />
                            </div>

                            <div
                                class="flex items-center justify-end border-t border-gray-100 pt-4"
                            >
                                <button
                                    type="button"
                                    @click="isEditing = false"
                                    class="mr-4 text-gray-600 hover:text-gray-900 font-medium"
                                >
                                    Annuler
                                </button>
                                <PrimaryButton
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                >
                                    Enregistrer les modifications
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </PublicLayout>
</template>

<script setup>
import { ref, computed } from "vue";
import { useForm, Link, router } from "@inertiajs/vue3";
import PublicLayout from "@/Layouts/PublicLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
    preRegistration: Object,
    formations: Array,
});

const isEditing = ref(false);
const canEdit = computed(() => props.preRegistration.status === "pending");

const logout = () => {
    router.post(route("pre-registration.logout"));
};

const form = useForm({
    formation_id: props.preRegistration.formation_id,
    last_name: props.preRegistration.last_name,
    first_name: props.preRegistration.first_name,
    email: props.preRegistration.email,
    phone: props.preRegistration.phone,
    address: props.preRegistration.address,
    birth_date: props.preRegistration.birth_date,
    gender: props.preRegistration.gender,
    education_level: props.preRegistration.education_level,
    last_school: props.preRegistration.last_school,
    message: props.preRegistration.message,
});

const submit = () => {
    form.put(route("pre-registration.update", props.preRegistration.id), {
        onSuccess: () => {
            isEditing.value = false;
        },
    });
};

const getStatusLabel = (status) => {
    switch (status) {
        case "pending":
            return "En attente";
        case "validated":
            return "Validée";
        case "cancelled":
            return "Annulée";
        default:
            return status;
    }
};

const getStatusBadgeClass = (status) => {
    switch (status) {
        case "pending":
            return "bg-yellow-100 text-yellow-800";
        case "validated":
            return "bg-green-100 text-green-800";
        case "cancelled":
            return "bg-red-100 text-red-800";
        default:
            return "bg-gray-100 text-gray-800";
    }
};

const formatDate = (dateString) => {
    if (!dateString) return "";
    return new Date(dateString).toLocaleDateString("fr-FR", {
        day: "numeric",
        month: "long",
        year: "numeric",
    });
};

const getText = (jsonField) => {
    if (!jsonField) return "";
    if (typeof jsonField === "string") {
        try {
            const parsed = JSON.parse(jsonField);
            return parsed.fr || parsed.en || jsonField;
        } catch (e) {
            return jsonField;
        }
    }
    return jsonField.fr || jsonField.en || "";
};

const getFormationTitle = (formation) => {
    if (!formation) return "Formation inconnue";
    return getText(formation.titre);
};
</script>

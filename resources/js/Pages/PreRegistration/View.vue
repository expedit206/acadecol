<template>
    <PublicLayout>
        <div class="py-12">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <!-- Status Banner -->
                <div
                    class="mb-6 p-4 rounded-lg shadow-sm flex items-center justify-between"
                    :class="{
                        'bg-yellow-100 text-yellow-800 border-l-4 border-yellow-500':
                            preRegistration.status === 'pending',
                        'bg-green-100 text-green-800 border-l-4 border-green-500':
                            preRegistration.status === 'validated',
                        'bg-red-100 text-red-800 border-l-4 border-red-500':
                            preRegistration.status === 'cancelled',
                    }"
                >
                    <div class="flex items-center">
                        <i class="fas fa-info-circle text-2xl mr-4"></i>
                        <div>
                            <h3 class="text-lg font-bold">
                                Statut :
                                {{ getStatusLabel(preRegistration.status) }}
                            </h3>
                            <p v-if="preRegistration.status === 'pending'">
                                Votre demande est en cours de traitement. Vous
                                pouvez encore la modifier.
                            </p>
                            <p
                                v-else-if="
                                    preRegistration.status === 'validated'
                                "
                            >
                                Votre pré-inscription a été validée ! Vous ne
                                pouvez plus la modifier.
                            </p>
                            <p v-else>
                                Votre demande a été annulée ou rejetée.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mb-6 flex justify-between items-center">
                            <h1 class="text-2xl font-bold text-gray-900">
                                Ma Fiche de Pré-inscription
                            </h1>
                            <span class="text-sm text-gray-500"
                                >N°
                                {{ preRegistration.registration_number }}</span
                            >
                        </div>

                        <form @submit.prevent="submit" class="space-y-6">
                            <!-- Formation -->
                            <div>
                                <InputLabel
                                    for="formation_id"
                                    value="Formation souhaitée"
                                />
                                <select
                                    id="formation_id"
                                    v-model="form.formation_id"
                                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm disabled:opacity-50 disabled:bg-gray-100"
                                    :disabled="!isEditable"
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
                                        {{ formation.titre.fr }}
                                    </option>
                                </select>
                                <InputError
                                    :message="form.errors.formation_id"
                                    class="mt-2"
                                />
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Nom -->
                                <div>
                                    <InputLabel for="last_name" value="Nom" />
                                    <TextInput
                                        id="last_name"
                                        type="text"
                                        class="mt-1 block w-full disabled:opacity-50 disabled:bg-gray-100"
                                        v-model="form.last_name"
                                        :disabled="!isEditable"
                                        required
                                    />
                                    <InputError
                                        :message="form.errors.last_name"
                                        class="mt-2"
                                    />
                                </div>

                                <!-- Prénom -->
                                <div>
                                    <InputLabel
                                        for="first_name"
                                        value="Prénom"
                                    />
                                    <TextInput
                                        id="first_name"
                                        type="text"
                                        class="mt-1 block w-full disabled:opacity-50 disabled:bg-gray-100"
                                        v-model="form.first_name"
                                        :disabled="!isEditable"
                                        required
                                    />
                                    <InputError
                                        :message="form.errors.first_name"
                                        class="mt-2"
                                    />
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Email (Readonly) -->
                                <div>
                                    <InputLabel for="email" value="Email" />
                                    <TextInput
                                        id="email"
                                        type="email"
                                        class="mt-1 block w-full bg-gray-100 text-gray-500 cursor-not-allowed"
                                        v-model="form.email"
                                        disabled
                                    />
                                    <p class="text-xs text-gray-500 mt-1">
                                        L'email ne peut pas être modifié pour
                                        des raisons de sécurité.
                                    </p>
                                </div>

                                <!-- Téléphone -->
                                <div>
                                    <InputLabel
                                        for="phone"
                                        value="Téléphone (WhatsApp)"
                                    />
                                    <TextInput
                                        id="phone"
                                        type="tel"
                                        class="mt-1 block w-full disabled:opacity-50 disabled:bg-gray-100"
                                        v-model="form.phone"
                                        :disabled="!isEditable"
                                        required
                                    />
                                    <InputError
                                        :message="form.errors.phone"
                                        class="mt-2"
                                    />
                                </div>
                            </div>

                            <!-- Date de naissance & Genre -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <InputLabel
                                        for="birth_date"
                                        value="Date de naissance"
                                    />
                                    <TextInput
                                        id="birth_date"
                                        type="date"
                                        class="mt-1 block w-full disabled:opacity-50 disabled:bg-gray-100"
                                        v-model="form.birth_date"
                                        :disabled="!isEditable"
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
                                        class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm disabled:opacity-50 disabled:bg-gray-100"
                                        :disabled="!isEditable"
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

                            <!-- Adresse -->
                            <div>
                                <InputLabel
                                    for="address"
                                    value="Adresse / Ville de résidence"
                                />
                                <TextInput
                                    id="address"
                                    type="text"
                                    class="mt-1 block w-full disabled:opacity-50 disabled:bg-gray-100"
                                    v-model="form.address"
                                    :disabled="!isEditable"
                                    required
                                />
                                <InputError
                                    :message="form.errors.address"
                                    class="mt-2"
                                />
                            </div>

                            <!-- Niveau d'étude -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <InputLabel
                                        for="education_level"
                                        value="Niveau d'étude actuel"
                                    />
                                    <select
                                        id="education_level"
                                        v-model="form.education_level"
                                        class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm disabled:opacity-50 disabled:bg-gray-100"
                                        :disabled="!isEditable"
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
                                        value="Dernier établissement fréquenté"
                                    />
                                    <TextInput
                                        id="last_school"
                                        type="text"
                                        class="mt-1 block w-full disabled:opacity-50 disabled:bg-gray-100"
                                        v-model="form.last_school"
                                        :disabled="!isEditable"
                                    />
                                    <InputError
                                        :message="form.errors.last_school"
                                        class="mt-2"
                                    />
                                </div>
                            </div>

                            <!-- Message -->
                            <div>
                                <InputLabel
                                    for="message"
                                    value="Message (Optionnel)"
                                />
                                <textarea
                                    id="message"
                                    v-model="form.message"
                                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm disabled:opacity-50 disabled:bg-gray-100"
                                    rows="3"
                                    :disabled="!isEditable"
                                ></textarea>
                                <InputError
                                    :message="form.errors.message"
                                    class="mt-2"
                                />
                            </div>

                            <div
                                v-if="isEditable"
                                class="flex items-center justify-end mt-4"
                            >
                                <PrimaryButton
                                    class="ml-4"
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                >
                                    <i class="fas fa-save mr-2"></i> Mettre à
                                    jour mes informations
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
import { computed } from "vue";
import { useForm, Link } from "@inertiajs/vue3";
import PublicLayout from "@/Layouts/PublicLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
    preRegistration: Object,
    formations: Array,
});

const isEditable = computed(() => props.preRegistration.status === "pending");

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
    if (isEditable.value) {
        form.put(route("pre-registration.update", props.preRegistration.id));
    }
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
</script>

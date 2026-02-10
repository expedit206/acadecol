<template>
    <PublicLayout>
        <div class="py-12">
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                <!-- Flash Warning -->
                <div
                    v-if="$page.props.flash.warning"
                    class="mb-6 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded shadow-sm"
                >
                    <p class="font-bold">Attention</p>
                    <p>{{ $page.props.flash.warning }}</p>
                    <Link
                        :href="route('pre-registration.status')"
                        class="underline font-semibold mt-2 inline-block"
                    >
                        Cliquez ici pour consulter votre fiche de
                        pré-inscription.
                    </Link>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mb-6">
                            <h1 class="text-2xl font-bold text-gray-900">
                                Formulaire de Pré-inscription
                            </h1>
                            <p class="text-gray-600 mt-2">
                                Remplissez ce formulaire pour réserver votre
                                place. Aucun frais n'est requis à cette étape.
                            </p>
                        </div>

                        <form @submit.prevent="submit" class="space-y-6">
                            <!-- Formation -->
                            <div>
                                <InputLabel
                                    for="formation_id"
                                    value="Formation souhaitée *"
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
                                    <InputLabel for="last_name" value="Nom *" />
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

                                <!-- Prénom -->
                                <div>
                                    <InputLabel
                                        for="first_name"
                                        value="Prénom *"
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
                                <!-- Email -->
                                <div>
                                    <InputLabel for="email" value="Email *" />
                                    <TextInput
                                        id="email"
                                        type="email"
                                        class="mt-1 block w-full"
                                        v-model="form.email"
                                        required
                                    />
                                    <InputError
                                        :message="form.errors.email"
                                        class="mt-2"
                                    />
                                </div>

                                <!-- Téléphone -->
                                <div>
                                    <InputLabel
                                        for="phone"
                                        value="Téléphone (WhatsApp) *"
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

                            <!-- Date de naissance & Genre -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <InputLabel
                                        for="birth_date"
                                        value="Date de naissance *"
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
                                    <InputLabel for="gender" value="Sexe *" />
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

                            <!-- Adresse -->
                            <div>
                                <InputLabel
                                    for="address"
                                    value="Adresse / Ville de résidence *"
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

                            <!-- Niveau d'étude -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <InputLabel
                                        for="education_level"
                                        value="Niveau d'étude actuel *"
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
                                        value="Dernier établissement fréquenté"
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

                            <!-- Message -->
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

                            <div class="flex items-center justify-end mt-4">
                                <PrimaryButton
                                    class="ml-4"
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                >
                                    Envoyer ma pré-inscription
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
import PublicLayout from "@/Layouts/PublicLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { useForm, Link } from "@inertiajs/vue3";

const props = defineProps({
    formations: Array,
});

const form = useForm({
    formation_id: "",
    last_name: "",
    first_name: "",
    email: "",
    phone: "",
    address: "",
    birth_date: "",
    gender: "M",
    education_level: "",
    last_school: "",
    message: "",
});

const submit = () => {
    form.post(route("pre-registration.store"));
};
</script>

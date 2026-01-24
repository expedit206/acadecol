<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const props = defineProps({
    formations: Array,
});

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
    formation_id: "",
    phone: "",
    address: "",
    birth_date: "",
    gender: "",
    education_level: "",
    last_school: "",
    message: "",
});

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Préinscription" />

        <div class="mb-8 text-center text-blue-900">
            <h1 class="text-2xl font-bold">Formulaire de Préinscription</h1>
            <p class="text-gray-600 mt-2">
                Veuillez remplir les informations ci-dessous pour votre
                préinscription à ACADECOL.
            </p>
        </div>

        <form
            @submit.prevent="submit"
            class="space-y-6 bg-white p-6 rounded-xl shadow-sm border border-gray-100"
        >
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Informations Personnelles -->
                <div class="space-y-4">
                    <h2
                        class="text-lg font-semibold text-gray-800 border-b pb-2"
                    >
                        Informations Personnelles
                    </h2>

                    <div>
                        <InputLabel for="name" value="Nom Complet" />
                        <TextInput
                            id="name"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.name"
                            required
                            autofocus
                        />
                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>

                    <div>
                        <InputLabel for="email" value="Email" />
                        <TextInput
                            id="email"
                            type="email"
                            class="mt-1 block w-full"
                            v-model="form.email"
                            required
                        />
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <InputLabel
                                for="birth_date"
                                value="Date de Naissance"
                            />
                            <TextInput
                                id="birth_date"
                                type="date"
                                class="mt-1 block w-full"
                                v-model="form.birth_date"
                                required
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.birth_date"
                            />
                        </div>
                        <div>
                            <InputLabel for="gender" value="Sexe" />
                            <select
                                id="gender"
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                v-model="form.gender"
                                required
                            >
                                <option value="">Choisir...</option>
                                <option value="M">Masculin</option>
                                <option value="F">Féminin</option>
                            </select>
                            <InputError
                                class="mt-2"
                                :message="form.errors.gender"
                            />
                        </div>
                    </div>

                    <div>
                        <InputLabel for="phone" value="Numéro de Téléphone" />
                        <TextInput
                            id="phone"
                            type="tel"
                            class="mt-1 block w-full"
                            v-model="form.phone"
                            required
                        />
                        <InputError class="mt-2" :message="form.errors.phone" />
                    </div>

                    <div>
                        <InputLabel for="address" value="Adresse" />
                        <TextInput
                            id="address"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.address"
                            required
                        />
                        <InputError
                            class="mt-2"
                            :message="form.errors.address"
                        />
                    </div>
                </div>

                <!-- Informations Académiques -->
                <div class="space-y-4">
                    <h2
                        class="text-lg font-semibold text-gray-800 border-b pb-2"
                    >
                        Choix de Formation
                    </h2>

                    <div>
                        <InputLabel
                            for="formation_id"
                            value="Formation Souhaitée"
                        />
                        <select
                            id="formation_id"
                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            v-model="form.formation_id"
                            required
                        >
                            <option value="">Sélectionnez une formation</option>
                            <option
                                v-for="formation in formations"
                                :key="formation.id"
                                :value="formation.id"
                            >
                                {{ formation.titre }}
                            </option>
                        </select>
                        <InputError
                            class="mt-2"
                            :message="form.errors.formation_id"
                        />
                    </div>

                    <div>
                        <InputLabel
                            for="education_level"
                            value="Niveau d'Étude Actuel"
                        />
                        <TextInput
                            id="education_level"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.education_level"
                            required
                            placeholder="Ex: Baccalauréat, Licence..."
                        />
                        <InputError
                            class="mt-2"
                            :message="form.errors.education_level"
                        />
                    </div>

                    <div>
                        <InputLabel
                            for="last_school"
                            value="Dernier Établissement Fréquenté"
                        />
                        <TextInput
                            id="last_school"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.last_school"
                        />
                        <InputError
                            class="mt-2"
                            :message="form.errors.last_school"
                        />
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <InputLabel for="password" value="Mot de passe" />
                            <TextInput
                                id="password"
                                type="password"
                                class="mt-1 block w-full"
                                v-model="form.password"
                                required
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.password"
                            />
                        </div>
                        <div>
                            <InputLabel
                                for="password_confirmation"
                                value="Confirmer"
                            />
                            <TextInput
                                id="password_confirmation"
                                type="password"
                                class="mt-1 block w-full"
                                v-model="form.password_confirmation"
                                required
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.password_confirmation"
                            />
                        </div>
                    </div>

                    <div>
                        <InputLabel
                            for="message"
                            value="Message / Remarques (Optionnel)"
                        />
                        <textarea
                            id="message"
                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            v-model="form.message"
                            rows="2"
                        ></textarea>
                        <InputError
                            class="mt-2"
                            :message="form.errors.message"
                        />
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between pt-4 border-t">
                <Link
                    :href="route('login')"
                    class="text-sm text-gray-600 underline hover:text-gray-900"
                >
                    Déjà inscrit ? Se connecter
                </Link>

                <PrimaryButton
                    class="ml-4 bg-blue-700 hover:bg-blue-800"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Soumettre ma Préinscription
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>

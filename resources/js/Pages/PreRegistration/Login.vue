<template>
    <PublicLayout>
        <div
            class="py-12 flex flex-col items-center justify-center min-h-[50vh]"
        >
            <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
                <div class="text-center mb-6">
                    <i
                        class="fas fa-user-circle text-4xl text-blue-600 mb-4"
                    ></i>
                    <h1 class="text-2xl font-bold text-gray-900">
                        Consulter mon dossier
                    </h1>
                    <p class="text-sm text-gray-500 mt-2">
                        Saisissez votre numéro de téléphone pour accéder à votre
                        fiche.
                    </p>
                </div>

                <form @submit.prevent="submit" class="space-y-6">
                    <div>
                        <InputLabel for="phone" value="Téléphone (WhatsApp)" />
                        <TextInput
                            id="phone"
                            v-model="form.phone"
                            type="tel"
                            class="mt-1 block w-full"
                            required
                            autofocus
                        />
                        <InputError class="mt-2" :message="form.errors.phone" />
                    </div>

                    <div class="flex items-center justify-end">
                        <PrimaryButton
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                            class="w-full text-center justify-center py-3"
                        >
                            <i class="fas fa-sign-in-alt mr-2"></i> Accéder à
                            mon espace
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </PublicLayout>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";
import PublicLayout from "@/Layouts/PublicLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const form = useForm({
    phone: "",
});

const submit = () => {
    form.post(route("pre-registration.check"));
};
</script>

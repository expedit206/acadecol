<template>
    <Modal :show="show" @close="close">
        <div class="p-6">
            <div class="text-center mb-6">
                <i class="fas fa-user-shield text-4xl text-gray-700"></i>
                <h2 class="text-2xl font-bold text-gray-900 mt-2">
                    Accès Administrateur
                </h2>
                <p class="text-sm text-gray-500">Veuillez vous authentifier</p>
            </div>

            <form @submit.prevent="submit">
                <div>
                    <InputLabel for="email" value="Email" />
                    <TextInput
                        id="email"
                        v-model="form.email"
                        type="email"
                        class="mt-1 block w-full"
                        required
                        autofocus
                        autocomplete="username"
                    />
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="mt-4">
                    <InputLabel for="password" value="Mot de passe" />
                    <TextInput
                        id="password"
                        v-model="form.password"
                        type="password"
                        class="mt-1 block w-full"
                        required
                        autocomplete="current-password"
                    />
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="flex items-center justify-between mt-4">
                    <label class="flex items-center">
                        <Checkbox
                            name="remember"
                            v-model:checked="form.remember"
                        />
                        <span class="ms-2 text-sm text-gray-600"
                            >Se souvenir de moi</span
                        >
                    </label>
                </div>

                <div class="mt-6 flex justify-end gap-3">
                    <SecondaryButton @click="close"> Annuler </SecondaryButton>
                    <PrimaryButton
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Connexion
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </Modal>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";
import Modal from "@/Components/Modal.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import Checkbox from "@/Components/Checkbox.vue";

const props = defineProps({
    show: Boolean,
});

const emit = defineEmits(["close"]);

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
        onSuccess: () => close(),
    });
};

const close = () => {
    form.reset();
    emit("close");
};
</script>

<template>
    <PublicLayout>
        <div
            class="py-12 flex flex-col items-center justify-center min-h-[50vh]"
        >
            <div
                class="bg-white p-8 rounded-lg shadow-lg text-center max-w-lg w-full"
            >
                <i class="fas fa-check-circle text-green-500 text-6xl mb-4"></i>
                <h1 class="text-3xl font-bold mb-4 text-gray-900">
                    Pré-inscription Réussie !
                </h1>
                <p class="text-gray-600 mb-8 border-b pb-4">
                    Votre demande a bien été enregistrée.
                    <span v-if="$page.props.flash?.registration_number">
                        Numéro :
                        <strong>{{
                            $page.props.flash?.registration_number
                        }}</strong>
                    </span>
                </p>
                <div class="flex flex-col gap-4">
                    <Link
                        :href="route('pre-registration.status')"
                        class="text-blue-600 hover:text-blue-800 underline font-medium"
                    >
                        Voir ma fiche / Modifier mes informations
                    </Link>
                    <Link
                        :href="route('home')"
                        class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition font-bold shadow-md"
                    >
                        Retour à l'accueil
                    </Link>
                </div>
            </div>
        </div>
    </PublicLayout>
</template>

<script setup>
import PublicLayout from "@/Layouts/PublicLayout.vue";
import { Link } from "@inertiajs/vue3";
</script>

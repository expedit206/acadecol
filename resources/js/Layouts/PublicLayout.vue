<template>
    <div class="min-h-screen bg-gray-50 flex flex-col">
        <PublicHeader>
            <template #auth-links>
                <Link
                    v-if="auth.user"
                    href="/profile"
                    class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition"
                >
                    Mon Compte
                </Link>
                <template v-else>
                    <Link
                        href="/login"
                        class="px-4 py-2 text-gray-600 hover:text-gray-900 transition"
                    >
                        Connexion
                    </Link>
                    <Link
                        href="/register"
                        class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition"
                    >
                        Préinscription
                    </Link>
                </template>
            </template>
        </PublicHeader>

        <!-- Main Content -->
        <main class="flex-1">
            <slot />
        </main>

        <!-- Footer -->
        <PublicFooter />
    </div>
</template>

<script setup>
import { usePage } from "@inertiajs/vue3";
import { computed } from "vue";
import PublicHeader from "@/Components/PublicHeader.vue";
import PublicFooter from "@/Components/PublicFooter.vue";
import { Link } from "@inertiajs/vue3";

const page = usePage();
const auth = computed(() => page.props.auth);
</script>

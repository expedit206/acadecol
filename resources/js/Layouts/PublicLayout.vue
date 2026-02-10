<template>
    <div class="min-h-screen bg-gray-50 flex flex-col text-sm">
        <TopBanner
            @leftLogoDblClick="onLeftLogoDblClick"
            @rightLogoDblClick="onRightLogoDblClick"
        />
        <PublicHeader>
            <template #auth-links>
                <Link
                    v-if="auth.user"
                    :href="route('admin.dashboard')"
                    class="px-4 py-2 text-white bg-green-600 rounded-lg hover:bg-green-700 transition font-bold"
                >
                    <i class="fas fa-cog mr-2"></i>Administration
                </Link>
                <template v-else>
                    <Link
                        :href="route('pre-registration.login')"
                        class="px-3 md:px-4 py-2 border border-blue-600 text-blue-600 rounded-lg hover:bg-blue-50 transition shadow-sm font-semibold mr-2 hidden sm:inline-block"
                    >
                        Mon Dossier
                    </Link>
                    <Link
                        :href="route('pre-registration.create')"
                        class="px-3 md:px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition shadow-md font-semibold"
                    >
                        Se Préinscrire
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

        <!-- Admin Login Modal -->
        <AdminLoginModal
            :show="showAdminLogin"
            @close="showAdminLogin = false"
        />
    </div>
</template>

<script setup>
import { usePage } from "@inertiajs/vue3";
import { computed, ref } from "vue";
import PublicHeader from "@/Components/PublicHeader.vue";
import TopBanner from "@/Components/TopBanner.vue";
import PublicFooter from "@/Components/PublicFooter.vue";
import AdminLoginModal from "@/Components/AdminLoginModal.vue";
import { Link } from "@inertiajs/vue3";

const page = usePage();
const auth = computed(() => page.props.auth);

// Admin Login Logic
const showAdminLogin = ref(false);
const leftClicked = ref(false);
const rightClicked = ref(false);
let resetTimer = null;

const onLeftLogoDblClick = () => {
    leftClicked.value = true;
    checkAdminAccess();
};

const onRightLogoDblClick = () => {
    rightClicked.value = true;
    checkAdminAccess();
};

const checkAdminAccess = () => {
    // Start timer on first interaction
    if (!resetTimer) {
        resetTimer = setTimeout(() => {
            leftClicked.value = false;
            rightClicked.value = false;
            resetTimer = null;
        }, 5000); // 5 seconds window
    }

    if (leftClicked.value && rightClicked.value) {
        showAdminLogin.value = true;
        // Reset state
        leftClicked.value = false;
        rightClicked.value = false;
        if (resetTimer) {
            clearTimeout(resetTimer);
            resetTimer = null;
        }
    }
};
</script>

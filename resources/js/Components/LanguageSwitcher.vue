<template>
    <div class="relative inline-block text-left">
        <button
            @click="isOpen = !isOpen"
            type="button"
            class="inline-flex items-center gap-1.5 px-3 py-1.5 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
        >
            <span class="text-lg">{{ locale === "fr" ? "🇫🇷" : "🇬🇧" }}</span>
            <span class="uppercase">{{ locale }}</span>
            <i class="fas fa-chevron-down text-xs ml-1"></i>
        </button>

        <div
            v-if="isOpen"
            class="absolute right-0 z-50 mt-2 w-32 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
        >
            <div class="py-1">
                <a
                    href="/locale/fr"
                    class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                    @click.prevent="switchLocale('fr')"
                >
                    <span class="text-xl">🇫🇷</span> Français
                </a>
                <a
                    href="/locale/en"
                    class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                    @click.prevent="switchLocale('en')"
                >
                    <span class="text-xl">🇬🇧</span> English
                </a>
            </div>
        </div>

        <!-- Backdrop to close -->
        <div
            v-if="isOpen"
            @click="isOpen = false"
            class="fixed inset-0 z-40"
        ></div>
    </div>
</template>

<script setup>
import { ref } from "vue";
import { useLocale } from "@/Composables/useLocale";
import { router } from "@inertiajs/vue3";

const { locale } = useLocale();
const isOpen = ref(false);

const switchLocale = (lang) => {
    isOpen.value = false;
    router.visit(`/locale/${lang}`, {
        preserveState: true,
        preserveScroll: true,
    });
};
</script>

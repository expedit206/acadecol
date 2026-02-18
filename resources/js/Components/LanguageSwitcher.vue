<template>
    <div class="fixed bottom-6 left-6 z-[60]">
        <div class="relative">
            <button
                @click="isOpen = !isOpen"
                type="button"
                class="flex items-center gap-2 px-4 py-2.5 bg-white/80 backdrop-blur-md border border-gray-200/50 rounded-full shadow-lg hover:shadow-xl hover:bg-white transition-all duration-300 group"
                :class="{ 'ring-2 ring-blue-500 border-transparent': isOpen }"
            >
            <i class="fas fa-globe text-gr00 text-sm text-blue-500"></i>

                <span class="text-sm leading-none">{{
                    locale === "fr" ? "🇫🇷" : "EN"
                }}</span>
              
                <i
                    class="fas fa-chevron-up text-[10px] text-gray-400 group-hover:text-blue-500 transition-colors"
                    :class="{ 'rotate-180': isOpen }"
                ></i>
            </button>

            <div
                v-if="isOpen"
                class="absolute bottom-full left-0 mb-3 w-40 origin-bottom-left rounded-2xl bg-white/95 backdrop-blur-md shadow-2xl ring-1 ring-black/5 overflow-hidden animate-in fade-in slide-in-from-bottom-2 duration-200"
            >
                <div class="p-1.5 space-y-1">
                    <a
                        href="/locale/fr"
                        class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl transition-colors"
                        :class="
                            locale === 'fr'
                                ? 'bg-blue-50 text-blue-700'
                                : 'text-gray-700 hover:bg-gray-100'
                        "
                        @click.prevent="switchLocale('fr')"
                    >
                        <span class="text-xl leading-none">🇫🇷</span>
                        <span>Français</span>
                    </a>
                    <a
                        href="/locale/en"
                        class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl transition-colors"
                        :class="
                            locale === 'en'
                                ? 'bg-blue-50 text-blue-700'
                                : 'text-gray-700 hover:bg-gray-100'
                        "
                        @click.prevent="switchLocale('en')"
                    >
                        <span class="text-xl leading-none">EN</span>
                        <span>English</span>
                    </a>
                </div>
            </div>

            <!-- Backdrop to close -->
            <div
                v-if="isOpen"
                @click="isOpen = false"
                class="fixed inset-0 z-[-1]"
            ></div>
        </div>
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
    // Force a full page reload to ensure session and locale are correctly applied
    window.location.href = `/locale/${lang}`;
};
</script>

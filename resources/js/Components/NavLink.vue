<script setup>
import { computed } from "vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    href: {
        type: String,
        required: false,
        default: null,
    },
    active: {
        type: Boolean,
    },
    prefetch: {
        type: [Boolean, Array],
        default: false,
    },
});

const classes = computed(() =>
    props.active
        ? "inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-xs md:text-lg font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
        : "inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-xs md:text-md font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out",
);
</script>

<template>
    <Link v-if="href" :href="href" :class="classes" :prefetch="prefetch">
        <slot />
    </Link>
    <span v-else :class="classes">
        <slot />
    </span>
</template>

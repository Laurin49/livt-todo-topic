<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    name: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <a href="#"
    class="block max-w-sm p-2 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <slot />

        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ name }}</h5>
        <p class="font-normal text-gray-700 dark:text-gray-400">Beschreibung ... </p>
    </a>
</template>
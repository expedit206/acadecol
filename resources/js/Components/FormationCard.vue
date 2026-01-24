<template>
  <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden h-full flex flex-col">
    <!-- Image -->
    <div class="relative h-48 bg-gradient-to-br from-blue-400 to-blue-600 overflow-hidden">
      <img 
        v-if="image" 
        :src="image" 
        :alt="title"
        class="w-full h-full object-cover hover:scale-110 transition-transform duration-300"
      />
      <div v-else class="w-full h-full flex items-center justify-center text-white text-4xl">
        📚
      </div>
      <!-- Badge -->
      <div v-if="badge" class="absolute top-3 right-3">
        <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
          {{ badge }}
        </span>
      </div>
    </div>

    <!-- Content -->
    <div class="p-5 flex-1 flex flex-col">
      <!-- Category -->
      <p v-if="category" class="text-xs font-semibold text-blue-600 uppercase tracking-wider mb-2">
        {{ category }}
      </p>

      <!-- Title -->
      <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 hover:text-blue-600 transition">
        {{ title }}
      </h3>

      <!-- Description -->
      <p class="text-sm text-gray-600 flex-1 line-clamp-2 mb-4">
        {{ description }}
      </p>

      <!-- Meta Info -->
      <div class="space-y-2 mb-4 text-sm text-gray-700">
        <div v-if="duration" class="flex items-center gap-2">
          <span class="text-blue-600">⏱️</span>
          <span>{{ duration }}</span>
        </div>
        <div v-if="price" class="flex items-center gap-2">
          <span class="text-green-600">💰</span>
          <span class="font-semibold">{{ formatPrice(price) }}</span>
        </div>
        <div v-if="students" class="flex items-center gap-2">
          <span>👥</span>
          <span>{{ students }} étudiants</span>
        </div>
      </div>

      <!-- Button -->
      <Link
        :href="link"
        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-200 text-center"
      >
        Voir plus
      </Link>
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
  title: {
    type: String,
    required: true
  },
  description: {
    type: String,
    required: true
  },
  category: {
    type: String,
    default: null
  },
  price: {
    type: Number,
    default: null
  },
  duration: {
    type: String,
    default: null
  },
  image: {
    type: String,
    default: null
  },
  badge: {
    type: String,
    default: null
  },
  students: {
    type: Number,
    default: null
  },
  link: {
    type: String,
    required: true
  }
});

const formatPrice = (price) => {
  return new Intl.NumberFormat('fr-CM', {
    style: 'currency',
    currency: 'XAF',
    minimumFractionDigits: 0
  }).format(price);
};
</script>

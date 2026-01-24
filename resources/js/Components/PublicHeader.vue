<template>
  <header class="sticky top-0 z-50 bg-white shadow-sm border-b border-gray-200">
    <nav class="container mx-auto px-4 py-4 flex items-center justify-between">
      <!-- Logo -->
      <Link href="/" class="flex items-center gap-2 group">
     
        <ApplicationLogo class="h-20 w-20 fill-current text-gray-500" />
        <span class="text-xl font-bold text-gray-900 hidden md:inline">ACADECOL</span>
      </Link>
      <!-- Desktop Menu -->
      <div class="hidden md:flex items-center gap-8">
        <NavLink href="/" :active="isActive('/')">
          Accueil
        </NavLink>
        <NavLink href="/formations" :active="isActive('/formations')">
          Formations
        </NavLink>
        <NavLink href="/certifications" :active="isActive('/certifications')">
          Certifications
        </NavLink>
        <NavLink href="/a-propos" :active="isActive('/about')">
          À Propos
        </NavLink>
        <NavLink href="/contact" :active="isActive('/contact')">
          Contact
        </NavLink>
      </div>

      <!-- Auth Links -->
      <div class="flex items-center gap-4">
        <slot name="auth-links" />
        <!-- Mobile Menu Button -->
        <button
          @click="mobileMenuOpen = !mobileMenuOpen"
          class="md:hidden p-2 text-gray-600 hover:text-gray-900"
        >
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>
    </nav>

    <!-- Mobile Menu -->
    <div v-if="mobileMenuOpen" class="md:hidden bg-white border-t border-gray-200">
      <div class="container mx-auto px-4 py-4 space-y-2">
        <Link href="/" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 rounded">Accueil</Link>
        <Link href="/formations" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 rounded">Formations</Link>
        <Link href="/certifications" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 rounded">Certifications</Link>
        <Link href="/a-propos" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 rounded">À Propos</Link>
        <Link href="/contact" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 rounded">Contact</Link>
      </div>
    </div>
  </header>
</template>

<script setup>
import { ref, computed } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';
import NavLink from '@/Components/NavLink.vue';
import ApplicationLogo from './ApplicationLogo.vue';

const mobileMenuOpen = ref(false);
const page = usePage();

const isActive = (path) => {
  return page.url === path || page.url.startsWith(path + '/');
};
</script>

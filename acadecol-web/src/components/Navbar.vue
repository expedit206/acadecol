<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import { Menu, X } from 'lucide-vue-next';

const isScrolled = ref(false);
const isMenuOpen = ref(false);

const handleScroll = () => {
  isScrolled.value = window.scrollY > 50;
};

onMounted(() => {
  window.addEventListener('scroll', handleScroll);
});

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll);
});

const navLinks = [
  { name: 'Accueil', href: '#home' },
  { name: 'À Propos', href: '#about' },
  { name: 'Formations', href: '#formations' },
  { name: 'Contact', href: '#contact' },
];

const closeMenu = () => {
  isMenuOpen.value = false;
};
</script>

<template>
  <nav :class="['navbar', { 'navbar-scrolled': isScrolled }]">
    <div class="container nav-content">
      <a href="#home" class="logo-container">
        <img src="/logo.png" alt="ACADECOL Logo" class="logo" />
        <div class="logo-text">
          <span class="logo-title">ACADECOL</span>
          <span class="logo-subtitle">Académie Africaine Bilingue</span>
        </div>
      </a>

      <!-- Desktop Nav -->
      <ul class="nav-links">
        <li v-for="link in navLinks" :key="link.name">
          <a :href="link.href">{{ link.name }}</a>
        </li>
      </ul>

      <div class="nav-actions">
        <a href="#contact" class="btn btn-primary">S'inscrire</a>
      </div>

      <!-- Mobile Toggle -->
      <button class="mobile-toggle" @click="isMenuOpen = !isMenuOpen" aria-label="Menu">
        <Menu v-if="!isMenuOpen" :size="28" />
        <X v-else :size="28" />
      </button>
    </div>

    <!-- Mobile Nav Overlay -->
    <div v-if="isMenuOpen" class="mobile-overlay" @click="closeMenu"></div>

    <!-- Mobile Nav -->
    <div :class="['mobile-menu', { 'mobile-menu-open': isMenuOpen }]">
      <ul class="mobile-nav-links">
        <li v-for="link in navLinks" :key="link.name">
          <a :href="link.href" @click="closeMenu">{{ link.name }}</a>
        </li>
        <li class="mobile-cta">
          <a href="#contact" class="btn btn-primary btn-block" @click="closeMenu">S'inscrire maintenant</a>
        </li>
      </ul>
    </div>
  </nav>
</template>

<style scoped>
.navbar {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 1000;
  transition: var(--transition);
  padding: 1rem 0;
  background: rgba(255, 255, 255, 0.95);
  backdrop-filter: blur(10px);
}

.navbar-scrolled {
  background: rgba(255, 255, 255, 0.98);
  padding: 0.6rem 0;
  box-shadow: var(--shadow);
}

.nav-content {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.logo-container {
  display: flex;
  align-items: center;
  gap: 0.75rem;
}

.logo {
  height: 40px;
  width: auto;
}

.logo-text {
  display: flex;
  flex-direction: column;
}

.logo-title {
  font-family: var(--font-heading);
  font-weight: 800;
  font-size: 1.25rem;
  color: var(--primary);
  line-height: 1;
}

.logo-subtitle {
  font-size: 0.6rem;
  font-weight: 500;
  text-transform: uppercase;
  letter-spacing: 0.03em;
  color: var(--gray-600);
  display: none;
}

.nav-links {
  display: none;
  gap: 2rem;
}

.nav-links a {
  font-weight: 600;
  font-size: 0.95rem;
  color: var(--gray-700);
}

.nav-links a:hover {
  color: var(--primary);
}

.nav-actions {
  display: none;
}

.mobile-toggle {
  background: none;
  color: var(--dark);
  padding: 0.5rem;
  display: flex;
  align-items: center;
  justify-content: center;
}

.mobile-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100vh;
  background: rgba(0, 0, 0, 0.5);
  z-index: 998;
}

.mobile-menu {
  position: fixed;
  top: 0;
  right: -100%;
  width: 80%;
  max-width: 320px;
  height: 100vh;
  background: var(--white);
  padding: 5rem 2rem 2rem;
  box-shadow: var(--shadow-lg);
  z-index: 999;
  transition: right 0.3s ease-in-out;
}

.mobile-menu-open {
  right: 0;
}

.mobile-nav-links {
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
}

.mobile-nav-links a {
  font-size: 1.2rem;
  font-weight: 600;
  color: var(--dark);
}

.mobile-nav-links a:hover {
  color: var(--primary);
}

.mobile-cta {
  margin-top: 2rem;
  padding-top: 2rem;
  border-top: 1px solid var(--gray-200);
}

.btn-block {
  width: 100%;
}

/* Tablet and up */
@media (min-width: 768px) {
  .navbar {
    padding: 1.25rem 0;
  }

  .logo {
    height: 45px;
  }

  .logo-title {
    font-size: 1.4rem;
  }

  .logo-subtitle {
    display: block;
  }

  .nav-links {
    display: flex;
  }

  .nav-actions {
    display: block;
  }

  .mobile-toggle {
    display: none;
  }
}

/* Desktop */
@media (min-width: 1024px) {
  .logo {
    height: 50px;
  }

  .nav-links {
    gap: 2.5rem;
  }
}
</style>

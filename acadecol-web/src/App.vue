<script setup>
import Navbar from "./components/Navbar.vue";
import Hero from "./components/Hero.vue";
import About from "./components/About.vue";
import Formations from "./components/Formations.vue";
import Contact from "./components/Contact.vue";
import Footer from "./components/Footer.vue";
import { onMounted } from "vue";

onMounted(() => {
  // Simple scroll animation trigger
  const observerOptions = {
    threshold: 0.1,
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("reveal");
      }
    });
  }, observerOptions);

  document.querySelectorAll(".section").forEach((section) => {
    observer.observe(section);
  });
});
</script>

<template>
  <div class="app-wrapper">
    <Navbar />
    <main>
      <Hero />
      <About />
      <Formations />
      <Contact />
    </main>
    <Footer />
  </div>
</template>

<style>
.app-wrapper {
  overflow-x: hidden;
}

main {
  min-height: 100vh;
}

/* Global scroll margin for anchors */
section {
  scroll-margin-top: 80px;
}
</style>

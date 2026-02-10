<template>
  <footer class="footer">
    <div class="container">
      <div class="footer-grid">
        <div class="footer-brand">
          <div class="logo-container">
            <img src="/logo.png" alt="ACADECOL Logo" class="logo" />
            <h3>ACADECOL</h3>
          </div>
          <p>Académie Africaine Bilingue. Institut de Formation Professionnelle agréé par le MINEFOP.</p>
          <p class="arrête">Arrêté N° : 000644/MINEFOP/SG/DFOP/SDGSF/CSADC/CBAC</p>
        </div>
        
        <div class="footer-links">
          <h4>Liens Rapides</h4>
          <ul>
            <li><a href="#home">Accueil</a></li>
            <li><a href="#about">À Propos</a></li>
            <li><a href="#formations">Formations</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div>
        
        <div class="footer-filiere">
          <h4>Formations</h4>
          <ul>
            <li><a href="#formations">Diplômes Nationaux</a></li>
            <li><a href="#formations">Langues</a></li>
            <li><a href="#formations">Humanitaire</a></li>
            <li><a href="#formations">Numérique en Santé</a></li>
            <li><a href="#formations">Management</a></li>
          </ul>
        </div>
        
        <div class="footer-contact">
          <h4>Contact</h4>
          <p>Bafoussam, Entrée École Normale</p>
          <p>Tél: +237 691 05 69 65</p>
          <p>Tél: +237 621 96 86 40</p>
          <p>Email: acadecol25@gmail.com</p>
        </div>
      </div>
      
      <div class="footer-bottom">
        <p>&copy; 2026 ACADECOL. Tous droits réservés.</p>
        <p class="promoteur">Promoteur: Dr Norbert Tanke Dongmo, PhD</p>
      </div>
    </div>
  </footer>
</template>

<style scoped>
.footer {
  background: var(--dark);
  color: var(--white);
  padding: 3rem 0 1.5rem;
}

.footer-grid {
  display: grid;
  gap: 2.5rem;
  margin-bottom: 3rem;
}

.footer-brand .logo-container {
  display: flex;
  align-items: center;
  gap: 0.75rem;
  margin-bottom: 1rem;
}

.footer-brand .logo {
  height: 40px;
  filter: brightness(0) invert(1);
}

.footer-brand h3 {
  font-size: 1.25rem;
}

.footer-brand p {
  color: var(--gray-300);
  font-size: 0.9rem;
  margin-bottom: 0.5rem;
  line-height: 1.6;
}

.arrête {
  font-size: 0.75rem !important;
  opacity: 0.7;
}

h4 {
  font-size: 1.1rem;
  margin-bottom: 1rem;
  position: relative;
  padding-bottom: 0.75rem;
}

h4::after {
  content: '';
  position: absolute;
  left: 0;
  bottom: 0;
  width: 30px;
  height: 2px;
  background: var(--primary);
}

ul {
  display: flex;
  flex-direction: column;
  gap: 0.6rem;
}

ul a {
  color: var(--gray-300);
  font-size: 0.9rem;
  transition: var(--transition);
}

ul a:hover {
  color: var(--primary);
  padding-left: 0.5rem;
}

.footer-contact p {
  color: var(--gray-300);
  font-size: 0.9rem;
  margin-bottom: 0.4rem;
}

.footer-bottom {
  border-top: 1px solid rgba(255,255,255,0.1);
  padding-top: 1.5rem;
  text-align: center;
}

.footer-bottom p {
  font-size: 0.85rem;
  color: var(--gray-600);
  margin-bottom: 0.5rem;
}

.promoteur {
  font-size: 0.8rem !important;
  opacity: 0.7;
}

/* Tablet */
@media (min-width: 768px) {
  .footer {
    padding: 4rem 0 2rem;
  }

  .footer-grid {
    grid-template-columns: repeat(2, 1fr);
  }

  .footer-bottom {
    display: flex;
    justify-content: space-between;
    align-items: center;
    text-align: left;
  }

  .footer-bottom p {
    margin: 0;
  }
}

/* Desktop */
@media (min-width: 1024px) {
  .footer-grid {
    grid-template-columns: 2fr 1fr 1fr 1.5fr;
    gap: 3rem;
  }
}
</style>

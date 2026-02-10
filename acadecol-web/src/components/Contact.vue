<script setup>
import { Phone, Mail, MapPin, Send, Facebook, Linkedin, Instagram } from 'lucide-vue-next';
</script>

<template>
  <section id="contact" class="section contact">
    <div class="container">
      <div class="contact-grid">
        <div class="contact-info reveal">
          <span class="badge badge-primary">Contactez-nous</span>
          <h2 class="section-title">Prenons <span class="gradient-text">Contact</span></h2>
          <p>Vous avez des questions sur nos formations ? Notre équipe est là pour vous accompagner dans votre choix professionnel.</p>
          
          <div class="contact-methods">
            <a href="tel:+237691056965" class="method-item">
              <div class="method-icon"><Phone :size="22" /></div>
              <div class="method-content">
                <h4>Téléphone / WhatsApp</h4>
                <p>+237 691 05 69 65</p>
                <p>+237 621 96 86 40</p>
              </div>
            </a>
            
            <a href="mailto:acadecol25@gmail.com" class="method-item">
              <div class="method-icon"><Mail :size="22" /></div>
              <div class="method-content">
                <h4>Email</h4>
                <p>acadecol25@gmail.com</p>
              </div>
            </a>
            
            <div class="method-item">
              <div class="method-icon"><MapPin :size="22" /></div>
              <div class="method-content">
                <h4>Localisation</h4>
                <p>Bafoussam - Entrée École Normale</p>
                <p>République du Cameroun</p>
              </div>
            </div>
          </div>

          <div class="social-links">
            <a href="#" class="social-btn" aria-label="Facebook"><Facebook :size="20" /></a>
            <a href="#" class="social-btn" aria-label="LinkedIn"><Linkedin :size="20" /></a>
            <a href="#" class="social-btn" aria-label="Instagram"><Instagram :size="20" /></a>
          </div>
        </div>

        <div class="contact-form-container reveal">
          <form class="contact-form" @submit.prevent>
            <h3>Demande d'informations</h3>
            
            <div class="form-group">
              <label for="name">Nom complet</label>
              <input type="text" id="name" placeholder="Ex: Jean Dupont" required />
            </div>
            
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" id="email" placeholder="Ex: jean@email.com" required />
            </div>
            
            <div class="form-group">
              <label for="phone">Téléphone</label>
              <input type="tel" id="phone" placeholder="Ex: +237 6XX XXX XXX" />
            </div>
            
            <div class="form-group">
              <label for="formation">Formation souhaitée</label>
              <select id="formation">
                <option value="">Sélectionnez une formation</option>
                <option>Vendeur en Pharmacie</option>
                <option>Délégué Médical</option>
                <option>Auxiliaire de Vie</option>
                <option>Maintenance Biomédicale</option>
                <option>Analyste des Données</option>
                <option>Community Management</option>
                <option>Langues (Français, Anglais, etc.)</option>
                <option>Certificats Humanitaires</option>
                <option>Numérique en Santé</option>
                <option>Management & Recherche</option>
              </select>
            </div>
            
            <div class="form-group">
              <label for="message">Message</label>
              <textarea id="message" placeholder="Votre message ici..." rows="4"></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary btn-block">
              Envoyer la demande
              <Send :size="18" />
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
.contact {
  background-color: var(--gray-100);
}

.contact-grid {
  display: grid;
  gap: 3rem;
}

.section-title {
  font-size: clamp(1.8rem, 4vw, 2.5rem);
  margin: 1rem 0 1.5rem;
}

.contact-info p {
  color: var(--gray-600);
  line-height: 1.7;
  margin-bottom: 2rem;
}

.contact-methods {
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
  margin-bottom: 2rem;
}

.method-item {
  display: flex;
  gap: 1rem;
  text-decoration: none;
  color: inherit;
}

.method-icon {
  width: 50px;
  height: 50px;
  background: var(--white);
  color: var(--primary);
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 12px;
  box-shadow: var(--shadow-sm);
  flex-shrink: 0;
}

.method-content h4 {
  font-size: 1rem;
  margin-bottom: 0.25rem;
}

.method-content p {
  color: var(--gray-600);
  font-size: 0.9rem;
  margin: 0;
}

.social-links {
  display: flex;
  gap: 1rem;
}

.social-btn {
  width: 45px;
  height: 45px;
  background: var(--white);
  color: var(--gray-700);
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  transition: var(--transition);
  box-shadow: var(--shadow-sm);
}

.social-btn:hover {
  background: var(--primary);
  color: var(--white);
  transform: translateY(-3px);
}

.contact-form {
  background: var(--white);
  padding: 2rem 1.5rem;
  border-radius: 20px;
  box-shadow: var(--shadow);
}

.contact-form h3 {
  font-size: 1.5rem;
  margin-bottom: 1.5rem;
  color: var(--dark);
}

.form-group {
  margin-bottom: 1.25rem;
}

label {
  display: block;
  font-size: 0.9rem;
  font-weight: 600;
  color: var(--gray-700);
  margin-bottom: 0.5rem;
}

input, select, textarea {
  width: 100%;
  padding: 0.9rem 1rem;
  border: 1px solid var(--gray-200);
  border-radius: 10px;
  font-family: inherit;
  font-size: 1rem;
  transition: var(--transition);
  background: var(--white);
}

input:focus, select:focus, textarea:focus {
  border-color: var(--primary);
  outline: none;
  box-shadow: 0 0 0 3px var(--primary-light);
}

.btn-block {
  width: 100%;
  justify-content: center;
  padding: 1rem;
}

/* Tablet and up */
@media (min-width: 768px) {
  .contact-grid {
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
  }

  .contact-form {
    padding: 2.5rem;
  }
}
</style>

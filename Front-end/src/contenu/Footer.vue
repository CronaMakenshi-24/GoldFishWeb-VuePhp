<script setup>
import ScrollPos from "../components/Scroll-pos.vue";</script>

<template>
  <footer class="footer">
    <ScrollPos></ScrollPos>
    <div class="footer-top">
      <div class="footer-logo">
        <img alt="Your Company" class="logo-img" src="../assets/images/goldfishfish.webp"/>
        <h5 class="footer-title">
          Développeur Web & Webdesigner Freelance
        </h5>
      </div>
      <div class="footer-linkedin">
        <a href="https://www.linkedin.com/in/christophe-mestdagh-3a6002217/" target="_blank">
          <img alt="linkedin" class="linkedin-img" src="../assets/images/LinkedIn_icon_circle.webp">
        </a>
      </div>
    </div>
    <div class="footer-middle">
      <div class="footer-description">
        <p>
          En tant que développeur web indépendant, je suis spécialisé dans le développement web front-end et back-end,
          ainsi que dans le design web. Je suis là pour prendre en charge une variété de projets, que ce soit pour la
          création de sites internet, le développement sur mesure ou la conception d'applications web.
          Mon expertise est centrée sur les technologies web, et je suis passionné par l'évolution constante de cet
          univers. Je mets en œuvre mes compétences pour répondre à vos besoins dans divers domaines.
        </p>
      </div>
      <div class="footer-contact">
        <h5 class="footer-contact-title">GoldFishWeb</h5>
        <ul class="footer-contact-list">
          <li>📞 06-11-53-31-80</li>
          <li>📧 christophe.mestdagh@goldfishweb.fr</li>
          <li>@<a href="https://mestdagh-christophe.ovh/">Mon PortFolio</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <p>Goldfishweb © 2025</p>
    </div>
  </footer>
</template>

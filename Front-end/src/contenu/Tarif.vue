<script setup>
import Modal from '../components/Modal.vue'

// If using locally in the setup script
defineExpose({ Modal });
</script>


<template>
  <article class="tarif">
    <div class="tariftitle">
      <h2>Mes Tarifs</h2>
      <p>Un tarif adapté à votre site internet</p>
    </div>
    <div>
      <div class="tarifslogan">
        <p>Bienvenue à vous ! Vous avez une idée ou un projet en tête ? Je suis là pour vous aider. Contactez-moi
          dès maintenant pour obtenir une estimation gratuite.</p>
      </div>
      <div class="girdtarif">
        <div class="vitrinetarif div1">
          <h3>Site
            Vitrine Standard</h3>
          <p>À partir de</p>
          <p>Création d'un site 4 à 7<br> Tarif: 350 € /jour</p>
          <ul class="tariful ul1">
            <li>Développé sous WORDPRESS ou Développé SUR-MESURE (Codage à la main)</li>
            <li>Charte graphique à partir d'une maquette pré-définie</li>
            <li>Proposition de logo / Sélection d'une palette de couleur</li>
            <li>Domaine + hébergement + e-mail pendant 12 mois</li>
            <li>Interface administrateur STANDARD / Interface administrateur SUR-MESURE</li>
            <li>Site responsive (adapté à tous supports)</li>
            <li>Mise en place du contenu (textes & images)</li>
            <li>Formulaire de contact</li>
            <li>Liens de partage sur les réseaux sociaux</li>
            <li>Optimisation du référencement</li>
            <li>Statistiques de visite</li>
            <li>Mise en ligne du site</li>
          </ul>
          <Modal></Modal>
        </div>
        <div class="ecomtarif div2">
          <h3 class="">Site
            E-commerce</h3>
          <p class="">À partir de</p>
          <p class=""> Création d'un site 4 à 7<br> Tarif: 350 €/jour</p>
          <ul class="tariful">
            <li>Développé sous WORDPRESS</li>
            <li>Charte graphique à partir d'une maquette pré-définie</li>
            <li>Proposition de logo / Sélection d'une palette de couleur</li>
            <li>Domaine + hébergement + e-mail pendant 12 mois</li>
            <li>Interface administrateur STANDARD / Interface administrateur SUR-MESURE</li>
            <li>Site responsive (adapté à tous supports)</li>
            <li>Mise en place du contenu (textes & images)</li>
            <li>Formulaire de contact</li>
            <li>Liens de partage sur les réseaux sociaux</li>
            <li>Optimisation du référencement</li>
            <li>Statistiques de visite</li>
            <li>Mise en ligne du site</li>
          </ul>
          <Modal></Modal>
        </div>
        <div class="vitrinetarif div3">
          <h3 class="">Forfait Maintenance</h3>
          <p class="">50 € / Heure</p>
          <ul class="tariful">
            <li>Mises à jour site internet & plugins</li>
            <li>Petites modifications graphiques ou de contenu</li>
            <li>Optimisation performances</li>
            <li>Restauration en cas de piratage</li>
          </ul>
          <div class="boutoncontact">
            <a href="#Contact" class="contactlien">Me Contacter</a>
          </div>
        </div>
        <div class="ecomtarif2 div4">
          <h3>Développements spécifiques</h3>
          <p>Taux journalier moyen</p>
          <p class="ecomtarif2p">350 € / jour</p>
          <div class="boutoncontact">
            <a href="#Contact" class="contactlien">Me Contacter</a>
          </div>
        </div>
      </div>
    </div>
  </article>
</template>



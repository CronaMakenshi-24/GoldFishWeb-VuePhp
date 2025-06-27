<template>
  <article class="contact">
    <div class="titlecontact">
      <h1>Contacter-Moi</h1>
      <p>
        Bienvenue à vous ! Vous avez une idée ou un projet en tête ? Nous sommes là pour vous aider. Contactez-moi dès maintenant pour obtenir une estimation gratuite.
      </p>
    </div>
    <div class="infocontact">
      <div class="info">
        <ul>
          <li>
            <h4>&#128222; Téléphone</h4>
            <p>06-11-53-31-80</p>
          </li>
          <li>
            <h4>📧 E-mail</h4>
            <p>christophe.mestdagh@goldfishweb.fr</p>
          </li>
          <li>
            <h4>⌚ Horaires</h4>
            <p>Lundi - Vendredi</p>
            <p>09H00 - 18H00</p>
          </li>
          <li>
            <h4>🪪 S.I.R.E.N</h4>
            <p>920276417</p>
          </li>
        </ul>
      </div>
      <div>
        <!-- Remplacez l'URL par votre propre URL de carte Google Maps -->
        <iframe
            allowfullscreen=""
            class="map"
            height="100%"
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d40708.509269058!2d3.0592769995173597!3d50.379944608479306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c2c9374fe2711f%3A0x40af13e81646df0!2sDouai!5e0!3m2!1sfr!2sfr!4v1732110371316!5m2!1sfr!2sfr"
            style="border: 0;"
            width="400"
        ></iframe>
      </div>
      <div class="formulaire">
        <form @submit.prevent="submitForm">
          <div v-if="successMessage" id="alert-border-3" class="success-alert" role="alert">
            <svg  class="error-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <div>
              {{ successMessage }}
            </div>
            <button id="triggerElement" type="button" class="dismiss-button" @click="hideSuccessMessage">

              <svg  class="error-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
              </svg>
            </button>
          </div>
          <div>
            <div class="flexnom">
              <div class="form-group">
                <label for="prenom" class="form-label">Prénom *</label>
                <input type="text" id="prenom" name="prenom" placeholder="Votre Prénom" v-model="formData.prenom" class="form-input inputnom">
                <div v-if="errors.prenom" class="error-alert" role="alert">
                  <svg class="error-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                  </svg>
                  <span class="error-text">{{ errors.prenom }}</span>
                </div>
              </div>
              <div class="form-group">
                <label for="nom" class="form-label">Nom *</label>
                <input type="text" id="nom" name="nom" placeholder="Votre Nom" v-model="formData.nom" class="form-input inputnom">
                <div v-if="errors.nom" class="error-alert" role="alert">
                  <svg class="error-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                  </svg>
                  <span class="error-text">{{ errors.nom }}</span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="form-label">E-mail *</label>
            <input type="email" id="email" name="email" placeholder="Votre Email" v-model="formData.email" class="form-input">
            <div v-if="errors.email" class="error-alert" role="alert">
              <svg class="error-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
              </svg>
              <span class="error-text">{{ errors.email }}</span>
            </div>
          </div>
          <div class="form-group">
            <label for="message" class="form-label">Message *</label>
            <textarea id="message" name="message" v-model="formData.message" placeholder="Votre Message..." rows="4" class="form-textarea"></textarea>
            <div v-if="errors.message" class="error-alert" role="alert">
              <svg class="error-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
              </svg>
              <span class="error-text">{{ errors.message }}</span>
            </div>
          </div>
          <!-- CAPTCHA Section -->
          <div class="form-group">
            <label for="captcha" class="form-label">Combien font {{ captcha.num1 }} + {{ captcha.num2 }} ? *</label>
            <input type="number" id="captchas" name="captcha" placeholder="Votre Réponse" v-model="captcha.answer" class="form-input">
            <div v-if="errors.captcha" class="error-alert" role="alert">
              <svg class="error-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
              </svg>
              <span class="error-text">{{ errors.captcha }}</span>
            </div>
          </div>
          <div>
            <div class="checkbox-container">
              <input type="checkbox" id="accepter" name="accepter" v-model="formData.accepter">
              <label for="accepter" class="checkbox-label">En soumettant ce formulaire, j'accepte que les informations saisies soient exploitées dans le cadre de la demande de devis et de la relation commerciale qui peut en découler. *</label>
            </div>
            <div v-if="errors.accepter" class="error-alert" role="alert">
              <svg aria-hidden="true" class="error-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
              </svg>
              <span class="sr-only">Info</span>
              <div>
                <span class="font-medium">{{ errors.accepter }}</span>
              </div>
            </div>
          </div>
          <div class="form-actions">
            <button type="submit" class="submit-button">Envoyer</button>
          </div>
        </form>
      </div>
    </div>
  </article>
</template>

<script>
export default {
  data() {
    return {
      formData: {
        prenom: '',
        nom: '',
        email: '',
        message: '',
        accepter: false,
      },
      errors: {},
      successMessage: '',
      captcha: {
        num1: this.getRandomNumber(),
        num2: this.getRandomNumber(),
        answer: '',
      },
    };
  },
  methods: {
    getRandomNumber() {
      return Math.floor(Math.random() * 10) + 1;
    },
    validateForm() {
      this.errors = {};
      if (!this.formData.prenom) {
        this.errors.prenom = "Le prénom est obligatoire.";
      } else if (this.formData.prenom.length < 5) {
        this.errors.prenom = "La chaîne est trop courte. Veuillez entrer au moins 5 caractères.";
      } else if (this.formData.prenom.length > 20) {
        this.errors.prenom = "La chaîne est trop longue. Limitez-la à 20 caractères maximum.";
      }

      if (!this.formData.nom) {
        this.errors.nom = "Le nom est obligatoire.";
      } else if (this.formData.nom.length < 5) {
        this.errors.nom = "La chaîne est trop courte. Veuillez entrer au moins 5 caractères.";
      } else if (this.formData.nom.length > 20) {
        this.errors.nom = "La chaîne est trop longue. Limitez-la à 20 caractères maximum.";
      }

      if (!this.formData.email) {
        this.errors.email = 'L\'e-mail est obligatoire.';
      } else if (!this.validEmail(this.formData.email)) {
        this.errors.email = 'L\'adresse e-mail n\'est pas valide.';
      }
      if (!this.formData.message) {
        this.errors.message = "Le message est obligatoire.";
      } else if (this.formData.message.length < 10) {
        this.errors.message = "La chaîne est trop courte. Veuillez entrer au moins 10 caractères.";
      } else if (this.formData.message.length > 1000) {
        this.errors.message = "La chaîne est trop longue. Limitez-la à 1000 caractères maximum.";
      }
      if (!this.captcha.answer) {
        this.errors.captcha = 'Veuillez résoudre le CAPTCHA.';
      } else if (parseInt(this.captcha.answer) !== this.captcha.num1 + this.captcha.num2) {
        this.errors.captcha = 'Réponse incorrecte au CAPTCHA.';
      }
      if (!this.formData.accepter) {
        this.errors.accepter = "Vous devez accepter les conditions pour soumettre le formulaire.";
      }
      return Object.keys(this.errors).length === 0;
    },
    validEmail(email) {
      const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return re.test(email);
    },
    async submitForm() {
      if (this.validateForm()) {
        try {
          const response = await fetch('http://localhost:8000/contact.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json'
            },
            body: JSON.stringify(this.formData)
          });

          if (!response.ok) {
            throw new Error('Erreur lors de la requête');
          }

          this.successMessage = 'Merci pour votre message ! Nous vous répondrons dans les plus brefs délais.';
          this.resetForm();
          this.resetCaptcha();
        } catch (error) {
          console.error("Erreur lors de la requête à l'API :", error);
          this.successMessage = "Erreur lors de la requête à l'API : " + error.message;
        }
      }
    },
    resetForm() {
      this.formData.prenom = '';
      this.formData.nom = '';
      this.formData.email = '';
      this.formData.message = '';
      this.formData.accepter = false;
    },
    hideSuccessMessage() {
      this.successMessage = '';
    },
    resetCaptcha() {
      this.captcha.num1 = this.getRandomNumber();
      this.captcha.num2 = this.getRandomNumber();
      this.captcha.answer = '';
    },
  },
};
</script>








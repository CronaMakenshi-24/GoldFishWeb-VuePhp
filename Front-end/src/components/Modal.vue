<script>
const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
const phoneRegex = /^\d{10}$/;

export default {
  data() {
    return {
      showModal: false,
      formData: {
        nom: '',
        type_entite: 'particulier',
        email: '',
        tel: '',
        adresse_site: '',
        accepter: false,
        projet: '',
        captcha: '',
        captchaOperation: '',
        expectedCaptchaResult: null,
      },
      successMessage: "",
      errors: {},
    };
  },
  mounted() {
    this.generateCaptchaOperation();
  },
  methods: {
    async submitForm() {
      this.errors = {};

      if (!this.formData.nom) {
        this.errors.nom = "Le prénom ou le nom est obligatoire.";
      } else if (this.formData.nom.length < 5) {
        this.errors.nom = "La chaîne est trop courte. Veuillez entrer au moins 5 caractères.";
      } else if (this.formData.nom.length > 20) {
        this.errors.nom = "La chaîne est trop longue. Limitez-la à 20 caractères maximum.";
      }

      if (!this.formData.type_entite) {
        this.errors.type_entite = "Le type d'entité est obligatoire.";
      }

      if (!this.formData.email) {
        this.errors.email = "L'e-mail est obligatoire.";
      } else if (!emailRegex.test(this.formData.email)) {
        this.errors.email = "Veuillez saisir une adresse e-mail valide.";
      }

      if (!this.formData.tel) {
        this.errors.tel = "Le téléphone est obligatoire.";
      } else if (!phoneRegex.test(this.formData.tel)) {
        this.errors.tel = "Veuillez saisir un numéro de téléphone valide (10 chiffres sans espaces ni caractères spéciaux).";
      }

      if (!this.formData.projet) {
        this.errors.projet = "Le message est obligatoire.";
      } else if (this.formData.projet.length < 100) {
        this.errors.projet = "La chaîne est trop courte. Veuillez entrer au moins 100 caractères.";
      } else if (this.formData.projet.length > 500) {
        this.errors.projet = "La chaîne est trop longue. Limitez-la à 500 caractères maximum.";
      }

      if (Number(this.formData.captcha) !== this.formData.expectedCaptchaResult) {
        this.errors.captcha = "La réponse au CAPTCHA est incorrecte.";
      }

      if (!this.formData.accepter) {
        this.errors.accepter = "Vous devez accepter les conditions pour soumettre le formulaire.";
      }

      if (Object.values(this.errors).some(error => error !== "")) {
        return;
      }

      try {
        const response = await fetch('http://localhost:8000/devis.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(this.formData)
        });

        if (!response.ok) {
          throw new Error('Erreur lors de la requête');
        }

        const result = await response.json();

        this.successMessage = "Votre formulaire a été soumis avec succès !";
        console.log("Réponse de l'API :", result);

        this.formData = {
          nom: '',
          type_entite: 'particulier',
          email: '',
          tel: '',
          adresse_site: '',
          accepter: false,
          projet: '',
          captcha: '',
        };

        this.generateCaptchaOperation();

      } catch (error) {
        console.error("Erreur lors de la requête à l'API :", error);
        this.successMessage = "Erreur lors de la requête à l'API : " + error.message;
      }

      this.hideModal();
    },

    generateCaptchaOperation() {
      const num1 = Math.floor(Math.random() * 10);
      const num2 = Math.floor(Math.random() * 10);
      this.formData.captchaOperation = `${num1} + ${num2}`;
      this.formData.expectedCaptchaResult = num1 + num2;
    },

    hideSuccessMessage() {
      this.successMessage = "";
    }
  }
};
</script>

<template>
  <div>
    <div class="boutoncontact">
      <button class="contactbutton" @click="showModal = !showModal" type="button">
        Demander un Devis
      </button>
    </div>

    <!-- Main modal -->
    <div class="modal-wrapper">
    <div class="modal-background" v-if="showModal" @click="closeModal">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close-button" @click="showModal = false">
            <svg  aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>
        <div class="modal-body">
          <h3 class="modal-title">Demande de devis</h3>
          <div v-if="successMessage" id="alert-border-3" class="success-alert" role="alert">
            <svg  class="error-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <div class="">
              {{ successMessage }}
            </div>
            <button id="triggerElement" type="button" class="dismiss-button" @click="hideSuccessMessage">
              <span class="sr-only">Dismiss</span>
              <svg  class="error-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
              </svg>
            </button>
          </div>
          <div class="modal-slogan">
            <p>
              Demande de devis gratuit . Reponse moyenne 48h. Merci de détailler au maximun votre projet pour un
              reponse présive.
            </p>
          </div>
          <form @submit.prevent="submitForm" class="form-content">
            <div class="form-group">
              <label for="nom" class="form-label">Nom/Prénom *</label>
              <input type="text" id="nom" name="nom" v-model="formData.nom" class="form-input">
              <div v-if="errors.nom" class="error-alert" role="alert">
                <svg class="error-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="error-text">{{ errors.nom }}</span>
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Type d'entité *</label>
              <div class="modal-radio">
                <div class="radio">
                  <label for="particulier" class="form-radio-label">Particulier</label>
                  <input type="radio" id="particulier" name="type_entite" value="particulier" v-model="formData.type_entite" class="form-radio">
                </div>
                <div class="radio">
                  <label for="association" class="form-radio-label">Association</label>
                  <input type="radio" id="association" name="type_entite" value="association" v-model="formData.type_entite" class="form-radio">
                </div>
               <div class="radio">
                 <label for="societe" class="form-radio-label">Société</label>
                 <input type="radio" id="societe" name="type_entite" value="societe" v-model="formData.type_entite" class="form-radio">
               </div>
              </div>
              <span class="error-text" v-if="errors.type_entite">{{ errors.type_entite }}</span>
            </div>
            <div class="form-group">
              <label for="email" class="form-label">Email *</label>
              <input type="email" id="email" name="email" v-model="formData.email" class="form-input">
              <div v-if="errors.email" class="error-alert" role="alert">
                <svg class="error-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="error-text">{{ errors.email }}</span>
              </div>
            </div>
            <div class="form-group">
              <label for="tel" class="form-label">Téléphone *</label>
              <input type="tel" id="tel" name="tel" v-model="formData.tel" class="form-input">
              <div v-if="errors.tel" class="error-alert" role="alert">
                <svg class="error-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="error-text">{{ errors.tel }}</span>
              </div>
            </div>
            <div class="form-group">
              <label class="form-label" for="adresse_site">Adresse du site internet</label>
              <input id="adresse_site" v-model="formData.adresse_site" class="form-input" name="adresse_site" type="text">
              <span class="error-text" v-if="errors.adresse_site">{{ errors.adresse_site }}</span>
            </div>
            <div class="form-group">
              <div>
                <label class="form-label" for="captcha">Captcha *</label>
                <div class="captcha-group">
                  <span class="captcha-question">{{ formData.captchaOperation }} =</span>
                  <input id="captcha" v-model="formData.captcha" class="form-input" type="number">
                </div>
              </div>
              <div v-if="errors.captcha" id="alert-border-2" class="error-alert" role="alert">
                <svg aria-hidden="true" class="error-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <div>
                  {{ errors.captcha }}
                </div>
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
            <div class="form-group">
              <label for="projet" class="form-label">Message pour votre projet *</label>
              <textarea id="projet" name="projet" v-model="formData.projet" rows="4" class="form-textarea"></textarea>
              <div v-if="errors.projet" class="error-alert" role="alert">
                <svg class="error-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="error-text">{{ errors.projet }}</span>
              </div>
            </div>
            <div class="text-center">
              <button type="submit" class="submit-button">Envoyer votre demande de devis</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
</template>





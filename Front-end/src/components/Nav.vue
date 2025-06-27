<script setup>
import ModeDark from "./ModeDark.vue";
import {Disclosure, DisclosureButton, DisclosurePanel} from '@headlessui/vue'
import {Bars3Icon, XMarkIcon} from '@heroicons/vue/24/outline'
import {onMounted, ref } from 'vue';

const navigation = [
  { name: '🦈', href: '#Home', current: true },
  { name: 'SERVICES', href: '#Service', current: false },
  { name: 'COMPÉTENCES', href: '#Competence', current: false },
  { name: 'TARIFS', href: '#Tarif', current: false },
  { name: 'À PROPOS', href: '#Apropos', current: false },
  { name: 'CONTACT', href: '#Contact', current: false },
]

const showPos = ref("0");
let interval; // Définir interval ici

const handleMouseOver = (event) => {
    showPos.value = "0"
}
const handleMouseOut = (event) => {
      showPos.value = "-80px";
}

onMounted(async () => {
  window.addEventListener("scroll", () => {
    showPos.value = "0";
  }, { passive: true }); // Ajoutez { passive: true } ici pour optimiser la performance.

  interval = setInterval(() => {
    if (window.scrollY) {
      showPos.value = "-80px";
    } else {
      showPos.value = "0";
    }
  }, 10000);  // 15 secondes de délai

  // Écouteur d'événement pour "mouseover"
  window.addEventListener("mouseover", handleMouseOver);

  // Écouteur d'événement pour "mouseout"
  window.addEventListener("mouseout", handleMouseOut);
});
</script>


<template>
    <Disclosure v-slot="{ open }" as="nav" id="returnToNav" :style="{ top: showPos }"
                class="navshowpos">
      <div class="navsize">
        <div class="flexnav">
          <div class="flexlogo">
            <img alt="Your Company" class="logo" src="../assets/images/goldfishfish.webp"/>
            <span class="titlelogo">GoldFishWeb</span>
          </div>
          <div class="navfull">
            <nav class="">
              <a
                  v-for="item in navigation"
                  :key="item.name"
                  :class="[
                  'navlink',
                  { 'text-white': item.current }
                ]"
                  :href="item.href"
              >{{ item.name }}</a>
            </nav>
          </div>
          <div>
            <ModeDark></ModeDark>
          </div>
          <div>
            <DisclosureButton
                class="buttonrep"
            >
              <Bars3Icon v-if="!open" aria-hidden="true" class=""/>
              <XMarkIcon v-else aria-hidden="true" class=""/>
            </DisclosureButton>
          </div>
        </div>
      </div>
      <DisclosurePanel class="navpanel">
        <div class="navrep">
          <DisclosureButton
              v-for="item in navigation"
              :key="item.name"
              :class="[
              'navlink',
              '',
              { '': item.current }
            ]"
              :href="item.href"
              as="a"
          >{{ item.name }}
          </DisclosureButton>
        </div>
      </DisclosurePanel>
    </Disclosure>
</template>

<script setup>
import { ref, onMounted } from 'vue';

const isDark = ref(false);

const toggleDark = () => {
  isDark.value = !isDark.value;
  if (isDark.value) {
    document.documentElement.classList.add('dark-mode');
  } else {
    document.documentElement.classList.remove('dark-mode');
  }
};

onMounted(() => {
  // Check the initial theme based on user preferences or system settings
  if (window.matchMedia && window.matchMedia('(prefers-color-scheme: )').matches) {
    isDark.value = true;
    document.documentElement.classList.add('dark-mode');
  }
});
</script>


<template>
  <div class="buttonmode">
    <label class="switch">
      <input @click="toggleDark()" type="checkbox" class="sr-only" :checked="isDark">
      <span class="slider"></span>
    </label>
  </div>
</template>


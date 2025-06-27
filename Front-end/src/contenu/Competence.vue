<script setup>
import { onMounted, onUnmounted } from 'vue';

const skills = [
  {name: "HTML", percent: 100},
  {name: "CSS-SCSS", percent: 95},
  {name: "Bootstrap-Tailwind", percent: 95},
  {name: "Wordpress", percent: 85},
  {name: "Javascript", percent: 80},
  {name: "PHP", percent: 80},
  {name: "Symfony", percent: 75},
  {name: "Laravel", percent: 75},
  {name: "React", percent: 70},
  {name: "SQL", percent: 65, details: "( MySQL, SQLite, PostgreSQL )"},
  {name: "React-Native", percent: 60},
  {name: "Vue", percent: 60},
];

const handleScroll = () => {
  const skillBox = document.getElementById('SkillBox');
  if (window.scrollY > 850) {
    skillBox.classList.add('animated');
  } else {
    skillBox.classList.remove('animated');
  }
};

onMounted(() => {
  window.addEventListener('scroll', handleScroll);
});

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll);
});
</script>

<template>
  <article id="Competence">
    <div class="titlecompétence">
      <h2>Mes Compétences</h2>
    </div>
    <div>
      <div id="SkillBox" class="SkillBoxlook">
        <div
            class="SkillBar"
            v-for="(skill, index) in skills"
            :key="index"
        >
          <div :class="['Skill-' + skill.name]" >
            <span class="Skill-Area">{{ skill.name }}</span>
            <span class="PercentText">{{ skill.percent }}%</span>
            <div class="Skill-Details">
              {{ skill.details }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </article>
</template>










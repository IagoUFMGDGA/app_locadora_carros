<template>
  <div :class="estilo" role="alert">
    {{ alertText }}
    <hr />
    <p>{{ detalhes.message }}</p>
    <br />
    <!-- lista de erros -->
    <ul v-if="detalhes.dados">
      <li v-for="(e, key) in detalhes.dados" :key="key">{{ e[0] }}</li>
    </ul>
  </div>
</template>

<script>
export default {
  props: ["tipo", "alertText", "detalhes"],
  computed: {
    estilo() {
      return "alert alert-" + this.tipo;
    },
  },
};
</script>

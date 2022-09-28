<template>
  <div :class="estilo" role="alert">
    {{ alertText }}
  </div>
</template>

<script>
export default {
  props: ["tipo", "alertText"],
  computed: {
    estilo() {
      return "alert alert-" + this.tipo;
    },
  },
};
</script>

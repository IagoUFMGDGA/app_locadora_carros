<template>
  <div>
    <label :for="labelFor" class="form-label">{{ labelText }}</label>

    <slot></slot>

    <div :id="idHelp" class="form-text text-muted">
      {{ helpText }}
    </div>
  </div>
</template>

<script>
export default {
  props: ["labelFor", "labelText", "idHelp", "helpText"],
};
</script>

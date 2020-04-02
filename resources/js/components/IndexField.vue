<template>
  <div class="swatch-container">
    <Swatch :value="field.value" width="32px" height="32px" />
  </div>
</template>

<script>
import Swatch from "./Swatch";

export default {
  props: ["resourceName", "field"],

  components: { Swatch }
};
</script>

<style lang="scss" scoped>
.swatch-container {
  display: flex;
  align-items: center;
  justify-content: center;
}
</style>

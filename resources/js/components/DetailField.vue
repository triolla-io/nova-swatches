<template>
  <panel-item :field="field">
    <template slot="value">
      <Swatch :value="field.value" />
    </template>
  </panel-item>
</template>

<script>
import Vue from "vue";
import Swatch from "./Swatch";

export default {
  props: ["resource", "resourceName", "resourceId", "field"],

  components: { Swatch },

  methods: {
    handleClick() {
      if (!this.empty) {
        const success = this.$clipboard(this.field.value);

        if (success) {
          Nova.success(this.__("Copied to clipboard!"));
        } else {
          Nova.error(this.__("Can't copy to clipboard."));
        }
      }
    }
  },

  computed: {
    empty() {
      return !this.field.value;
    },

    title() {
      return this.empty ? this.__("Empty") : this.__("Copy to clipboard");
    }
  }
};
</script>

<style lang="scss" scoped>
.nova-swatch {
  display: inline-block;
  width: 42px;
  height: 42px;
  border-radius: 11px;
  background-color: #ffffff;

  &.empty {
    border: 2px solid #ccc;
  }

  &:not(.empty) {
    cursor: pointer;
    box-shadow: inset 0 0 2px rgba(0, 0, 0, 0.75);

    &:hover {
      opacity: 0.9;
      outline: none;
    }
  }
}
</style>
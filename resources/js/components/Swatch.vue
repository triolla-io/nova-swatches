<template>
  <div
    class="nova-swatch"
    :class="{ empty }"
    :style="{ backgroundColor: value, width, height }"
    :title="title"
    @click="handleClick"
  >
    <div
      v-if="empty"
      class="vue-swatches__diagonal--wrapper vue-swatches--has-children-centered"
    >
      <div class="vue-swatches__diagonal"></div>
    </div>
  </div>
</template>

<script>
import Vue from "vue";

export default {
  props: {
    value: {
      type: String,
      default: null
    },
    width: {
      type: String,
      default: "42px"
    },
    height: {
      type: String,
      default: "42px"
    }
  },

  methods: {
    handleClick() {
      if (!this.empty) {
        const success = this.$clipboard(this.value);

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
      return !this.value;
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
  border-radius: 27%;
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
<template>
  <CustomDefaultField :field="field" :errors="errors">
    <template slot="field">
      <swatches
        :id="field.name"
        v-model="value"
        v-bind="field.props"
      ></swatches>
    </template>
  </CustomDefaultField>
</template>

<script>
import { FormField, HandlesValidationErrors } from "laravel-nova";
import Swatches from "vue-swatches";
import "vue-swatches/dist/vue-swatches.min.css";
import CustomDefaultField from "./CustomDefaultField";

export default {
  mixins: [FormField, HandlesValidationErrors],

  props: ["resourceName", "resourceId", "field"],

  components: { Swatches, CustomDefaultField },

  methods: {
    /*
     * Set the initial, internal value for the field.
     */
    setInitialValue() {
      this.value = this.field.value || "";
    },

    /**
     * Fill the given FormData object with the field's internal value.
     */
    fill(formData) {
      formData.append(this.field.attribute, this.value || "");
    },

    /**
     * Update the field's internal value.
     */
    handleChange(value) {
      this.value = value;
    }
  }
};
</script>

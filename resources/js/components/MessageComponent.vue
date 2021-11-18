<template>
  <div class="alert alert-success" v-if="message">
    {{ this.message }}
  </div>
</template>

<script>
export default {
  props: ["message"],
  data() {
    return {};
  },
};
</script>

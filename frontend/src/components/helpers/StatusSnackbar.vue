<template>
  <v-snackbar
    v-model="snackbar"
    multi-line
  >
    {{ snackbar_text}}

    <template v-slot:actions>
      <v-btn
        color="red"
        variant="text"
        @click="snackbar = false"
      >
        Close
      </v-btn>
    </template>
  </v-snackbar>
</template>

<script>
export default {
  name: "StatusSnackbar",
  data: () => ({
    snackbar:false,
    snackbar_text: '',

  }),
}
</script>

<style scoped>

</style>

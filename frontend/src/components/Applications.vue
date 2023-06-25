<template>
  <v-data-iterator model-value="applications"   :items="applications" :page="page">
    <template v-slot:header>
      <v-toolbar
        dark
        color="blue darken-3"
        class="mb-1"
      >
        <div class="headline flex-1-1 white--text mr-2">
          Data Iterator with Rows Per Page
        </div>
        <CreateNewApplication :item="applications" />

      </v-toolbar>
    </template>
    <template v-slot:default="{ application }">
      <template
        v-for="(item, i) in applications"
        :key="i"
      >
        <v-card >
          <v-card-title> Application №{{ item.id }}</v-card-title>
          <v-card-text> Description of application: {{ item.description }} </v-card-text>
        </v-card>

        <br>
      </template>
    </template>
  </v-data-iterator>
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
import axios from "axios";
import CreateNewApplication from "@/components/CreateNewApplication";
export default {
  components: {CreateNewApplication},
  data: () => ({
    applications: [],
    page: 1,
    snackbar:false,
    snackbar_text: '',

  }),
  created:function(){
    this.fetchApplications()
  },
  methods: {


    async fetchApplications() {
      try {
        const response = await axios.get("http://localhost:888/dashnoard", {});
        // this.totalPages = Math.ceil(response.data / this.limit)
        this.applications = response.data;
        console.log(response.data)


      } catch (e) {
        console.log(23123)
        this.snackbar_text = "Server is not available";
        this.snackbar = true;
      }
    },
  }
}
</script>

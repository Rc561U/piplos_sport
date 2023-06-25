<template>
  <v-row justify="center">
    <v-dialog
      v-model="dialog"
      persistent
      width="1024"
    >
      <template v-slot:activator="{ props }">
        <v-btn
          color="black"
          variant="elevated"
          v-bind="props"
        >
          Create New Application
        </v-btn>
      </template>
      <v-card>
        <v-card-title>
          <span class="text-h5">New Application</span>

        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row>
              <v-textarea
                bg-color="grey-lighten-2"
                label="Description*"
                hint="Enter description of your application"
                required
                v-model="description"
              ></v-textarea>
            </v-row>
            <v-row>
              <v-file-input
                show-size
                counter
                multiple
                type="file" id="file" ref="file" v-on:change="handleFileUpload()"
                label="File input"
              ></v-file-input>
            </v-row>
            <v-row>
              <v-textarea
                bg-color="grey-lighten-2"
                label="Comment"
                hint="Enter your comment"
                v-model="comment"
              ></v-textarea>
            </v-row>


          </v-container>
          <small>*indicates required field</small>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="blue-darken-1"
            variant="text"
            @click="dialog = false"
          >
            Close
          </v-btn>
          <v-btn
            color="blue-darken-1"
            variant="text"
            @click="sendform"
          >
            Save
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
  <!--  <status-snackbar/>-->
</template>

<script>
import Status_snackbar from "../components/helpers/StatusSnackbar";
import axios from "axios";
import StatusSnackbar from "@/components/helpers/StatusSnackbar";

export default {
  components: {StatusSnackbar},

  data: () => ({
    dialog: false,
    description: '',
    file: [],
    comment: '',
    snackbar: false,
    snackbar_text: '',
  }),
  props: {
    item: Array,
  },
  mounted() {
  },
  methods: {
    handleFileUpload() {
      this.file = this.$refs.file.files[0];
      console.log(this.file)
      this.submitForm()


    },
    submitForm(){
      let formData = new FormData();
      formData.append('file', this.file);

      axios.post('http://localhost:888/upload-application',
        formData,
        {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        }
      ).then(function(data){
        console.log(data.data);
      })
        .catch(function(){
          console.log('FAILURE!!');
        });
    },
    async addNewApplication() {
      try {
        const response = await axios.post("http://localhost:888/create-application", {
          description: this.description,
          file: this.file,
          comment: this.comment
        });
        // this.totalPages = Math.ceil(response.data / this.limit)
        this.applications = response.data;
        console.log(response.data)


      } catch (e) {
        console.log(error)
        this.snackbar_text = "Server is not available";
        this.snackbar = true;
      }
    },
  }
}

</script>

<style scoped>

</style>

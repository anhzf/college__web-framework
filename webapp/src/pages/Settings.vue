<template>
  <v-container fluid>
    <v-card
      class="mx-auto"
      max-width="500"
    >
      <v-toolbar
        color="success"
        dark
      >
        <v-icon>mdi-check</v-icon>
        <v-toolbar-title>
          Terverifikasi
        </v-toolbar-title>
      </v-toolbar>
      <v-list
        class="mx-auto container"
      >
        <v-row>
          <v-col cols="4">
            <v-subheader>Username</v-subheader>
          </v-col>
          <v-col cols="8">
            <v-text-field
              density="comfortable"
              label="Username"
              variant="underlined"
            />
          </v-col>
        </v-row>
        <v-row>
          <v-col cols="4">
            <v-subheader>Email</v-subheader>
          </v-col>
          <v-col cols="8">
            <v-text-field
              density="comfortable"
              label="Email"
              variant="underlined"
              disabled
            />
          </v-col>
        </v-row>
        <v-row justify="center">
          <v-col cols="4">
            <v-subheader>Password</v-subheader>
          </v-col>
          <v-col cols="8">
            <v-dialog
              v-model="dialog"
              persistent
            >
              <template #activator="{ props }">
                <v-btn
                  color="primary"
                  v-bind="props"
                >
                  UBAH PASSWORD
                </v-btn>
              </template>
              <v-card>
                <v-card-title>
                  <span class="text-h5">Ubah Password</span>
                </v-card-title>
                <v-card-text>
                  <v-container>
                    <v-row>
                      <v-col cols="12">
                        <v-text-field
                          label="Password Lama*"
                          type="password"
                          required
                        />
                      </v-col>
                      <v-col cols="12">
                        <v-text-field
                          label="Password Baru*"
                          type="password"
                          required
                        />
                      </v-col>
                      <v-col cols="12">
                        <v-text-field
                          label="Ulangi Password Baru*"
                          type="password"
                          required
                        />
                      </v-col>
                    </v-row>
                  </v-container>
                  <small>*indicates required field</small>
                </v-card-text>
                <v-card-actions>
                  <v-spacer />
                  <v-btn
                    color="blue-darken-1"
                    text
                    @click="dialog = false"
                  >
                    Close
                  </v-btn>
                  <v-btn
                    color="blue-darken-1"
                    text
                    @click="dialog = false"
                  >
                    Save
                  </v-btn>
                </v-card-actions>
              </v-card>
            </v-dialog>
          </v-col>
        </v-row>
      </v-list>
    </v-card>
  </v-container>
</template>
<script>
export default {
  data() {
    return {
      dialog: false,
    };
  },
};
</script>
<style>
.container {
  margin: 20px;
  padding: 20px;
}
</style>

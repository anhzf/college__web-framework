<template>
  <v-container fluid>
    <v-card
      class="mx-auto container"
      max-width="400"
    >
      <v-row justify="space-between">
        <v-col>
          <v-form
            ref="form"
            lazy-validation
          >
            <v-col>
              <h2>Edit Profile</h2>
            </v-col>
            <v-col
              cols="auto"
              justify="space-between"
            >
              <v-text-field
                label="Nama Lengkap"
                :rules="nameRules"
                required
              />
              <v-text-field
                label="Username"
              />
              <v-text-field
                label="Email"
                disabled
              />
              <v-text-field
                v-model="password"
                label="Password Baru"
                type="password"
                :rules="[v => !!v || 'Password harus di isi']"
                required
              />
              <v-btn
                :to="{name:''}"
                color="primary"
              >
                SIMPAN
              </v-btn>
            </v-col>
          </v-form>
        </v-col>
      </v-row>
    </v-card>
  </v-container>
</template>
<script>
export default {
  data: () => ({
    valid: true,
    name: '',
    nameRules: [
      (v) => !!v || 'Harap isi nama Anda',
    ],
  }),
};
</script>
<style>
.container {
  margin: 20px;
  padding: 20px;
}
</style>

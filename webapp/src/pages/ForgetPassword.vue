<template>
  <v-container fluid>
    <v-card
      tag="form"
      class="mx-auto"
      max-width="500"
    >
      <v-row>
        <v-col
          cols="auto"
          sm="12"
          justify="space-between"
        >
          <div class="header">
            <h1>Lupa Password</h1>
          </div>
          <v-text-field
            v-model="fields.email"
            label="Masukkan Email"
            type="email"
            :rules="emailRules"
            required
          />
        </v-col>
      </v-row>
    </v-card>
  </v-container>
</template>

<script setup>

const emailRules = [
  (v) => !!v || 'Harap isi E-mail Anda',
  (v) => /.+@.+\..+/.test(v) || 'E-mail harus valid',
];
</script>

<style>
.header {
  text-align: center;
  font-size: 15px;
}
</style>

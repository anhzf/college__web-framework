<template>
  <v-container fluid>
    <v-card
      class="mx-auto"
      max-width="500"
    >
      <v-row justify="space-between">
        <v-col justify="space-between">
          <v-col
            cols="auto"
            sm="12"
          >
            <div class="header">
              <h1>Sign In</h1>
            </div>
            <v-text-field
              label="Email"
            />
            <v-text-field
              label="Password"
            />
            <v-btn
              :to="{name: 'SignIn'}"
              color="primary"
            >
              Sign In
            </v-btn>
            <p><a href="">Belum punya akun? Klik disini</a></p>
            <p><a href="">Lupa Password?</a></p>
          </v-col>
        </v-col>
      </v-row>
    </v-card>
  </v-container>
</template>
<style>
.header {
  text-align: center;
  font-size: 15px;
}
</style>

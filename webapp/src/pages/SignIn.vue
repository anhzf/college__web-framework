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
            <h1>
              Masuk Member
            </h1>
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
          </v-col>
        </v-col>
      </v-row>
    </v-card>
  </v-container>
</template>

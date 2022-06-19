<template>
  <v-container fluid>
    <v-row>
      <v-col>
        <h1>Kelola Fasilitas</h1>
      </v-col>

      <v-col cols="auto">
        <v-btn
          :to="{name: 'FacilityManagement_Create'}"
          prepend-icon="mdi-plus"
        >
          Fasilitas
        </v-btn>
      </v-col>
    </v-row>
  </v-container>
</template>

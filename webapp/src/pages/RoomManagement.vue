<template>
  <v-container fluid>
    <v-row>
      <v-col>
        <h1>Kelola Ruangan</h1>
      </v-col>

      <v-col cols="auto">
        <v-btn
          :to="{name: 'RoomManagement_Create'}"
          prepend-icon="mdi-plus"
        >
          Ruangan
        </v-btn>
      </v-col>
    </v-row>
  </v-container>
</template>

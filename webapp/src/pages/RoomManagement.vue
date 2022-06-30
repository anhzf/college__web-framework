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

    <v-row>
      <v-col>
        <v-table
          height="70vh"
          fixed-header
        >
          <thead>
            <tr>
              <th>Nama Fasilitas</th>
              <th>Jumlah</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Ruangan Multimedia</td>
              <td>2</td>
              <td>
                <v-btn
                  prepend-icon="mdi-plus"
                  color="success"
                >
                  Tambah
                </v-btn>
                <v-btn
                  prepend-icon="mdi-minus"
                  color="error"
                >
                  Kurang
                </v-btn>
                <v-btn
                  color="primary"
                >
                  Detail
                </v-btn>
              </td>
            </tr>
          </tbody>
        </v-table>
      </v-col>
    </v-row>
  </v-container>
</template>

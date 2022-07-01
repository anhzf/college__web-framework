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

    <v-row>
      <v-col>
        <v-table
          height="70vh"
          fixed-header
          width="50vh"
        >
          <thead>
            <tr>
              <th>Nama Fasilitas</th>
              <th>Jumlah Tersedia</th>
              <th>Letak (Ruangan)</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Router Mikrotik</td>
              <td>20</td>
              <td>Network Administration</td>
              <td>
                <v-btn
                  color="success"
                >
                  Edit
                </v-btn>
                <v-btn
                  prepend-icon="mdi-minus"
                  color="error"
                >
                  Hapus
                </v-btn>
                <v-btn
                  color="primary"
                >
                  Lihat Detail
                </v-btn>
              </td>
            </tr>
          </tbody>
        </v-table>
      </v-col>
    </v-row>
  </v-container>
</template>

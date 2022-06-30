<template>
  <v-container fluid>
    <v-row justify="space-between">
      <v-col>
        <h1>Verifikasi Reservasi</h1>
      </v-col>
    </v-row>
    <!-- <v-row>
      <v-col>
        <v-chip-group
          :model-value="[]"
          column
        >
          <query-chip
            :label="v => `Lab: ${v || 'semua'}`"
            hint="Saring hasil berdasarkan"
            input-label="Nama Laboratorium"
            sortable
          />
          <query-chip
            :label="v => `Penanggung Jawab: ${v || 'semua'}`"
            hint="Saring hasil berdasarkan"
            input-label="Penanggung Jawab"
            sortable
          />
          <query-chip
            :label="v => `Waktu: ${v || 'semua'}`"
            hint="Saring hasil berdasarkan"
            input-label="Waktu"
            sortable
          />
          <query-chip
            :label="v => `Kegiatan: ${v || 'semua'}`"
            hint="Saring hasil berdasarkan"
            input-label="Kegiatan"
            sortable
          />
          <query-chip
            :label="v => `Status: ${v || 'belum lewat'}`"
            hint="Saring hasil berdasarkan"
            input-label="Status"
            sortable
            sort-by="asc"
          />
        </v-chip-group>
      </v-col>
    </v-row> -->

    <v-row>
      <v-col>
        <v-table
          height="70vh"
          fixed-header
        >
          <thead>
            <tr>
              <th>Nama Ruangan/Fasilitas</th>
              <th>Deskripsi Kegiatan</th>
              <th>Waktu dan Tanggal</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Nama Ruangan/Fasilitas</td>
              <td>Deskripsi Kegiatan</td>
              <td>Waktu dan Tanggal</td>
              <td>
                <v-btn
                  depressed
                  color="primary"
                >
                  VERIFIKASI
                </v-btn>
              </td>
            </tr>
            <tr>
              <td>Nama Ruangan/Fasilitas</td>
              <td>Deskripsi Kegiatan</td>
              <td>Waktu dan Tanggal</td>
              <td>
                <v-chip
                  color="success"
                  prepend-icon="mdi-check"
                >
                  TERVERIFIKASI
                </v-chip>
              </td>
            </tr>
          </tbody>
        </v-table>
      </v-col>
    </v-row>
  </v-container>
</template>

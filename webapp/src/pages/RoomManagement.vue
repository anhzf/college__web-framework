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
              <th>Nama Ruangan</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Multimedia Studio A</td>
              <td>
                <v-btn
                  color="primary"
                >
                  Edit
                </v-btn>
                <v-btn
                  prepend-icon="mdi-minus"
                  color="error"
                >
                  Hapus
                </v-btn>
              </td>
            </tr>
            <tr>
              <td>Multimedia Studio B</td>
              <td>
                <v-btn
                  color="primary"
                >
                  Edit
                </v-btn>
                <v-btn
                  prepend-icon="mdi-minus"
                  color="error"
                >
                  Hapus
                </v-btn>
              </td>
            </tr>
            <tr>
              <td>Software Enginering A</td>
              <td>
                <v-btn
                  color="primary"
                >
                  Edit
                </v-btn>
                <v-btn
                  prepend-icon="mdi-minus"
                  color="error"
                >
                  Hapus
                </v-btn>
              </td>
            </tr>
            <tr>
              <td>Software Enginering B</td>
              <td>
                <v-btn
                  color="primary"
                >
                  Edit
                </v-btn>
                <v-btn
                  prepend-icon="mdi-minus"
                  color="error"
                >
                  Hapus
                </v-btn>
              </td>
            </tr>
            <tr>
              <td>Network Administration A</td>
              <td>
                <v-btn
                  color="primary"
                >
                  Edit
                </v-btn>
                <v-btn
                  prepend-icon="mdi-minus"
                  color="error"
                >
                  Hapus
                </v-btn>
              </td>
            </tr>
            <tr>
              <td>Network Administration B</td>
              <td>
                <v-btn
                  color="primary"
                >
                  Edit
                </v-btn>
                <v-btn
                  prepend-icon="mdi-minus"
                  color="error"
                >
                  Hapus
                </v-btn>
              </td>
            </tr>
          </tbody>
        </v-table>
      </v-col>
    </v-row>
  </v-container>
</template>

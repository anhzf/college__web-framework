<template>
  <v-container fluid>
    <v-row>
      <v-col>
        <h1>Kelola Member</h1>
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
              <th>Nama</th>
              <th>Email</th>
              <th>Last Online</th>
              <th>Status Verifikasi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Alviana</td>
              <td>alviana.hermawati1261@gmail.com</td>
              <td>Date</td>
              <td>
                <v-btn
                  color="primary"
                >
                  VERIFIKASI
                </v-btn>
              </td>
            </tr>
            <tr>
              <td>Alviana</td>
              <td>alviana.hermawati1261@gmail.com</td>
              <td>Date</td>
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
<!-- <script lang="ts" setup>
import { nanoid } from 'nanoid';

interface LabReservation {
  id: string;
  labName: string;
  eventDescription: string;
  responsible: string;
  reservedDate: Date;
  reservedTime: number;
}
const labList: LabReservation[] = [
  {
    id: nanoid(),
    labName: 'Software Engineering',
    eventDescription: 'Kuliah Praktikum',
    responsible: 'Rosihan Ari S.Pd',
    reservedDate: new Date('2022-01-01T09:00:00'),
    reservedTime: 2,
  },
  {
    id: nanoid(),
    labName: 'Network Admin',
    eventDescription: 'Kuliah Praktikum',
    responsible: 'Puspanda Hatta S.Pd',
    reservedDate: new Date('2022-05-01T09:00:00'),
    reservedTime: 3,
  },
  {
    id: nanoid(),
    labName: 'Multimedia',
    eventDescription: 'Workshop HMP Mikroptik',
    responsible: 'Krisna Murti',
    reservedDate: new Date('2022-06-18T20:00:00'),
    reservedTime: 6,
  },
];
</script> -->

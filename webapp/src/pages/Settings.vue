<template>
  <v-container fluid>
    <v-card class="mx-auto max-w-screen-sm">
      <v-toolbar :color="auth.isVerified ? 'success' : 'error'">
        <v-app-bar-nav-icon icon="mdi-check" />

        <v-toolbar-title>
          {{ auth.isVerified ? __('Verified') : __('Not Verified') }}
        </v-toolbar-title>

        <v-spacer />

        <v-btn
          v-if="!auth.isVerified"
          variant="tonal"
          @click="onResendVerificationEmailClick"
        >
          Kirim Ulang
        </v-btn>
      </v-toolbar>

      <v-list class="container">
        <v-list-item>
          <v-list-item-header>
            <v-text-field
              :model-value="auth.user?.name"
              label="Username"
              variant="plain"
            />
          </v-list-item-header>
        </v-list-item>

        <v-list-item>
          <v-list-item-header>
            <v-text-field
              :model-value="auth.user?.email"
              label="Email"
              variant="plain"
            />
          </v-list-item-header>
        </v-list-item>

        <v-list-item>
          <v-list-item-header>
            <v-list-item-subtitle>Password</v-list-item-subtitle>
            <div class="py-5">
              <v-dialog
                v-model="dialog"
                persistent
              >
                <template #activator="{ props }">
                  <v-btn
                    color="primary"
                    v-bind="props"
                  >
                    Ubah password
                  </v-btn>
                </template>

                <v-card class="w-screen max-w-xl">
                  <v-card-title>Ubah Password</v-card-title>

                  <v-card-text>
                    <v-text-field
                      label="Password Lama*"
                      type="password"
                      required
                    />
                    <v-text-field
                      label="Password Baru*"
                      type="password"
                      required
                    />
                    <v-text-field
                      label="Ulangi Password Baru*"
                      type="password"
                      required
                    />
                  </v-card-text>

                  <v-card-actions>
                    <v-spacer />
                    <v-btn
                      color="blue-darken-1"
                      text
                      @click="dialog = false"
                    >
                      Close
                    </v-btn>
                    <v-btn
                      color="blue-darken-1"
                      text
                      @click="dialog = false"
                    >
                      Save
                    </v-btn>
                  </v-card-actions>
                </v-card>
              </v-dialog>
            </div>
          </v-list-item-header>
        </v-list-item>

        <v-list-item>
          <v-list-item-header>
            <v-list-item-subtitle>Civitas UNS</v-list-item-subtitle>
            <v-list-item-title v-if="auth.user?.internal_id">
              ({{ auth.user.internal_id }}) ({{ auth.user.is_internal_verified_at ? 'Verified' : 'Not Verified' }})
            </v-list-item-title>
            <v-list-item-title v-else>
              <v-icon>mdi-close</v-icon>
            </v-list-item-title>
          </v-list-item-header>
        </v-list-item>
      </v-list>
    </v-card>
  </v-container>
</template>

<script lang="ts" setup>
import { ref } from 'vue';
import { users } from '../api';
import { useAuthStore } from '../stores/auth';
import { catchErrorAsNotification, notify } from '../utils/ui';

const auth = useAuthStore();
const dialog = ref(false);

auth.refresh();

const onResendVerificationEmailClick = () => catchErrorAsNotification(async () => {
  await users.sendEmailVerification();
  notify.success('Email verifikasi telah dikirim ke alamat email Anda!');
});
</script>

<style>
.container {
  margin: 20px;
  padding: 20px;
}
</style>

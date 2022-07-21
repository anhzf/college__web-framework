<template>
  <v-dialog
    :model-value="modelValue"
    scrollable
    @update:model-value="$emit('update:modelValue', $event)"
  >
    <v-card>
      <v-card-title>Profil Member</v-card-title>

      <v-card-text class="w-full max-w-screen-md h-[60vh]">
        <v-container>
          <v-row>
            <template v-if="userData">
              <v-col cols="12">
                <v-text-field
                  :model-value="userData.name"
                  :label="__('Name')"
                  variant="outlined"
                  readonly
                  hide-details
                />
              </v-col>
              <v-col cols="12">
                <v-text-field
                  :model-value="userData.email"
                  :label="__('Email')"
                  :hint="(isVerified || undefined) && (userData?.verificator ? `Diverifikasi oleh ${userData?.verificator?.name}` : 'Diverifikasi melalui email konfirmasi')"
                  variant="outlined"
                  readonly
                  persistent-hint
                  :append-inner-icon="isVerified ? 'mdi-check-circle' : 'mdi-alert-circle'"
                >
                  <!-- <template #append-inner>
                    <v-icon
                      :icon="isVerified ? 'mdi-check-circle' : 'mdi-alert-circle'"
                      :color="isVerified ? 'success' : 'error'"
                    />
                  </template> -->
                </v-text-field>
              </v-col>
              <v-col cols="12">
                <v-select
                  :model-value="userData.role"
                  :items="UserRoles"
                  :label="__('Role')"
                  variant="outlined"
                  readonly
                  hide-details
                />
              </v-col>
              <v-col cols="12">
                <v-text-field
                  :model-value="userData.internal_id || '-'"
                  :label="__('Organization ID')"
                  :hint="(isInternalMember && userData?.internal_member_verificator && `Diverifikasi oleh ${userData.internal_member_verificator.name}`) || undefined"
                  variant="outlined"
                  readonly
                  persistent-hint
                  :append-inner-icon="isInternalMember ? 'mdi-check-circle' : 'mdi-alert-circle'"
                />
              </v-col>
            </template>

            <template v-else>
              <v-col cols="12">
                <v-progress-circular indeterminate />
              </v-col>
            </template>
          </v-row>
        </v-container>
      </v-card-text>

      <v-divider />

      <v-card-actions>
        <template v-if="userData">
          <v-btn
            :variant="isVerified ? 'text' : 'outlined'"
            :color="isVerified ? undefined : 'primary'"
            :disabled="isVerified"
            @click="onMarkAsVerifiedClick"
          >
            Tandai terverifikasi
          </v-btn>

          <v-btn
            :variant="isInternalMember ? 'text' : 'outlined'"
            :color="isInternalMember ? undefined : 'primary'"
            :disabled="isInternalMember"
            @click="onMarksAsInternalMemberClick"
          >
            Tandai sebagai anggota internal
          </v-btn>
        </template>

        <v-spacer />

        <v-btn
          variant="elevated"
          color="primary"
          @click="closeDialog"
        >
          Tutup
        </v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script lang="ts" setup>
import { computed } from 'vue';
import { admin } from '../../api';
import __ from '../../lang';
import { UserDetails, UserRoles } from '../../types/models';
import { catchErrorAsNotification, notify } from '../../utils/ui';

interface Props {
  modelValue: boolean;
  userData?: admin.WithVerificator<UserDetails>;
}

interface Emits {
  (e: 'update:modelValue', value: boolean): void;
  (e: 'requestRefreshUserData'): void;
}

const props = defineProps<Props>();
const emit = defineEmits<Emits>();

const isVerified = computed(() => !!props.userData?.email_verified_at);
const isInternalMember = computed(() => !!(props.userData?.is_internal || (props.userData?.internal_id && props.userData?.is_internal_verified_at)));

const closeDialog = () => emit('update:modelValue', false);

const onMarkAsVerifiedClick = () => catchErrorAsNotification(async () => {
  if (props.userData) {
    await admin.markUserAsVerified(props.userData.id);
    notify.success(__('User marked as verified'));
    emit('requestRefreshUserData');
  }
});

const onMarksAsInternalMemberClick = () => catchErrorAsNotification(async () => {
  if (props.userData) {
    await admin.markUserAsInternalMember(props.userData.id);
    notify.success(__('User marked as internal member'));
    emit('requestRefreshUserData');
  }
});
</script>

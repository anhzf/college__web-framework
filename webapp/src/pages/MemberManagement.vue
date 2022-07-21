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
              <th class="text-center">
                Last Online
              </th>
              <th class="text-center">
                Aksi
              </th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="el in list"
              :key="el.id"
            >
              <td>
                <div class="flex items-center gap-2">
                  <div>{{ el.name }}</div>
                  <v-icon
                    v-if="el.is_verified"
                    icon="mdi-check-circle"
                    color="success"
                    size="small"
                  />
                </div>
              </td>
              <td class="w-[35ch]">
                <div class="flex items-center gap-x-2">
                  <span>{{ userPool[el.id]?.email || '************' }}</span>
                  <v-btn
                    v-if="!userPool[el.id]?.email"
                    icon
                    variant="text"
                    class="shrink-0"
                    @click="onViewEmailClick(el.id)"
                  >
                    <v-icon
                      icon="mdi-eye"
                      size="small"
                    />
                  </v-btn>
                </div>
              </td>
              <td class="text-center">
                <code>null</code>
              </td>
              <td class="flex justify-end items-center">
                <v-btn
                  prepend-icon="mdi-account-search"
                  variant="flat"
                  color="primary"
                  size="small"
                  @click="onReviewMemberClick(el.id)"
                >
                  Tinjau
                </v-btn>
              </td>
            </tr>
          </tbody>
        </v-table>
      </v-col>
    </v-row>
  </v-container>

  <user-dialog
    v-model="isUserDialogActive"
    :user-data="activeUserDataDialog!"
    @request-refresh-user-data="onRequestRefreshUserData"
  />
</template>

<script lang="ts" setup>
import { useAsyncState } from '@vueuse/core';
import { computed, ref } from 'vue';
import { admin } from '../api';
import { UserDetails } from '../types/models';
import { catchErrorAsNotification } from '../utils/ui';
import UserDialog from './MemberManagement/UserDialog.vue';

type UserKey = number;

const { state: list } = useAsyncState(admin.allUsers(), []);
const userPool = ref<Record<number, admin.WithVerificator<UserDetails>>>({});
const activeUserIdDialog = ref<UserKey>();
const activeUserDataDialog = computed(() => (activeUserIdDialog.value === undefined
  ? undefined : userPool.value[activeUserIdDialog.value]));
const isUserDialogActive = computed<boolean>({
  get: () => !!activeUserDataDialog.value,
  set: (value) => {
    activeUserIdDialog.value = value ? activeUserDataDialog.value?.id : undefined;
  },
});

const getDetails = async (id: UserKey, refresh = false) => catchErrorAsNotification(async () => {
  const user = userPool.value[id];
  if (!refresh && user) {
    return user;
  }

  const details = await admin.getUser(id);
  userPool.value[id] = details;
  return details;
});

const onViewEmailClick = async (id: UserKey) => {
  await getDetails(id);
};

const onReviewMemberClick = async (id: UserKey) => {
  await getDetails(id);
  activeUserIdDialog.value = id;
};

const onRequestRefreshUserData = async () => {
  await getDetails(activeUserIdDialog.value!, true);
};
</script>

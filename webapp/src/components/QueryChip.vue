<template>
  <v-menu
    v-model="isMenuOpen"
    :close-on-content-click="false"
  >
    <template #activator="{props: activatorProps}">
      <v-chip v-bind="activatorProps">
        <span>{{ typeof label === 'string' ? label : label?.(modelValue || '') }}</span>
        <v-btn
          v-if="sortable"
          :icon="_sortBy === 'desc' ? 'mdi-sort-descending' : 'mdi-sort-ascending'"
          variant="plain"
          size="small"
          :class="{'sort-active': !!_sortBy, 'sort-inactive': !_sortBy}"
          @click.stop="onSortByClick"
        />
      </v-chip>
    </template>

    <v-card
      width="35ch"
      density="comfortable"
    >
      <v-card-title />
      <v-card-subtitle>
        Saring hasil berdasarkan
      </v-card-subtitle>
      <v-card-text>
        <v-text-field
          v-model="__modelValue"
          :label="inputLabel"
          :placeholder="inputPlaceholder"
          autofocus
          density="comfortable"
          hide-details
          class="mb-4"
        />
        <!-- :model-value="modelValue"
            @update:model-value="$emit('update:modelValue', $event)" -->
        <v-radio-group
          v-model="__sortBy"
          label="Urutkan"
          column
          hide-details
          density="comfortable"
        >
          <v-radio
            value="asc"
            label="Ascending"
          />
          <v-radio
            value="desc"
            label="Descending"
          />
        </v-radio-group>
      </v-card-text>
      <v-card-actions>
        <v-spacer />
        <v-btn @click="onCancelClick">
          Batal
        </v-btn>
        <v-btn
          color="primary"
          variant="elevated"
          @click="onApplyClick"
        >
          Terapkan
        </v-btn>
      </v-card-actions>
    </v-card>
  </v-menu>
</template>

<script lang="ts" setup>
import { computed, defineProps, ref } from 'vue';

const props = defineProps<{
  label?: string |((v: string) => string);
  hint?: string;
  inputLabel?: string;
  inputPlaceholder?: string;
  modelValue?: string;
  sortable?: boolean;
  sortBy?: 'asc' | 'desc' | null;
}>();

const emit = defineEmits(['update:modelValue', 'update:sortBy']);

const isMenuOpen = ref(false);
const __modelValue = ref(props.modelValue);
const __sortBy = ref(props.sortBy);
const _sortBy = computed({
  get() {
    return props.sortBy || __sortBy.value;
  },
  set(v) {
    if (props.sortBy) {
      emit('update:sortBy', v);
    } else {
      __sortBy.value = v;
    }
  },
});
const onSortByClick = () => {
  emit('update:sortBy', props.sortBy === 'asc' ? 'desc' : 'asc');
  _sortBy.value = _sortBy.value === 'asc' ? 'desc' : 'asc';
};
const onCancelClick = () => {
  __modelValue.value = props.modelValue;
  _sortBy.value = props.sortBy || null;
  isMenuOpen.value = false;
};
const onApplyClick = () => {
  emit('update:modelValue', __modelValue.value);
  emit('update:sortBy', __sortBy.value);
  isMenuOpen.value = false;
};
</script>

<style lang="sass" scoped>
.sort-active
  color: rgba(var(--v-theme-on-background), var(--v-high-emphasis-opacity))

.sort-inactive
  color: rgba(var(--v-theme-on-background), var(--v-disabled-opacity))
</style>

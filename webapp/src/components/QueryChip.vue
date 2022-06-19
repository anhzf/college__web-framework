<template>
  <v-chip>
    <span>{{ typeof label === 'string' ? label : label?.(modelValue || '') }}</span>
    <v-btn
      v-if="sortable"
      :icon="_sortBy === 'desc' ? 'mdi-sort-descending' : 'mdi-sort-ascending'"
      variant="plain"
      size="small"
      :color="_sortBy ? 'white' : 'grey-darken-1'"
      @click.stop="onSortByClick"
    />
    <v-menu
      activator="parent"
      :close-on-content-click="false"
    >
      <v-card width="35ch">
        <template #subtitle>
          Saring hasil berdasarkan
        </template>
        <template #text>
          <v-text-field
            autofocus
            :label="inputLabel"
            :placeholder="inputPlaceholder"
            :model-value="modelValue"
            @update:model-value="$emit('update:modelValue', $event)"
          />
          <v-radio-group
            v-model="_sortBy"
            label="Urutkan"
            column
            hide-details
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
        </template>
      </v-card>
    </v-menu>
  </v-chip>
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
  _sortBy.value = _sortBy.value === 'asc' ? 'desc' : 'asc';
};
</script>

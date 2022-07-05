import { defineStore } from 'pinia';
import { computed, ref } from 'vue';

const LOCALE_DEFAULT = 'id';

const translations = import.meta.glob('./*.ts');

const useTranslations = defineStore('translation', () => {
  const repository = ref<Record<string, Record<string, string>>>({});
  const isReady = ref(false);
  const load = (locale = LOCALE_DEFAULT) => {
    translations[`./${locale}.ts`]().then((translation) => {
      repository.value = {
        ...repository.value,
        [locale]: translation.default,
      };
      isReady.value = true;
    });
  };

  return {
    repository,
    isReady,
    load,
  };
});

const __ = (key: string, locale = LOCALE_DEFAULT) => {
  const tr = useTranslations();
  const translation = computed(() => tr.repository[locale]?.[key] || key);
  return translation.value;
};

export default __;

export {
  useTranslations,
};

import { defineStore } from 'pinia';
import { computed, readonly, ref } from 'vue';

const LOCALE_DEFAULT = 'id';

const translationRepository = import.meta.glob('./*.ts');

const useTranslations = defineStore('translation', () => {
  const repository = ref<Record<string, Record<string, string>>>({});
  const isReady = ref(false);
  const load = (locale = LOCALE_DEFAULT) => {
    translationRepository[`./${locale}.ts`]().then((translation) => {
      repository.value = {
        ...repository.value,
        [locale]: translation.default,
      };
      isReady.value = true;
    });
  };

  return {
    repository: readonly(repository),
    isReady: readonly(isReady),
    load,
  };
});

const __ = (key: string, locale = LOCALE_DEFAULT) => {
  const tr = useTranslations();
  const translation = computed(() => tr.repository[locale]?.[key]
    || tr.repository[locale]?.[key.toLowerCase()]
    || tr.repository[locale]?.[key.toUpperCase()]
    || key);

  debugger;
  return translation.value;
};

export default __;

export {
  useTranslations,
};

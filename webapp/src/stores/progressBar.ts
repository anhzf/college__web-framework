import { defineStore } from 'pinia';

const useProgressBarStore = defineStore('progressBar', {
  state: () => ({
    loaded: 0, // 0 - 1
  }),
});

export default useProgressBarStore;

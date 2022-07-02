import { defineStore } from 'pinia';
import { reactive, readonly, ref } from 'vue';
import { nanoid } from 'nanoid';

const NOTIFICATION_DEFAULT_TIMEOUT = 10000; // ms

export interface NotificationOptions {
  message: string;
  title?: string;
  type?: 'success' | 'error' | 'info';
  timeout?: number | null;
  stretch?: boolean;
  position?: 'start' | 'center' | 'end';
}

interface NotificationState {
  id: string;
  opts: NotificationOptions;
  modelValue: boolean;
  'onUpdate:modelValue': (value: boolean) => void;
  props: any;
}

const useNotificationAlertsStore = defineStore('notificationAlerts', () => {
  const notifications = ref<NotificationState[]>([]);
  const notify = (options: NotificationOptions) => {
    const id = nanoid();

    notifications.value.push({
      id,
      opts: options,
      modelValue: true,
      // eslint-disable-next-line func-names
      'onUpdate:modelValue': (v) => {
        if (!v) {
          const notificationIdx = notifications.value.findIndex((n) => n.id === id);
          if (notificationIdx !== 1) {
            if (options.timeout === null) {
              const notification = notifications.value[notificationIdx];
              notification.modelValue = false;
              notifications.value.splice(notificationIdx, 1, notification);
            }

            notifications.value.splice(notificationIdx, 1);
          }
        }
      },
      // Props are used to pass data to the notification component
      get props() {
        return {
          text: this.opts.message,
          modelValue: this.modelValue,
          title: this.opts.title,
          color: this.opts.type,
          class: {
            'self-stretch': this.opts.stretch,
            'self-start': this.opts.position === 'start',
            'self-center': this.opts.position === 'center',
            'self-right': this.opts.position === 'end',
          },
          'onUpdate:modelValue': this['onUpdate:modelValue'],
          onVnodeMounted: () => {
            if (this.opts.timeout !== null) {
              setTimeout(
                () => this['onUpdate:modelValue'](false),
                this.opts.timeout || NOTIFICATION_DEFAULT_TIMEOUT,
              );
            }
          },
        };
      },
    });
  };

  return {
    notifications: readonly(notifications),
    notify,
  };
});

export default useNotificationAlertsStore;

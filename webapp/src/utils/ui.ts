import useNotificationAlertsStore, { NotificationOptions } from '../stores/notificationAlerts';
import type { AnyTypedFn } from './types';

export const notify = (opts: string | NotificationOptions) => {
  const store = useNotificationAlertsStore();
  const options = typeof opts === 'string' ? { message: opts } : opts;
  return store.notify(options);
};

const ERROR_NOTIFICATION_DEFAULT_TIMEOUT = 15000;

export const errorAsNotification = (e: Error) => notify({
  title: (e as any)?.title || 'Uh-oh! Something went wrong!',
  message: e.message,
  type: 'error',
  timeout: ERROR_NOTIFICATION_DEFAULT_TIMEOUT,
});

export const catchErrorAsNotification = <R = void, T = [], Fn extends AnyTypedFn<R, T> = AnyTypedFn<R, T>>(fn: Fn) => {
  try {
    return fn();
  } catch (e) {
    return errorAsNotification(e as Error);
  }
};

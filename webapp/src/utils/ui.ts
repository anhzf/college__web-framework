import useNotificationAlertsStore, { NotificationOptions } from '../stores/notificationAlerts';
import type { AnyTypedFn } from './types';

const createNotification = (data: string | NotificationOptions) => {
  const store = useNotificationAlertsStore();
  const options = typeof data === 'string' ? { message: data } : data;
  return store.notify(options);
};

const createNotificationVariant = (baseOpts: Partial<NotificationOptions>) => (data: string | NotificationOptions) => createNotification({
  ...baseOpts,
  ...typeof data === 'string' ? { message: data } : data,
});

const notify = Object.assign(createNotification, {
  success: createNotificationVariant({ type: 'success' }),
  error: createNotificationVariant({ type: 'error' }),
  info: createNotificationVariant({ type: 'info' }),
});

const ERROR_NOTIFICATION_DEFAULT_TIMEOUT = 15000;

const errorAsNotification = (e: Error, opts: Partial<NotificationOptions> = {}) => notify.error({
  title: (e as any)?.title || 'Uh-oh! Something went wrong!',
  message: e.message,
  timeout: ERROR_NOTIFICATION_DEFAULT_TIMEOUT,
  ...opts,
});

const catchErrorAsNotification = <R = void, T = [], Fn extends AnyTypedFn<R, T> = AnyTypedFn<R, T>>(fn: Fn) => {
  try {
    return fn();
  } catch (e) {
    return errorAsNotification(e as Error);
  }
};

export {
  notify,
  errorAsNotification,
  catchErrorAsNotification,
};

import { AxiosError } from 'axios';
import __ from '../lang';
import useNotificationAlertsStore, { NotificationOptions } from '../stores/notificationAlerts';
import useProgressBarStore from '../stores/progressBar';
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

let nextErrorIsSilent = false;

const notify = Object.assign(createNotification, {
  success: createNotificationVariant({ type: 'success' }),
  error: createNotificationVariant({ type: 'error' }),
  info: createNotificationVariant({ type: 'info' }),
});

const ERROR_NOTIFICATION_DEFAULT_TIMEOUT = 15000;

const errorAsNotification = (e: Error, opts: Partial<NotificationOptions> = {}) => {
  if (nextErrorIsSilent) {
    nextErrorIsSilent = false;
    return undefined;
  }

  const title = ((e instanceof AxiosError && e.response?.data.message)
    || ((e as any)?.title || `Uh-oh! ${__('something went wrong')}!`));
  const message = ((e as any)?.message || e.toString());

  return notify.error({
    title: __(title),
    message: __(message),
    timeout: ERROR_NOTIFICATION_DEFAULT_TIMEOUT,
    ...opts,
  });
};

const silentNextErrorNotifcation = () => {
  nextErrorIsSilent = true;
};

const catchErrorAsNotification = <T, R = void, Fn extends AnyTypedFn<R, T> = AnyTypedFn<R, T>>(fn: Fn) => {
  try {
    const r = fn();
    // return (r instanceof Promise
    //   ? r.then((v) => {
    //     debugger;
    //     return v;
    //   }).catch((e) => {
    //     debugger;
    //     return errorAsNotification(e);
    //   })
    //   : r) as R;
    return (r instanceof Promise
      ? r.catch(errorAsNotification)
      : r) as R;
  } catch (e) {
    // debugger;
    return errorAsNotification(e as Error);
  }
};

const catchErrorAsNotificationFn = <T, R = void, Fn extends AnyTypedFn<R, T> = AnyTypedFn<R, T>>(fn: Fn) => (...args: T[]) => (
  catchErrorAsNotification(() => fn(...args))
);

const setProgressBar = (progress: number) => {
  const store = useProgressBarStore();
  store.loaded = progress;
};

const progressBar = Object.assign(setProgressBar, {
  start: () => setProgressBar(-1),
  stop: () => setProgressBar(0),
});

export {
  notify,
  errorAsNotification,
  catchErrorAsNotification,
  catchErrorAsNotificationFn,
  silentNextErrorNotifcation,
  progressBar,
};

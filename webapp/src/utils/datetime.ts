import { Temporal } from '@js-temporal/polyfill';

export const isOnProgress = (date: Date, long = 1) => {
  const now = Temporal.Now.instant();
  const start = date.toTemporalInstant();
  const end = start.add({ hours: long });
  return Temporal.Instant.compare(now, start) >= 0 && Temporal.Instant.compare(now, end) <= 0;
};

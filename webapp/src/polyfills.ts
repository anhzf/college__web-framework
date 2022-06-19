import { toTemporalInstant } from '@js-temporal/polyfill';

declare global {
  interface Date {
    toTemporalInstant: typeof toTemporalInstant;
  }
}

// eslint-disable-next-line no-extend-native
Date.prototype.toTemporalInstant = toTemporalInstant;

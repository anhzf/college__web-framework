import {
  Reservable, ReservableRaw, Reservation, ReservationDetails, ReservationDetailsRaw, ReservationRaw,
} from '../types/models';
import { fromTimestampsRaw } from './helpers';
import { fromRaw as fromRawUser } from './users';

const fromRawReservable = (data: ReservableRaw): Reservable => ({
  ...data,
  id: String(data.id),
});

const fromRaw = (data: ReservationRaw<ReservableRaw>): Reservation<Reservable> => ({
  ...data,
  start: new Date(data.start),
  user: fromRawUser(data.user),
  reservable: fromRawReservable(data.reservable),
});

const fromRawDetails = (data: ReservationDetailsRaw<ReservableRaw>): ReservationDetails<Reservable> => ({
  ...data,
  ...fromRaw(data),
  ...fromTimestampsRaw(data),
  approval_assignee: data.approval_assignee ? fromRawUser(data.approval_assignee) : null,
});

export {
  fromRawReservable,
  fromRaw,
  fromRawDetails,
};

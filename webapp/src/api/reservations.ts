import {
  Reservable, ReservableRaw, Reservation, ReservationDetails, ReservationDetailsRaw, ReservationRaw,
} from '../types/models';
import http from '../utils/http';
import { fromTimestampsRaw } from './helpers';
import { APIResponseBody } from './types';
import { fromRaw as fromRawUser } from './users';

const ENDPOINT = '/reservations';

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

const all = async () => {
  const { data } = await http.get<APIResponseBody<ReservationRaw<ReservableRaw>[]>>(ENDPOINT);
  return data.data.map(fromRaw);
};

export {
  fromRawReservable,
  fromRaw,
  fromRawDetails,
  all,
};

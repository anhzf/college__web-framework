import http from '../utils/http';
import type { APIResponseBody } from './types';
import type {
  ReservableRaw, ReservationRaw, User, UserDetails, UserDetailsRaw, UserRaw,
} from '../types/models';
import { hasToken } from './auth';
import { fromRaw as fromRawReservation } from './reservations';

enum Endpoint {
  CurrentUser = '/user',
  MyReservations = '/user/reservations',
}

const fromRaw = (data: UserRaw): User => data;

const fromRawDetails = (data: UserDetailsRaw): UserDetails => ({
  ...data,
  ...fromRaw(data),
  email_verified_at: data.email_verified_at ? new Date(data.email_verified_at) : null,
  is_internal: data.is_internal === 1,
  is_internal_verified_at: data.is_internal_verified_at ? new Date(data.is_internal_verified_at) : null,
  created_at: new Date(data.created_at),
  updated_at: new Date(data.updated_at),
});

const getCurrentUser = async () => {
  if (!hasToken()) return null;
  const { data } = await http.get<APIResponseBody<UserDetailsRaw>>(Endpoint.CurrentUser);
  return fromRawDetails(data.data);
};

/**
 * @todo Implements API Backend
 */
const getMyReservations = async () => {
  if (!hasToken()) return { message: null, data: [] };
  const { data } = await http.get<APIResponseBody<ReservationRaw<ReservableRaw>[]>>(Endpoint.MyReservations);
  return {
    ...data,
    data: data.data.map(fromRawReservation),
  };
};

export {
  fromRaw,
  fromRawDetails,
  getCurrentUser,
  getMyReservations,
};

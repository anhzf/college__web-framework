import http from '../utils/http';
import type { APIResponseBody } from './types';
import type {
  ReservableRaw, ReservationRaw, User, UserDetails, UserDetailsRaw, UserRaw,
} from '../types/models';
import { hasToken } from './auth';
import { fromRaw as fromRawReservation } from './reservations';
import router from '../router';

enum Endpoint {
  CurrentUser = '/user',
  MyReservations = '/user/reservations',
  SendEmailVerification = '/user/verify',
  Entity = '/users',
}

const fromRaw = (data: UserRaw): User => data;

const fromRawDetails = (data: UserDetailsRaw): UserDetails => ({
  ...fromRaw(data) as UserDetails,
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

const getMyReservations = async () => {
  if (!hasToken()) return { message: null, data: [] };
  const { data } = await http.get<APIResponseBody<ReservationRaw<ReservableRaw>[]>>(Endpoint.MyReservations);
  return {
    ...data,
    data: data.data.map(fromRawReservation),
  };
};

const sendEmailVerification = async () => {
  if (hasToken()) {
    const params = new URLSearchParams({
      authenticate_url: `${window.location.origin}${router.resolve({ name: 'SignIn' }).path}`,
    });

    await http.get<APIResponseBody>(Endpoint.SendEmailVerification, { params });
  }
};

const verify = async (url: string) => {
  if (hasToken()) {
    await http.get<APIResponseBody>(url);
  }
};

export {
  fromRaw,
  fromRawDetails,
  getCurrentUser,
  getMyReservations,
  sendEmailVerification,
  verify,
};

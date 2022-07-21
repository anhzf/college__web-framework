import {
  User, UserDetails, UserDetailsRaw, UserRaw,
} from '../types/models';
import http from '../utils/http';
import type { APIResponseBody, ResourceChangeAPIResponseBody } from './types';
import { fromRaw as userFromRaw, fromRawDetails as userFromRawDetails } from './users';

const BASE_ENDPOINT = '/admin';

enum Endpoint {
  UserEntity = '/users/{param}',
  MarkVerified = '/users/{param}/mark-verified',
  MarkInternal = '/users/{param}/mark-internal',
  AcceptReservation = '/reservations/{param}/accept',
  RejectReservation = '/reservations/{param}/reject',
}

const endpoint = (path: `${Endpoint}${string}`, param?: User['id']) => {
  const pathWithParam = path.replace('{param}', param === undefined ? '' : param.toString());
  const fullPath = `${BASE_ENDPOINT}${pathWithParam}`;
  return fullPath.endsWith('/') ? fullPath.slice(0, -1) : fullPath;
};

interface UserInList extends User {
  is_verified: boolean;
}

type WithVerificator<T> = T & {
  verificator: {
    id: number;
    name: string;
  } | null;
  internal_member_verificator: {
    id: number;
    name: string;
  } | null;
}

interface UserInListRaw extends UserRaw {}

const allUsers = async () => {
  const { data } = await http.get<APIResponseBody<UserInListRaw[]>>(endpoint(Endpoint.UserEntity));
  return data.data.map(userFromRaw) as UserInList[];
};

const getUser = async (id: number) => {
  const { data } = await http.get<APIResponseBody<WithVerificator<UserDetailsRaw>>>(endpoint(Endpoint.UserEntity, id));
  return userFromRawDetails(data.data) as WithVerificator<UserDetails>;
};

const markUserAsVerified = async (id: number) => {
  await http.post<ResourceChangeAPIResponseBody>(endpoint(Endpoint.MarkVerified, id));
};

const markUserAsInternalMember = async (id: number) => {
  await http.post<ResourceChangeAPIResponseBody>(endpoint(Endpoint.MarkInternal, id));
};

const verifyReservation = async (id: number, status: boolean) => {
  await http.post<ResourceChangeAPIResponseBody>(endpoint(status ? Endpoint.AcceptReservation : Endpoint.RejectReservation, id));
};

export {
  allUsers,
  getUser,
  markUserAsVerified,
  markUserAsInternalMember,
  verifyReservation,
};

export type {
  WithVerificator,
};

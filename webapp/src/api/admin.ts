import {
  User, UserDetails, UserDetailsRaw, UserRaw,
} from '../types/models';
import http from '../utils/http';
import type { APIResponseBody, ResourceChangeAPIResponseBody } from './types';
import { fromRaw as userFromRaw, fromRawDetails as userFromRawDetails } from './users';

const BASE_ENDPOINT = '/admin';

enum Endpoint {
  UserEntity = '/users/{user}',
  MarkVerified = '/users/{user}/mark-verified',
  MarkInternal = '/users/{user}/mark-internal',
}

const endpoint = (path: `${Endpoint}${string}`, param?: User['id']) => {
  const pathWithParam = path.replace('{user}', param === undefined ? '' : param.toString());
  return `${BASE_ENDPOINT}${pathWithParam}`;
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

export {
  allUsers,
  getUser,
  markUserAsVerified,
  markUserAsInternalMember,
};

export type {
  WithVerificator,
};

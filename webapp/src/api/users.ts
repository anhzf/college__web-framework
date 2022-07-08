import http from '../utils/http';
import type { APIResponseBody } from './types';
import type { APIRaw, UserDetails } from '../types/models';
import { hasToken } from './auth';

enum Endpoint {
  CurrentUser = '/user',
}

const fromRaw = (data: APIRaw<UserDetails>): UserDetails => ({
  ...data,
  email_verified_at: data.email_verified_at ? new Date(data.email_verified_at) : null,
  is_internal: data.is_internal === 1,
  is_internal_verified_at: data.is_internal_verified_at ? new Date(data.is_internal_verified_at) : null,
  created_at: new Date(data.created_at),
  updated_at: new Date(data.updated_at),
});

type CurrentUserResponseData = APIRaw<UserDetails>;

const getCurrentUser = async () => {
  if (!hasToken()) return null;

  const { data } = await http.get<APIResponseBody<CurrentUserResponseData>>(Endpoint.CurrentUser);
  return fromRaw(data.data);
};

export {
  fromRaw,
  getCurrentUser,
};

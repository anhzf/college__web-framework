import http from '../utils/http';
import type { APIResponseBody } from './types';
import type { User } from '../types/models';
import { hasToken } from './auth';

enum Endpoint {
  CurrentUser = '/user',
}

type CurrentUserResponseData = User;

const getCurrentUser = async () => {
  if (!hasToken()) return null;

  const { data } = await http.get<APIResponseBody<CurrentUserResponseData>>(Endpoint.CurrentUser);
  return data.data;
};

export {
  getCurrentUser,
};

import http from '../utils/http';
import type { APIResponse } from './types';
import type { User } from '../types/models';

enum Endpoint {
  CurrentUser = '/user',
}

type CurrentUserResponseData = User;

const getCurrentUser = async () => {
  const { data } = await http.get<null, APIResponse<CurrentUserResponseData>>(Endpoint.CurrentUser);
  return data;
};

export {
  getCurrentUser,
};

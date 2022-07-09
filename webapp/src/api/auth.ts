import http from '../utils/http';
import type { UserDetails } from '../types/models';
import type { APIResponseBody } from './types';
import router from '../router';

const TOKEN_STORAGE_KEY = 'auth-token';

enum Endpoint {
  SignIn = '/signin',
  SignUp = '/signup',
  SignOut = '/signout',
  Authenticate = '/authenticate',
}

const getToken = () => localStorage.getItem(TOKEN_STORAGE_KEY) || sessionStorage.getItem(TOKEN_STORAGE_KEY);
const setToken = (token = getToken(), remember = false) => {
  if (token) {
    http.defaults.headers.common.Authorization = `Bearer ${token}`;
    (remember ? localStorage : sessionStorage)
      .setItem(TOKEN_STORAGE_KEY, token);
  }
};
const revokeToken = () => {
  delete http.defaults.headers.common.Authorization;
  sessionStorage.removeItem(TOKEN_STORAGE_KEY);
  localStorage.removeItem(TOKEN_STORAGE_KEY);
};
const hasToken = () => !!getToken();

interface SignInPayload {
  email: string;
  password: string;
}

interface SignInResponseData {
  user: UserDetails;
  token: string;
}

const signIn = async (payload: SignInPayload, remember = false) => {
  const { data: { data } } = await http.post<APIResponseBody<SignInResponseData>>(Endpoint.SignIn, payload);
  setToken(data.token, remember);
  return data.user;
};

interface SignUpPayload {
  name: string;
  email: string;
  password: string;
  password_confirmation: string;
  internal_id?: string;
  internal_idcard_file?: File;
}

interface SignUpResponseData {
  username: string;
  token: string;
}

const signUp = async (payload: SignUpPayload) => {
  const formData = new FormData();
  Object.entries(payload).forEach(([key, value]) => {
    if (value instanceof File) {
      formData.append(key, value, value.name);
    } else if (value) {
      formData.append(key, value || null);
    }
  });
  const params = new URLSearchParams({
    authenticate_url: `${window.location.origin}${router.resolve({ name: 'SignIn' }).path}`,
  });
  const { data } = await http.post<APIResponseBody<SignUpResponseData>>(Endpoint.SignUp, formData, { params });
  const { token } = data.data;

  setToken(token);
};

const signOut = async () => {
  await http.get(Endpoint.SignOut);
  revokeToken();
};

const authenticate = async () => {
  setToken();
  await http.get(Endpoint.Authenticate);
};

setToken();

export {
  signIn,
  signUp,
  signOut,
  authenticate,
  revokeToken,
  hasToken,
};

export type {
  SignInPayload,
  SignUpPayload,
};

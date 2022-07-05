import { AxiosResponse } from 'axios';

export interface APIResponseBody<T> {
  data: T;
  message: string | null;
}

export type APIResponse<T> = AxiosResponse<APIResponseBody<T>>;

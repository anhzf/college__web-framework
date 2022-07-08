import {
  Room, RoomRaw, RoomDetails, RoomDetailsRaw,
} from '../types/models';
import http from '../utils/http';
import { fromTimestampsRaw, paginate } from './helpers';
import type { APIResponseBody, Paginate } from './types';

const ENDPOINT = '/rooms';

const fromRaw = (data: RoomRaw): Room => data;

const fromRawDetails = (data: RoomDetailsRaw): RoomDetails => ({
  ...data,
  ...fromTimestampsRaw(data),
});

const all = async () => {
  const params = new URLSearchParams({ all: 'true' });
  const { data } = await http.get<APIResponseBody<Room[]>>(ENDPOINT, { params });
  return {
    ...data,
    data: data.data.map(fromRaw),
  };
};

const list = async () => {
  const { data } = await http.get<Paginate<RoomRaw>>(ENDPOINT);
  const paginator = paginate(data, new URL(`${http.defaults.baseURL}${ENDPOINT}`), fromRaw);
  return paginator;
};

export {
  fromRaw,
  fromRawDetails,
  all,
  list,
};

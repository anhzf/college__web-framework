import {
  Room, RoomReservation, RoomReservationDetails, RoomReservationRaw,
} from '../types/models';
import http from '../utils/http';
import {
  APIResponseBody, Paginate, Pagination, ResourceChangeAPIResponseBody,
} from './types';
import { fromRaw as roomFromRaw } from './rooms';
import { paginate } from './helpers';

const ENDPOINT = '/reservations/rooms';

const fromRaw = (data: RoomReservationRaw): RoomReservation => ({
  ...data,
  start: new Date(data.start),
  reservable: roomFromRaw(data.reservable as Room),
});

const all = async () => {
  const params = new URLSearchParams({ all: 'true' });
  const { data } = await http.get<APIResponseBody<RoomReservationRaw[]>>(ENDPOINT, { params });
  return {
    ...data,
    data: data.data.map(fromRaw),
  };
};

const list = async () => {
  const { data } = await http.get<Paginate<RoomReservationRaw>>(ENDPOINT);
  const paginator = paginate(data, new URL(`${http.defaults.baseURL}${ENDPOINT}`), fromRaw) as Pagination<RoomReservation>;
  return paginator;
};

type CreatePayload = Pick<RoomReservationDetails, 'start' | 'long' | 'description_short' | 'description'> & {
  room_id: number;
};

const create = async (payload: CreatePayload) => {
  const { data } = await http.post<ResourceChangeAPIResponseBody>(ENDPOINT, payload);
  return data.data;
};

const remove = async (id: number) => {
  const { data } = await http.delete<ResourceChangeAPIResponseBody>(`${ENDPOINT}/${id}`);
  return data.data;
};

export {
  fromRaw,
  all,
  list,
  create,
  remove,
};

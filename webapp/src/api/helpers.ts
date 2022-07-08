import type { Timestamps, TimestampsRaw } from '../types/models';
import { removeSearchParams } from '../utils/transform';
import type { Paginate, Pagination } from './types';

// export const toTimestampsRaw = (date: Date): string => date.toISOString().split('.')[0];

export const fromTimestampsRaw = (tt: TimestampsRaw): Timestamps => ({
  created_at: new Date(tt.created_at),
  updated_at: new Date(tt.updated_at),
});

export const paginate = <R, M>(paginable: Paginate<R>, endpoint: URL, dataMapper: (raw: R) => M): Pagination<M> => {
  if (Array.isArray(paginable)) {
    endpoint.searchParams.set('page', '1');
    return {
      data: paginable.map(dataMapper),
      current_page: 1,
      first_page_url: endpoint.toString(),
      from: 1,
      last_page: 1,
      last_page_url: endpoint.toString(),
      next_page_url: null,
      links: [],
      path: removeSearchParams(new URL(endpoint)).toString(),
      per_page: paginable.length,
      prev_page_url: null,
      to: paginable.length,
      total: paginable.length,
    };
  }

  paginable.data = paginable.data.map(dataMapper) as unknown as R[];
  return (paginable as unknown as Pagination<M>);
};

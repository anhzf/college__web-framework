export interface APIResponseBody<T> {
  data: T;
  message: string | null;
}

export interface PaginationLink {
  url: string | null;
  label: string;
  active: boolean;
}

export interface Pagination<T> {
  current_page: number;
  data: T[];
  first_page_url: string;
  from: number;
  last_page: number;
  last_page_url: string;
  next_page_url: string | null;
  links: PaginationLink[];
  path: string;
  per_page: number;
  prev_page_url: string | null;
  to: number;
  total: number;
}

export const getMode = ['slim', 'default', 'paginate'] as const;

export type GetMode = typeof getMode[number];

export type ColsParams<T> = (keyof T)[];

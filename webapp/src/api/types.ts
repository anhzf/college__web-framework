export interface APIResponseBody<T = null> {
  data: T;
  message: string | null;
}

export interface ResourceChangeAPIResponseBody extends APIResponseBody<{id: string}> {
  errors: Record<string, string[]>;
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

export type Paginate<T> = Pagination<T> | T[];

export type ColsParams<T> = (keyof T)[];

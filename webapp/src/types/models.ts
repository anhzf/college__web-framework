export type APIRaw<T> = {
  [k in keyof T]: (T[k] extends Date
    ? string
    : (T[k] extends boolean
      ? number
      : T[k]));
}

export type Timestamps = {
  created_at: Date;
  updated_at: Date;
}

export type TimestampsRaw = {
  created_at: string;
  updated_at: string;
}

export type WithTimestampsRaw<T extends Timestamps> = Omit<T, 'created_at' | 'updated_at'> & {
  created_at: string;
  updated_at: string;
};

export const UserRoles = ['member', 'admin'] as const;

export type UserRole = typeof UserRoles[number];

export interface User {
  id: number;
  name: string;
}

export interface UserRaw extends User {}

export interface UserDetails extends User {
  email: string;
  role: UserRole;
  email_verified_at: Date | null;
  verified_by_id: number | null;
  internal_id: boolean;
  is_internal: boolean;
  is_internal_verified_by_id: number | null;
  is_internal_verified_at: Date | null;
  created_at: Date;
  updated_at: Date;
}

export interface UserDetailsRaw extends Omit<WithTimestampsRaw<UserDetails>, 'email_verified_at' | 'is_internal' | 'is_internal_verified_at'> {
  is_internal: 0 | 1;
  email_verified_at: string | null;
  is_internal_verified_at: string | null;
}

export interface Price {
  id: string;
  label: string;
  price_start: number;
  price_per_hour: number | null;
}

export interface PriceRaw extends Price {}

export interface PriceDetails extends Price {
  created_at: Date;
  updated_at: Date;
}

export interface PriceDetailsRaw extends WithTimestampsRaw<PriceDetails> {}

export interface Room {
  id: number;
  name: string;
  photos: string[];
}

export interface RoomRaw extends Room {}

export interface RoomDetails extends Room {
  description: string | null;
  added_by: User;
  prices: Price[];
  created_at: Date;
  updated_at: Date;
}

export interface RoomDetailsRaw extends WithTimestampsRaw<RoomDetails> {}

export const ReservationStatuses = ['pending', 'approved', 'rejected', 'cancelled'] as const;

export type ReservationStatus = typeof ReservationStatuses[number];

export interface Reservable {
  id: number | string;
  name: string;
}

export interface ReservableRaw extends Reservable {}

export interface Reservation<TReservable extends Reservable> {
  id: number;
  start: Date;
  long: number | null;
  qty: number | null;
  description_short: string;
  status: ReservationStatus;
  reservable: TReservable;
  user: User;
  billed_amount: number | null;
}

export interface ReservationRaw<TReservable extends ReservableRaw> extends Omit<Reservation<TReservable>, 'start'> {
  start: string;
  user: UserRaw;
}

export interface ReservationDetails<TReservable extends Reservable> extends Reservation<TReservable> {
  description: string | null;
  approval_assignee: User | null;
  created_at: Date;
  updated_at: Date;
}

export interface ReservationDetailsRaw<TReservable extends ReservableRaw>
  extends WithTimestampsRaw<ReservationDetails<TReservable> & ReservationRaw<TReservable>> {
  approval_assignee: UserRaw | null;
}

export interface RoomReservation extends Reservation<Pick<Room, 'id' | 'name'>> {}

export interface RoomReservationRaw extends ReservationRaw<Pick<Room, 'id' | 'name'>> {}

export interface RoomReservationDetails extends ReservationDetails<Pick<Room, 'id' | 'name'>> {}

export interface RoomReservationDetailsRaw extends ReservationDetailsRaw<Pick<Room, 'id' | 'name'>> {}

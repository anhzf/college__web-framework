export type APIRaw<T> = {
  [k in keyof T]: (T[k] extends Date
    ? string
    : (T[k] extends boolean
      ? number
      : T[k]));
}

export const UserRoles = ['member', 'admin'] as const;

export type UserRole = typeof UserRoles[number];

export interface User {
  id: number;
  name: string;
  email: string;
  password?: string;
  role: UserRole;
  email_verified_at?: Date;
  is_internal: boolean;
}

export interface Room {
  id: number;
  name: string;
  description: string | null;
  photos: string[];
  added_by: {
    id: number;
    name: string;
  };
}

export const RoomReservationStatuses = ['pending', 'approved', 'rejected', 'cancelled'] as const;

export type RoomReservationStatus = typeof RoomReservationStatuses[number];

export interface RoomReservation {
  id: number;
  start: Date;
  reservable_type: string;
  reservable_id: number;
  long: number | null;
  qty: number | null;
  description_short: string;
  description: string | null;
  user_id: number;
  status: RoomReservationStatus;
  approval_assigned_by_id: number | null;
  approval_assigned_at: Date | null;
  created_at: Date;
  updated_at: Date;
}

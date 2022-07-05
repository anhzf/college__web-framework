export const UserRoles = ['member', 'admin'] as const;

export type UserRole = typeof UserRoles[number];

export interface User {
  id: number;
  name: string;
  email: string;
  password?: string;
  role: UserRole;
  email_verified_at?: Date;
}

import { ComponentPublicInstance } from 'vue';

export type AnyTypedFn<Return, Params extends [] = []> = (...params: Params) => Return;

export type ComponentProps<T extends new (...args: any[]) => ComponentPublicInstance> = InstanceType<T>['$props']
  & InstanceType<T>['$attrs'];

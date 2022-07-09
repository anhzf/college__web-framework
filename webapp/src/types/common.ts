import { defineComponent } from 'vue';

export type AnyTypedFn<Return, Params extends [] = []> = (...params: Params) => Return;

export type ComponentProps<T extends ReturnType<typeof defineComponent>> = InstanceType<T>['$props'];

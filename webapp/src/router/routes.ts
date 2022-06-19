import { RouteRecordRaw } from 'vue-router';

const routes: RouteRecordRaw[] = [
  {
    path: '/',
    component: () => import('../pages/Home.vue'),
  },
  {
    path: '/lab/reservation',
    component: () => import('../pages/LabReservationList.vue'),
  },
];

export default routes;

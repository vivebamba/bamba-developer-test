import Router from 'vue-router'
import Vue from 'vue'

Vue.use(Router);

const router =  new Router({
    scrollBehavior() {
        return window.scrollTo({ top: 0, behavior: 'smooth' });
    },
    mode: 'history',
    routes: [

        {
            path: '/',
            name: 'auditoriums',
            component: () => import('../views/auditoriums/index.vue'),
        },
        {
            path: '/booking',
            name: 'booking',
            props: true,
            component: () => import('../views/booking/index.vue'),
        },
        {
            path: '/booking-detail',
            name: 'booking-detail',
            props: true,
            component: () => import('../views/booking/showBooking.vue'),
        },
    ]
});

export default router;
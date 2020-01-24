import store from './store'
import VueRouter from 'vue-router';
import LoginComponent from './components/Login.vue';
import RegisterComponent from './components/Register.vue';
import BooksComponent from './components/Books.vue';
import PublishBookComponent from './components/PublishBook.vue';

let routes = [{
        path: '/',
        component: BooksComponent
    },
    {
        path: '/login',
        name: 'login',
        component: LoginComponent
    },
    {
        path: '/register',
        name: 'register',
        component: RegisterComponent
    },
    {
        path: '/publish-book',
        component: PublishBookComponent,
        meta: {
            middlewareAuthor: true
        }
    }
];
const router = new VueRouter({
    routes
});

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.middlewareAuthor)) {
        if (!store.state.auth.status.loggedIn || store.state.auth.user.is_author!==1) {
            next({
                path: '/',
                query: {
                    redirect: to.fullPath
                }
            });

            return;
        }
    }

    next();
})

export default router;

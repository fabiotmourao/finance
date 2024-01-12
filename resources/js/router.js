import { createRouter, createWebHistory } from "vue-router";


const routes = [
    {
        path: "/",
        name: "Home",
        component: () => import('./pages/home.vue'),
    },
    {
        path: "/dashboard",
        name: "Dashboard",
        component: () => import('./pages/Dashboard/dashboard.vue'),
        children: [
            {
                path: "/test",
                name: "Test",
                component: () => import('./pages/test.vue'),
            },
            {
                path: "/test2",
                name: "Test2",
                component: () => import('./pages/test2.vue') ,
            },
            {
                path: "/setting",
                name: "Setting",
                component: () => import('./pages/setting.vue'),
            },
            {
                path: "/profile",
                name: "Profile",
                component: () => import('./pages/profile.vue'),
            },
        ],
        meta: { requiresAuth: true },
    },
    {
        path: "/register",
        name: "Register",
        component: () => import('./pages/register.vue'),
    },
    {
        path: "/forgot/password",
        name: "ForgotPassword",
        component: () => import('./pages/forgotPassword.vue'),
    },
    {
        path: "/reset-password",
        name: "ResetPassword",
        component: () => import('./pages/resetPassword.vue'),
    },
    {
        path: "/:catchAll(.*)",
        redirect: "/reset-password",
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach(async (to, from, next) => {
    if (to.matched.some((record) => record.meta.requiresAuth)) {
        try {
            const response = await axios.get("api/user");
            const user = response.data;
            if (user) {
                next();
            } else {
                next({ name: "Home" });
            }
        } catch (error) {
            console.error("Erro ao verificar autenticação:", error.message);
            next({ name: "Home" });
        }
    } else {
        next();
    }
});

export default router;

import { createRouter, createWebHistory } from "vue-router";
import home from "./pages/home.vue";
import register from "./pages/register.vue";
import forgotPassword from "./pages/esqueceusenha.vue";
import dashboard from "./pages/Dashboard/dashboard.vue";
import test from "./pages/test.vue";
import test2 from "./pages/test2.vue";
import setting from "./pages/setting.vue";

const routes = [
    { path: "/", name: "Home", component: home },
    {
        path: "/dashboard",
        name: "Dashboard",
        component: dashboard,
        children: [
            {
                path: "/test",
                name: "Test",
                component: test,
            },
            {
                path: "/test2",
                name: "Test2",
                component: test2,
            },
            {
                path: "/setting",
                name: "Setting",
                component: setting,
            },
        ],
        meta: { requiresAuth: true },
    },
    {
        path: "/register",
        name: "Register",
        component: register,
    },
    {
        path: "/forgot/password",
        name: "ForgotPassword",
        component: forgotPassword,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach(async (to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        try {
            // Verificar se o usuário está autenticado
            const response = await axios.get("api/user");
            const user = response.data;
            if (user) {
                next();
            } else {
                next({ name: 'Home' });
            }
        } catch (error) {
            console.error("Erro ao verificar autenticação:", error.message);
            next({ name: 'Home' });
        }
    } else {
        next();
    }
});


export default router;

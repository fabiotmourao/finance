<template>
    <div class="min-h-screen bg-white flex">
        <div class="hidden lg:block relative w-0 flex-1 bg-purple-300">
            <div class="flex h-full justify-center items-center">
                <img src="./undraw_finance_re_gnv2.svg" alt="Sua Logo" class="logo">
            </div>
        </div>

        <div class="flex flex-1 flex-col justify-center px-4 py-12 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
            <div v-if="formErrors.common" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-200 dark:bg-gray-800 dark:text-red-400" role="alert">
                <div class="ms-3 text-sm font-medium">
                    {{ formErrors.common }}
                </div>
            </div>
            <div class="mx-auto w-full max-w-sm lg:w-96">
                <div>
                    <h2 class="mt-6 text-3xl font-semibold text-purple-700">
                        ENTRAR
                    </h2>
                    <p class="mt-2 text-sm text-gray-600 max-w">
                        ou
                        <router-link
                            :to="{ name: 'Register' }"
                            class="font-medium text-purple-700"
                            >Cadastre-se agora.
                        </router-link>
                    </p>
                </div>

                <div class="mt-6">
                    <form @submit.prevent="submit">
                        <div class="mb-4">
                            <input
                                id="email"
                                type="text"
                                v-model="fields.email"
                                placeholder="E-mail"
                                class="appearance-none block w-full py-3 px-4 leading-tight text-gray-700 bg-gray-50 focus:bg-white border border-gray-200 focus:border-purple-500 rounded focus:outline-none"
                            />
                            <div v-if="formErrors.email" class="text-red-500 text-xs mt-1">
                                * {{ formErrors.email[0] }}
                            </div>
                        </div>
                        <div class="mb-4">
                            <input
                                id="password"
                                type="password"
                                v-model="fields.password"
                                placeholder="Senha"
                                class="appearance-none block w-full py-3 px-4 leading-tight text-gray-700 bg-gray-50 focus:bg-white border border-gray-200 focus:border-purple-500 rounded focus:outline-none"
                            />
                            <div
                                v-if="formErrors.password"
                                class="text-red-500 text-xs mt-1"
                            >
                                * {{ formErrors.password[0] }}
                            </div>
                        </div>
                        <div class="mb-4">
                            <button
                                type="submit"
                                class="inline-block w-full py-4 px-8 leading-none text-white bg-purple-700 hover:bg-purple-900 font-semibold rounded shadow"
                            >
                                Entrar
                            </button>
                        </div>
                    </form>
                    <div class="mb-4">
                        <p>
                            <router-link
                                :to="{ name: 'ForgotPassword' }"
                                class="text-purple-700"
                                >Esqueceu sua senha?
                            </router-link>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            fields: {
                email: "",
                password: "",
            },
            form: {},
            formErrors: {},
        };
    },
    methods: {
        submit() {
            axios
                .post("/api/login", this.fields)
                .then(() => {
                    this.$router.push({ name: "Dashboard" });
                })
                .catch((error) => {
                    if (error.response && error.response.status === 422) {
                        this.formErrors = error.response.data.errors;
                    } else if (
                        error.response &&
                        error.response.status === 401 &&
                        error.response.data.message === "Credenciais inválidas"
                    ) {
                        // Mensagem de erro genérica para credenciais inválidas
                        this.formErrors.common =
                            "Credenciais inválidas. Verifique seu e-mail e senha.";
                    } else {
                        console.error(error);
                        this.formErrors.common =
                            "Erro no login. Por favor, tente novamente.";
                    }
                });
        },
    },
};
</script>

<style scoped></style>
>

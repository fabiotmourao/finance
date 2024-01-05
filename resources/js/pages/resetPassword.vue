<template>
  <div class="flex min-h-screen items-center justify-center">

    <div class="relative flex flex-col rounded-xl bg-transparent bg-clip-border text-gray-700 shadow-none">
        <div
          v-if="formErrors.common"
          class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-200 dark:bg-gray-800 dark:text-red-400"
          role="alert"
        >
          <div class="ms-3 text-sm font-medium">
            {{ formErrors.common }}
          </div>
        </div>
        <div
          v-if="message"
          class="flex p-4 mb-4 items-center text-white rounded-lg bg-green-500 dark:bg-gray-800 dark:text-green-400"
          role="alert"
        >
          <div class="ms-3 text-sm font-medium">
            {{ message }}
          </div>
        </div>
      <h4
        class="block font-sans text-2xl font-semibold leading-snug tracking-normal text-purple-700  antialiased"
      >
        Redefinir Senha
      </h4>
      <p
        class="mt-1 block font-sans text-base font-normal leading-relaxed text-purple-700 antialiased"
      >
        Entre com sua nova senha.
      </p>

      <form
        @submit.prevent="submit"
        class="mt-8 mb-2 w-80 max-w-screen-lg sm:w-96"
      >
        <div class="mb-4 flex flex-col gap-6">
          <div class="relative h-11 w-full min-w-[200px]">
            <input
              id="password"
              v-model="fields.password"
              type="password"
              placeholder="Senha"
              class="appearance-none block w-full py-3 px-4 leading-tight text-gray-700 bg-gray-50 focus:bg-white border border-gray-200 focus:border-purple-300 rounded focus:outline-none"
            />
            <div
              v-if="formErrors.password"
              class="text-red-500 text-xs mt-1"
            >
              * {{ formErrors.password[0] }}
            </div>
          </div>
          <div class="relative h-11 w-full min-w-[200px]">
            <input
              id="password_confirmation"
              v-model="fields.password_confirmation"
              type="password"
              placeholder="Confirme sua senha"
              class="appearance-none block w-full py-3 px-4 leading-tight text-gray-700 bg-gray-50 focus:bg-white border border-gray-200 focus:border-purple-300 rounded focus:outline-none"
            />
            <div
              v-if="formErrors.password_confirmation"
              class="text-red-500 text-xs mt-1"
            >
              * {{ formErrors.password_confirmation[0] }}
            </div>
          </div>
        </div>
        <button
          class="mt-6 block w-full select-none rounded-lg bg-purple-500 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-purple-500/20 transition-all hover:shadow-lg hover:shadow-purple-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
          type="submit"
          data-ripple-light="true"
        >
          Register
        </button>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      fields: {
        password: "",
        password_confirmation: "",
        token: decodeURIComponent(this.$route.query.token),
        email: decodeURIComponent(this.$route.query.email),
      },
      formErrors: {},
      message: null,
    };
  },
    methods: {
        submit() {
            console.log('Fields:', this.fields);

            this.formErrors = {};

            axios
                .post(`/api/reset-password/${this.fields.token}/${this.fields.email}`, {
                    token: this.fields.token,
                    email: this.fields.email,
                    password: this.fields.password,
                    password_confirmation: this.fields.password_confirmation,
                })
                .then((response) => {
                    console.log('Response:', response);
                    // Adicione o redirecionamento para a página desejada após a redefinição da senha, se necessário.
                })
                .catch((error) => {
                    console.error('Error:', error);
                    if (error.response && error.response.data.errors) {
                        this.formErrors = error.response.data.errors;
                    } else {
                        console.error("Erro ao fazer a solicitação:", error.message);
                        this.message = "Erro ao fazer a solicitação. Por favor, tente novamente.";
                    }
                });
        },
    },
};
</script>

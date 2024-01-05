<template>
  <div class="min-h-screen bg-white flex">
    <div class="hidden lg:block relative w-0 flex-1 bg-purple-300">
      <div class="flex h-full justify-center items-center"></div>
    </div>
    <div
      class="flex flex-1 flex-col justify-center px-4 py-12 sm:px-6 lg:flex-none lg:px-20 xl:px-24"
    >
      <div class="mx-auto w-full max-w-sm lg:w-96">
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
        <div class="mt-6">
          <div>
            <h2 class="mt-6 text-3xl font-semibold text-purple-700">
              ESQUECI MINHA SENHA
            </h2>
            <p class="mt-2 mb-3 text-sm text-gray-600 max-w">
              Por favor, informe seu e-mail para iniciarmos o processo de
              recuperação de senha
            </p>
          </div>
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
            <div class="mb-4 flex gap-8">
              <button
                :disabled="isButtonDisabled"
                type="submit"
                class="inline-block min-w-44 py-4 px-8 leading-none text-white bg-purple-700 hover:bg-purple-900 focus:outline-none focus:ring focus:ring-purple-600 font-semibold rounded shadow"
              >
                Enviar
              </button>
                <router-link :to="{ name: 'Home' }"
                 class="inline-block min-w-44 py-4 px-8  border text-center leading-none  hover:bg-purple-100  focus:outline-none focus:ring focus:ring-purple-100  font-semibold rounded shadow">
                    Voltar
                </router-link>
            </div>
          </form>
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
      },
      formErrors: {},
      message: null,
      isButtonDisabled: false,
    };
  },
  methods: {
    submit() {
      if (this.isButtonDisabled) {
        return;
      }

      this.isButtonDisabled = true;
      this.formErrors = {};
      this.message = null;

      axios
        .post("/api/forgot-password", this.fields)
        .then((response) => {
          this.message =
            response.data.message ||
            "Link de recuperação de senha enviado com sucesso!";
          this.fields.email = "";
        })
        .catch((error) => {
          if (error.response && error.response.status === 422) {
            this.formErrors = error.response.data.errors;
            console.log(this.formErrors);
          } else {
            console.log(
              "Erro ao fazer a solicitação. Por favor, tente novamente."
            );
            this.formErrors.common =
              "Erro ao fazer a solicitação. Por favor, tente novamente.";
          }
        });
    },
  },
};
</script>

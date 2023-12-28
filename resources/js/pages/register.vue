<template>
  <div class="min-h-screen bg-white flex">
    <div class="hidden lg:block relative w-0 flex-1 bg-purple-300">
      <div class="flex h-full justify-center items-center">
        <h1 class="text-3xl font-extrabold text-purple-950">
          Coloque aqui sua Marca ou Logo!
        </h1>
      </div>
    </div>
    <div
      class="flex flex-1 flex-col justify-center px-4 py-12 sm:px-6 lg:flex-none lg:px-20 xl:px-24"
    >
      <div class="mx-auto w-full max-w-sm lg:w-96">
        <div
          v-if="message"
          class="p-4 mb-4 text-sm text-white font-extrabold text-center rounded-lg bg-green-500 dark:bg-gray-800 dark:text-green-400"
          role="alert"
        >
          {{ message }}
        </div>
        <div class="mt-6">
          <div>
            <h2 class="mt-6 text-3xl font-semibold text-purple-700">
              REGISTRE-SE
            </h2>
            <p class="mt-2 mb-3 text-sm text-gray-600 max-w">
              Preencha os dados abaixo <span>ou faça seu </span>
              <router-link
                :to="{ name: 'Home' }"
                class="font-medium text-purple-700"
                >Login.
              </router-link>
            </p>
          </div>
          <form @submit.prevent="submit">
            <div class="mb-4">
              <input
                id="name"
                type="text"
                v-model="fields.name"
                placeholder="Nome"
                class="appearance-none block w-full py-3 px-4 leading-tight text-gray-700 bg-gray-50 focus:bg-white border border-gray-200 focus:border-gray-500 rounded focus:outline-none"
              />
              <div v-if="formErrors.name" class="text-red-500 text-xs mt-1">
                * {{ formErrors.name[0] }}
              </div>
            </div>
            <div class="mb-4">
              <input
                id="email"
                type="text"
                v-model="fields.email"
                placeholder="E-mail"
                class="appearance-none block w-full py-3 px-4 leading-tight text-gray-700 bg-gray-50 focus:bg-white border border-gray-200 focus:border-gray-500 rounded focus:outline-none"
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
                class="appearance-none block w-full py-3 px-4 leading-tight text-gray-700 bg-gray-50 focus:bg-white border border-gray-200 focus:border-gray-500 rounded focus:outline-none"
              />
              <div v-if="formErrors.password" class="text-red-500 text-xs mt-1">
                * {{ formErrors.password[0] }}
              </div>
            </div>
            <div class="mb-4">
              <input
                id="password_confirmation"
                type="password"
                v-model="fields.password_confirmation"
                placeholder="Confirme sua senha"
                class="appearance-none block w-full py-3 px-4 leading-tight text-gray-700 bg-gray-50 focus:bg-white border border-gray-200 focus:border-gray-500 rounded focus:outline-none"
              />
              <div
                v-if="formErrors.password_confirmation"
                class="text-red-500 text-xs mt-1"
              >
                * {{ formErrors.password_confirmation[0] }}
              </div>
            </div>
            <div class="mb-4">
              <button
                type="submit"
                class="inline-block w-full py-4 px-8 leading-none text-white bg-purple-700 hover:bg-purple-900 font-semibold rounded shadow"
              >
                Registrar
              </button>
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
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
      },
      formErrors: {},
      message: null,
    };
  },
  methods: {
    submit() {
      this.formErrors = {};

      axios
        .post("/api/register", this.fields)
        .then((response) => {
          if (response.status === 200) {
            this.message = "Usuário registrado com sucesso!";

            this.fields.name = "";
            this.fields.email = "";
            this.fields.password = "";
            this.fields.password_confirmation = "";
          } else {
            const errorData = response.data;
            throw new Error(
              errorData.message ||
                "Erro ao registrar. Por favor, tente novamente."
            );
          }
        })
        .catch((error) => {
          if (error.response && error.response.data.errors) {
            this.formErrors = error.response.data.errors;
          } else {
            console.error("Erro ao fazer a solicitação:", error.message);
            this.message =
              "Erro ao fazer a solicitação. Por favor, tente novamente.";
          }
        });
    },
  },
};
</script>

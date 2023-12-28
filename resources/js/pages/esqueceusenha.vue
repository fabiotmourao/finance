<script setup>
import { ref } from "vue";

const form = ref({
  email: "",
});
</script>

<template>
  <div class="min-h-screen bg-white flex">
    <div class="hidden lg:block relative w-0 flex-1 bg-purple-300">
      <div class="flex h-full justify-center items-center"></div>
    </div>
    <div
      class="flex flex-1 flex-col justify-center px-4 py-12 sm:px-6 lg:flex-none lg:px-20 xl:px-24"
    >
      <div class="mx-auto w-full max-w-sm lg:w-96">
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
                v-model="form.email"
                required
                placeholder="E-mail"
                class="appearance-none block w-full py-3 px-4 leading-tight text-gray-700 bg-gray-50 focus:bg-white border border-gray-200 focus:border-gray-500 rounded focus:outline-none"
              />
            </div>
            <div class="mb-4">
              <button
                type="submit"
                class="inline-block w-full py-4 px-8 leading-none text-white bg-purple-700 hover:bg-purple-900 font-semibold rounded shadow"
              >
                Enviar
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

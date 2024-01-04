<template>
  <div>
    <h1>Redefinir Senha</h1>
    <form @submit.prevent="submit">
      <label for="password">Nova Senha:</label>
      <input type="password" v-model="password" required />
      <label for="password_confirmation">Confirme a Nova Senha:</label>
      <input type="password" v-model="password_confirmation" required />
      <button type="submit">Redefinir Senha</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      password: "",
      password_confirmation: "",
      token: this.$route.query.token,
      email: this.$route.query.email,
    };
  },
  methods: {
    submit() {
      const resetData = {
        email: this.email,
        token: this.token,
        password: this.password,
        password_confirmation: this.password_confirmation,
      };

      axios
        .post(
          `/api/reset-password?token=${this.token}&email=${this.email}`,
          resetData
        )
        .then((response) => {
          console.log("Senha redefinida com sucesso:", response.data);
          // Lógica adicional, redirecionamento, exibição de mensagem, etc.
        })
        .catch((error) => {
          console.error("Erro ao redefinir senha:", error);
          // Trate os erros adequadamente, exiba mensagens de erro, etc.
        });
    },
  },
};
</script>

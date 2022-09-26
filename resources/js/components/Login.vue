<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Login (componente Vue)</div>

          <div class="card-body">
            <form method="POST" action="" @submit.prevent="login($event)">
              <input type="hidden" name="_token" :value="token_csrf" />

              <div class="form-group row">
                <label
                  for="email"
                  class="col-md-4 col-form-label text-md-right"
                >
                  Endereço de E-Mail
                </label>

                <div class="col-md-6">
                  <input
                    id="email"
                    type="email"
                    class="form-control"
                    name="email"
                    value=""
                    required
                    autocomplete="email"
                    autofocus
                    v-model="email"
                  />
                </div>
              </div>

              <div class="form-group row">
                <label
                  for="password"
                  class="col-md-4 col-form-label text-md-right"
                  >Senha</label
                >

                <div class="col-md-6">
                  <input
                    id="password"
                    type="password"
                    class="form-control"
                    name="password"
                    required
                    autocomplete="current-password"
                    v-model="password"
                  />
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                  <div class="form-check">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      name="remember"
                      id="remember"
                    />

                    <label class="form-check-label" for="remember">
                      Guardar Senha
                    </label>
                  </div>
                </div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                  <button type="submit" class="btn btn-primary">Login</button>

                  <a class="btn btn-link" href=""> Esqueceu a Senha? </a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["token_csrf"], // semelhante ao atributo vue data
  /* todas as propriedades tem o name convertido para caracteres minúsculos quando recebidas dentro do componente */
  data() {
    return {
      email: "",
      password: "",
    };
  },
  methods: {
    login: function (e) {
      const url = "http://localhost:8000/api/auth/login";
      const configuracao = {
        method: "post",
        // convertendo o body para a formatação do encoding x-www-form-urlencoded
        body: new URLSearchParams({
          email: this.email,
          password: this.password,
        }),
      };

      // recurso js para executar requisições
      fetch(url, configuracao)
        // para recurar de forma assíncrona a resposta da requisição
        .then((response) => response.json()) // convertendo a resposta para json
        .then((data) => {
          if (data.token) {
            // adicionando o token jwt em um cookie no front end
            /* token é o nome da chave. Sendo 'token' o laravel sabe que se trata de token de autorização */
            /* SameSite é adicionado para fazer o cookie ser encaminhado por padrão nas próximas requisições HTTP*/
            document.cookie = "token=" + data.token + ";SameSite=Lax";

            // dando sequência no envio do form de autenticação por sessão
            e.target.submit();
          }
        });
    },
  },
};
</script>

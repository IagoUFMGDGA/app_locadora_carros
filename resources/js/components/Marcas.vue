<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <!-- inicio do card de busca -->
        <card-component header-text="Busca de Marcas" mb-3>
          <template v-slot:conteudo>
            <div class="form-row">
              <div class="col mb-3">
                <input-container-component
                  label-for="inputId"
                  label-text="ID"
                  id-help="idHelp"
                  help-text="Opcional. Informe o ID do registro"
                >
                  <input
                    type="number"
                    class="form-control"
                    id="inputId"
                    aria-describedby="idHelp"
                    placeholder="ID"
                  />
                </input-container-component>
              </div>

              <div class="col mb-3">
                <input-container-component
                  label-for="inputNome"
                  label-text="Nome"
                  id-help="nomeHelp"
                  help-text="Opcional. Informe o nome da marca"
                >
                  <input
                    type="text"
                    class="form-control"
                    id="inputNome"
                    aria-describedby="nomeHelp"
                    placeholder="nome da marca"
                  />
                </input-container-component>
              </div>
            </div>
          </template>

          <template v-slot:rodape>
            <button type="submit" class="btn btn-primary btn-sm float-right">
              Enviar
            </button>
          </template>
        </card-component>
        <!-- fim do card de busca -->

        <!-- inicio do card de listagem de marcas -->
        <card-component header-text="Relação de Marcas">
          <template v-slot:conteudo>
            <table-component></table-component>
          </template>

          <template v-slot:rodape>
            <button
              type="button"
              class="btn btn-primary btn-sm float-right"
              data-toggle="modal"
              data-target="#modalMarca"
            >
              Adicionar
            </button>
          </template>
        </card-component>
        <!-- fim do card de listagem de marcas -->
      </div>
    </div>

    <modal-component modal-id="modalMarca" modal-title="Adicionar Marca">
      <template v-slot:conteudo>
        <div class="form-group">
          <input-container-component
            label-for="novoNome"
            label-text="ID"
            id-help="novoNomeHelp"
            help-text="Informe o nome da marca"
          >
            <input
              type="text"
              class="form-control"
              id="novoNome"
              aria-describedby="novoNomeHelp"
              placeholder="Nome da marca"
              v-model="nomeMarca"
            />
          </input-container-component>
        </div>

        <div class="form-group">
          <input-container-component
            label-for="imagem"
            label-text="ID"
            id-help="novoImagemHelp"
            help-text="Selecione uma imagem no formato PNG"
          >
            <input
              type="file"
              class="form-control-file"
              id="imagem"
              aria-describedby="novoImagemHelp"
              placeholder="Arquivo"
              @change="carregarImagem($event)"
            />
          </input-container-component>
        </div>
      </template>

      <template v-slot:rodape>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          Fechar
        </button>
        <button type="button" class="btn btn-primary" @click="salvar()">
          Salvar alterações
        </button>
      </template>
    </modal-component>
  </div>
</template>

<script>
export default {
  data() {
    return {
      urlBase: "http://localhost:8000/api/v1/marca",
      nomeMarca: "",
      arquivoImagem: [], // os inputs do tipo files são arrays de objetos pois podem receber mais de um arquivo
    };
  },
  methods: {
    carregarImagem: function (e) {
      this.arquivoImagem = e.target.files; // forma de recuperar arquivos selecionados por um input file
    },
    salvar: function () {
      console.log(this.nomeMarca, this.arquivoImagem[0]);

      // criando formulário de modo programático
      let formData = new FormData();
      formData.append("nome", this.nomeMarca);
      formData.append("imagem", this.arquivoImagem[0]);

      let config = {
        headers: {
          "Content-Type": "multipart/form-data", //determinando o body da requisição como sendo do tipo de encoding form-data
          Accept: "application/json",
        },
      };
      // fazendo uma requisição para o back da aplicação
      axios
        .post(this.urlBase, formData, config)
        // recuperando retorno de modo assíncrono quando estiver pronto
        .then((response) => {
          console.log(response);
        })
        // captura os erros da requisição
        .catch((errors) => {
          console.log(errors);
        });
    },
  },
};
</script>

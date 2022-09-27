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
            />
          </input-container-component>
        </div>
      </template>

      <template v-slot:rodape>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          Fechar
        </button>
        <button type="button" class="btn btn-primary">Salvar alterações</button>
      </template>
    </modal-component>
  </div>
</template>

<script>
export default {};
</script>

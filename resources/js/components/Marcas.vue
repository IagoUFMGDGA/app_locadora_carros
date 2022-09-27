<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <!-- inicio do card de busca -->
        <div class="card mb-3">
          <div class="card-header">Busca de Marcas</div>
          <div class="card-body">
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
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm float-right">
              Enviar
            </button>
          </div>
        </div>
        <!-- fim do card de busca -->

        <!-- inicio do card de listagem de marcas -->
        <div class="card">
          <div class="card-header">Relação de Marcas</div>
          <div class="card-body">
            <table-component></table-component>
          </div>
          <div class="card-footer">
            <button type="button" class="btn btn-primary btn-sm float-right">
              Adicionar
            </button>
          </div>
        </div>
        <!-- fim do card de listagem de marcas -->
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<template>
  <div>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col" v-for="titulo in titulos" :key="titulo">
            {{ titulo }}
          </th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="marcas in dados" :key="marcas.id">
          <th scope="row">{{ marcas.id }}</th>
          <td>{{ marcas.nome }}</td>
          <td>
            <img width="30" height="30" :src="'/storage/' + marcas.imagem" />
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  props: ["dados", "titulos"],
};
</script>

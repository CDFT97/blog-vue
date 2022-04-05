<template>
  <div class="pagination" v-if="pagination.last_page > 1">
    <ul class="list-unstyled container-flex space-center">
      <li v-for="page in pagination.last_page" :key="page">
        <router-link
          :class="getActiveClass(page)"
          :to="{
            name: $route.name,
            query: {
              page: page,
            },
          }"
        >
          {{ page }}
        </router-link>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  props: ["pagination"],
  methods: {
    getActiveClass(page) {
      return [
        //Activar paginacion en el num 1 por default
        !this.$route.query.page && page == 1 ? "active" : "",
      ];
    },
  },
};
</script>
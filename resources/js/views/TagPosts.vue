<template>
  <paginator :url="`/api/tags/${this.$route.params.tag}`" component-name="posts-list"/>
</template>


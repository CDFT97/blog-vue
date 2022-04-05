<template>
    <paginator :url="`/api/categories/${this.$route.params.category}`" component-name="posts-list"/>
</template>

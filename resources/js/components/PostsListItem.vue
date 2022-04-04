<template>
    <article class="post">
      <!-- @if ($post->photos->count() === 1)
                @include('posts.photo')
            @elseif($post->photos->count() > 1)
                @include('posts.carousel-preview')
            @elseif(!$post->ifame)
                @include('posts.iframe')
            @endif -->
      <div class="content-post">

        <post-header :post="post"></post-header>

        <p v-text="post.excerpt"></p>
        <footer class="container-flex space-between">
          <div class="read-more">
            <router-link class="text-uppercase c-green" :to="{name: 'posts_show', params: {url: post.url} }">read more</router-link>
          </div>

          <!-- @include('posts.tags') -->
          <div class="tags container-flex" >
            <span class="tag c-gray-1 text-capitalize" v-for="tag in post.tags" :key="tag.id">
              <router-link :to="{name: 'tags_posts', params: {tag: tag.url}}">
                #{{tag.name}}
              </router-link>
            </span>
          </div>
        </footer>
      </div>
    </article>
</template>

<script>
export default {
    props: ['post']
}
</script>
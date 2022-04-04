<template>
  <section class="post container">
    <!-- @if ($post->photos->count() === 1) @include('posts.photo')
    @elseif($post->photos->count() > 1) @include('posts.carousel')
    @elseif(!$post->ifame) @include('posts.iframe') @endif -->
    <div class="content-post">

      <post-header :post="post"></post-header>

      <div class="image-w-text" v-html="post.body"></div>

      <footer class="container-flex space-between">
        <!-- @include('partials.media-share', ['description' => $post->title]) -->
        <div class="tags container-flex">
          <!-- @foreach ($post->tags as $tag)
          <span class="tag c-gray-1 text-capitalize">{{$tag->name}}</span>
          @endforeach -->
        </div>
      </footer>
      <div class="comments">
        <div class="divider"></div>
        <div id="disqus_thread"></div>
        <!-- @include('partials.disqus-script') -->
      </div>
      <!-- .comments -->
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      post: {
        user:{},
        category:{}

      },
    };
  },
  mounted() {
    axios
      .get(`/api/blog/${this.$route.params.url}`)
      .then((res) => {
        this.post = res.data;
      })
      .catch((err) => {
        console.log(err.response.data);
      });
  },
};
</script>

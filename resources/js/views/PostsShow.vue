<template>
  <section class="post container">
    <div v-if="post.photos.length === 1">
        <figure >
            <img :src="post.photos[0].url" 
            class="img-responsive"
            alt="Photo">
        </figure>
      </div>

      <div v-else-if="post.photos.length > 1">
        <div class="gallery-photos mansonry">
            <figure class="grid-item grid-item--height2" v-for=" (photo, indice) in 4" :key="indice">
                <div v-if="indice === 3" class="overlay">{{post.photos.length}} Fotos</div>
                
                <img  :src="post.photos[indice].url" class="img-responsive">
            </figure>
        </div>
      </div>

      <div v-else>
        <div class="video" v-html="post.iframe">
        </div>
      </div>

    
    <!-- @if ($post->photos->count() === 1) @include('posts.photo')
    @elseif($post->photos->count() > 1) @include('posts.carousel')
    @elseif(!$post->ifame) @include('posts.iframe') @endif -->
    <div class="content-post">

      <post-header :post="post"></post-header>

      <div class="image-w-text" v-html="post.body"></div>

      <footer class="container-flex space-between">
      <social-links :description="post.title"></social-links>
        <div class="tags container-flex" style="float: right" >
            <span class="tag c-gray-1 text-capitalize" v-for="tag in post.tags" :key="tag.id">
              <tag-link :tag="tag"></tag-link>
            </span>
        </div>
      </footer>
      <div class="comments">
        <div class="divider"></div>
        <comments></comments>
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

<template>
    <article class="post">
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
      
      <div class="content-post">

        <post-header :post="post"></post-header>

        <p v-text="post.excerpt"></p>
        <footer class="container-flex space-between">
          <div class="read-more">
            <post-link class="text-uppercase c-green" :post="post">Read more</post-link>
          </div>

          <div class="tags container-flex" >
            <span class="tag c-gray-1 text-capitalize" v-for="tag in post.tags" :key="tag.id">
              <tag-link :tag="tag"></tag-link>
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
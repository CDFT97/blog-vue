<template>
  <div class="buttons-social-media-share">
    <ul class="share-buttons">
      <li>
        <a
          :href="`https://www.facebook.com/sharer/sharer.php?u=${url}&title=${description}`"
          title="Share on Facebook"
          target="_blank"
        >
          <img
            alt="Share on Facebook"
            src="/img/flat_web_icon_set/Facebook.png"
          />
        </a>
      </li>
      <li>
        <a
          :href="`https://twitter.com/intent/tweet?u=${url}&text=${description}&via=BlogVue&hashtags=BlogVue`"                                              target="_blank"
          title="Tweet"
        >
          <img alt="Tweet" src="/img/flat_web_icon_set/Twitter.png" />
        </a>
      </li>
      <li>
        <a
          :href="`http://pinterest.com/pin/create/button/?u=${url}&description=${description}`"
          target="_blank"
          title="Pin it"
        >
          <img alt="Pin it" src="/img/flat_web_icon_set/Pinterest.png" />
        </a>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
    props: ['description'],
    computed: {
        url(){
            return document.URL;
        }
    }
}
</script>

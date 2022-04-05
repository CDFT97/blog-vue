<template>
    <section class="posts container">
    <!-- @if (isset($title))
            <h3>{{$title}}</h3>
        @endif -->

    <posts-list-item 
        v-for="post in items" 
        :key="post.id" 
        :post="post">
    </posts-list-item>

    <!-- @empty -->
    <article class="post" v-if="!items.length">
      <div class="content-post">
        <h1>No publications yet</h1>
      </div>
    </article>
    <!-- @endforelse -->
  </section>
  <!-- fin del div.posts.container -->
  <!-- {{ $posts->appends(request()->all())->links() }} -->
</template>

<script>
    export default {
        props: ['items']
    }
</script>
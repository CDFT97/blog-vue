<template>
    <div>
        <header class="container-flex space-between">
            <div class="date">
                <span class="c-gray-1">
                {{ post.published_date }} / {{ post.user.name }}
                </span>
            </div>
            <!-- @if ($post->category) @endif -->
            <div class="post-category">
                <span class="category text-capitalize">
                <div class="tags container-flex">
                    <category-link :category="post.category"></category-link>
                </div>
                </span>
            </div>
            </header>

            <h1 v-text="post.title"></h1>
            <div class="divider"></div>
    </div>
</template>

<script>
    export default {
        props:['post']
    }
</script>


<header class="container-flex space-between">
    <div class="date">
        <span class="c-gray-1">
            {{$post->published_at->format('M d')}} / {{$post->user->name }}
        </span>
    </div>
    @if ($post->category)
        
    @endif
    <div class="post-category">
        <span class="category text-capitalize">
            <div class="tags container-flex">
                <a href="{{ route('categories.show', $post->category) }}">
                    {{$post->category->name}}
                </a>
            </div>
        </span>
    </div>
</header>
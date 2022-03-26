<div class="gallery-photos mansonry">
    @foreach ($post->photos->take(4) as $photo)
    <figure class="grid-item grid-item--height2">
        @if ($loop->iteration === 4)
        <div class="overlay">{{$post->photos->count()}} Fotos</div>
        @endif
        <img src="{{ url($photo->url) }}"  class="img-responsive">
    </figure>
    @endforeach
</div>
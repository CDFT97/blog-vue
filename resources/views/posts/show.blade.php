@extends('layout')
@section('meta-title', $post->title)
@section('meta-description', $post->excerpt)

@section('content')
<article class="post container">
    @if ($post->photos->count() === 1)
        @include('posts.photo')
    @elseif($post->photos->count() > 1)
        @include('posts.carousel')
    @elseif(!$post->ifame)
        @include('posts.iframe')
	@endif
    <div class="content-post">
        
        @include('posts.header')

        <h1>{{ $post->title }}</h1>
        <div class="divider"></div>
        <div class="image-w-text">
            <div>
                {!! $post->body !!}
            </div>
        </div>

        <footer class="container-flex space-between">
            @include('partials.media-share', ['description' => $post->title])
            <div class="tags container-flex">
                @foreach ($post->tags as $tag)
                <span class="tag c-gray-1 text-capitalize">{{$tag->name}}</span>
                @endforeach
            </div>
        </footer>
        <div class="comments">
            <div class="divider"></div>
            <div id="disqus_thread"></div>
            @include('partials.disqus-script')
        </div><!-- .comments -->
    </div>
</article>
@endsection
@push('styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/twitter-bootstrap.css')}}">
    
@endpush


@push('scripts')
<script id="dsq-count-scr" src="//zendero.disqus.com/count.js" async></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="{{asset('js/twitter-bootstrap.js')}}"></script>
@endpush
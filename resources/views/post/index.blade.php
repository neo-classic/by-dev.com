@extends('layouts.app')

@section('title', 'Sometimes I\'m coding')

@section('content')
    <div class="container">
        @foreach($posts as $post)
            <div class="row">
                <div class="col-12">
                    <h1><a href="{{ route('posts.view', ['slug' => $post->slug]) }}">{{ $post->title }}</a></h1>
                </div>
                <div class="col-12">
                    <span><i class="fa fa-tags"></i>
                        {!! $post->tags->map(function($tag) {
                            return "<a href='". route('tag.view', ['slug' => $tag->slug]) . "'>$tag->title</a>";
                        })->implode(', ') !!}
                    </span>
                    <span class="float-right">
                        <i class="fa fa-comments"></i> <a href="{{ route('posts.view', ['slug' => $post->slug]) }}#comments">comments</a>
                        &nbsp;&nbsp;
                        <i class="fa fa-calendar"></i> {{ date('m/d/Y', strtotime($post->created_at)) }}
                    </span>
                </div>
                <div class="col-12">
                    {{ $post->announce }}
                    <p class="text-right"><a href="{{ route('posts.view', ['slug' => $post->slug]) }}">read</a></p>
                    <hr />
                </div>
            </div>
        @endforeach
        <div class="row">
            <div class="col-12 text-center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection

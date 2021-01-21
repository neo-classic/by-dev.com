@extends('layouts.app')

@section('title', 'Sometimes I\'m coding')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="display-1">{{ $post->title }}</h1>
            <span class="float-right">
                <i class="fa fa-calendar"></i> {{ date('m/d/Y', strtotime($post->created_at)) }}
            </span>
        </div>
        <div class="col-12">
            <blockquote>
                {{ $post->announce }}
            </blockquote>
        </div>
        <div class="col-12">
            {{ $post->body }}
        </div>
        <div class="col-12">
            <span class="float-left">SHARE_WIDGET</span>
            <span class="float-right"><i class="fa fa-tags"></i> TAG_LINKS</span>
        </div>
        <div class="col-12">
            RELATED_POSTS
        </div>
        <div class="col-12">
            DISQUS_COMMENTS
        </div>
    </div>
</div>
@endsection

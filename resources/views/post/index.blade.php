@extends('layouts.app')

@section('title', 'Sometimes I\'m coding')

@section('content')
    <div class="container">
        @foreach($posts as $post)
            <div class="row">
                <div class="col-12">
                    <h1><a href="#">{{ $post->title }}</a></h1>
                </div>
                <div class="col-12">
                    <span><i class="fa fa-tags"></i> <a href="#">home</a>, <a href="#">qwe</a></span>
                    <span class="pull-right">
                        <i class="fa fa-comments"></i> <a href="#">comments</a>
                        &nbsp;&nbsp;
                        <i class="fa fa-calendar"></i>  {{ $post->created_at }}
                    </span>
                </div>
                <div class="col-12">
                    {{ $post->announce }}
                    <p class="text-right"><a href="#">read</a></p>
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

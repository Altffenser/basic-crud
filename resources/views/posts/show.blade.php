@use('App\Enums\FeaturedStatus')
@extends('layouts.app')
@section('title', $post->title)
@section('content')
    <div class="grid mx-auto sm:gap-x-5 sm:grid-cols-8 sm:text-left items-start">
        {{--        Author card--}}
        <div class="col-span-2 bg-white dark:bg-gray-800 p-2 h-full flex flex-col space-y-5">
            @include('posts.modules.sh-author-card')
            {{--            Paste down new modules--}}
            @include('posts.modules.sh-related-posts')
        </div>

        <div class="col-span-6">
            {{--        Post content--}}
            @include('posts.modules.sh-post-content')

            {{--        Comments--}}
            @include('posts.modules.sh-comments')
        </div>
    </div>
@endsection

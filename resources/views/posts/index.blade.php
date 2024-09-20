@inject('queryResolver', 'App\Support\QueryResolver')
@use('App\Support\Settings')
@extends('layouts.app')
@section('title', __('posts.index.Posts'))
@section('content')
    <div class="flex flex-col">
        <h1 class="text-2xl font-bold">{{ __('posts.index.Posts') }}</h1>

        @session('success')
        <div class="bg-green-200 text-green-800 p-4 my-4">
            {{ $value }}
            <span class="float-right cursor-pointer text-xl" onclick="this.parentElement.remove()">x</span>
        </div>
        @endsession

        <div class="flex justify-between items-center">
            <div>
                <div class="flex gap-x-4">
                    <x-button color="green" :href="route('posts.create')">
                        {{ __('posts.form.Create Post') }}
                    </x-button>
                    <x-button color="blue" :href="route('posts.index', $queryResolver->publishedQuery())">
                        {{ $queryResolver->publishedLabel() }}
                    </x-button>
                    <div class="relative inline-block text-left ms-2">
                        <x-button onclick="this.nextElementSibling.classList.toggle('hidden')">
                            <span>{{ __('posts.index.Languages') }} &#x25BE;</span>
                        </x-button>
                        <div class="z-10 origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg hidden bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                             role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                            @foreach (Settings::getLocales() as $locale => $Label)
                                <a @class([
                                    'block px-4 py-2 text-sm',
                                    'text-gray-700 hover:bg-gray-100 hover:text-gray-900' =>
                                        $locale != app()->getLocale(),
                                    'text-white bg-blue-500' => $locale == app()->getLocale(),
                                ])
                                    {{ $locale != app()->getLocale() ? 'href=' . route('set-locale', ['locale' => $locale]) : '' }}>{{ $Label }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <form class="mb-4" action="{{ route('posts.index') }}">
                @foreach ($queryResolver->searchQuery() as $key => $value)
                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                @endforeach
                <div class="flex items-center [&>button]:rounded-s-none [&>input]:rounded-e-none [&>input]:border-e-0">
                    <x-text-field name="search" placeholder="{{ __('posts.form.Search here') }}" type="search"
                                  value="{{ $queryResolver->searchValue() }}"/>
                    <x-button type="submit">
                        {{ __('posts.form.Search') }}
                    </x-button>
                </div>
            </form>
        </div>
        <div class="grid grid-cols-1 grid-flow-row-dense mx-auto text-center sm:gap-x-5 sm:grid-cols-2 lg:grid-cols-4 sm:text-left items-start">
            <div class="col-span-2">
                @include('posts.modules.in-post-lists')
            </div>
            <div>
                @include('posts.modules.in-latest-users')
                @include('posts.modules.in-latest-comments')
                @include('posts.modules.in-top-posts')
            </div>
            @include('posts.modules.in-affiliates')
        </div>
@endsection

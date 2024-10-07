@extends('layouts.app')
@section('title', __('posts.index.Posts'))
@section('content')

    <div class="min-h-screen flex">
        <nav class="w-56 flex-none ...">
            @include('admin.modules.global-sidebar')
        </nav>

        <main class="flex-1 min-w-0 overflow-auto ...">
            @yield('admin-content')
        </main>
    </div>

@endsection

@extends('admin.layout')
@section('admin-content')
    {{--    Admin Dashboard--}}
    <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-4">
        {{--        Users count--}}
        <x-box-content title="Usuarios" icon="users" iconColor="blue">
            <h2 class="text-4xl font-bold text-gray-500 leading-tight">{{ $usersCount }}</h2>
            <span class="text-gray-500 uppercase text-[12px]">Usuarios</span>
        </x-box-content>
        {{--        Posts count--}}
        <x-box-content title="Posts" icon="files" iconColor="green">
            <h2 class="text-4xl font-bold text-gray-500 leading-tight">{{ $postsCount }}</h2>
            <span class="text-gray-500 uppercase text-[12px]">Posts</span>
        </x-box-content>
        {{--        Comments count--}}
        <x-box-content title="Comentarios" icon="messages" iconColor="yellow">
            <h2 class="text-4xl font-bold text-gray-500 leading-tight">{{ $commentsCount }}</h2>
            <span class="text-gray-500 uppercase text-[12px]">Comentarios</span>
        </x-box-content>
        {{--        Categories count--}}
        <x-box-content title="Categorías" icon="folder" iconColor="red">
            <h2 class="text-4xl font-bold text-gray-500 leading-tight">{{ $categoriesCount }}</h2>
            <span class="text-gray-500 uppercase text-[12px]">Categorías</span>
        </x-box-content>

        {{--        Roles list--}}
        @include('admin.modules.dashboard-roles-table')
    </div>
@endsection

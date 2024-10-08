@php
    $roles =  Spatie\Permission\Models\Role::all();
@endphp
@extends('admin.layout')
@section('admin-content')

    {{--    Actions --}}
    <div class="flex my-5 justify-between items-center">

        @include('admin.modules.users-create-user-modal')
        @include('admin.modules.users-searchbar')

    </div>

    {{--    Users list box--}}
    <x-box-content title="Users" icon="users" iconColor="pink">
        <div class="relative overflow-x-auto">
            @include('admin.modules.users-users-list')
        </div>
    </x-box-content>

    {{--    Table pagination links--}}
    <div class="mt-5">
        {{ $users->links() }}
    </div>
@endsection

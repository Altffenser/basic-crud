<x-box-content title="Seguidores" icon="users">
    @foreach($user->followers()->get() as $follower)
        <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800" src="{{ $follower->profile->photo }}" alt="{{ $follower->name }}" title="{{ $follower->name }}">
    @endforeach
</x-box-content>

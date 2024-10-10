{{--Form for edit existing user--}}
<form id="contact" x-target method="patch" action="{{ route('admin.user.update', ['user' => $user]) }}">
    @csrf
    <div class="grid grid-cols-1 gap-6">
        <div class="grid grid-cols-2 gap-5">
            <div class="flex flex-col">
                <x-input-label for="name" value="Name"/>
                <x-text-input id="name" name="name" value="{{ $user->name }}" required/>
            </div>
            <div class="flex flex-col">
                <x-input-label for="username" value="Username"/>
                <x-text-input id="username" name="username" value="{{ $user->profile->username }}" required/>
            </div>
        </div>
        <div class="flex flex-col">
            <x-input-label for="email" value="Email"/>
            <x-text-input id="email" name="email" value="{{ $user->email }}" type="email" required/>
        </div>
        <div class="flex flex-col relative">
            <x-input-label for="password" value="New password"/>
            <x-text-input id="password" name="password" type="password"/>
        </div>
        <div class="grid grid-cols-2 gap-5">
            <div class="flex flex-col">
                <x-input-label for="role" value="Role"/>
                <select id="role" name="role">
                    @foreach($roles as $key => $role)
                        <option value="{{ $key }}">{{ $role }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col">
                <x-input-label for="available_points" value="Available points"/>
                <x-text-input id="available_points" name="available_points" value="{{ $user->available_points }}" type="number" required/>
            </div>
        </div>
    </div>
    <button>
        Update
    </button>
</form>

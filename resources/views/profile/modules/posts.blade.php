<div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 p-6 mb-5">
    <div class="flex space-x-2.5 items-center mb-5 text-black dark:text-white">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="stroke-current">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M15 3v4a1 1 0 0 0 1 1h4"/>
            <path d="M18 17h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h4l5 5v7a2 2 0 0 1 -2 2z"/>
            <path d="M16 17v2a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2"/>
        </svg>
        <h3 class="text-2xl font-bold leading-tight">Latest posts</h3>
    </div>
    {{--        Enlist posts from user--}}
    <ul class="block">
        @foreach($user->posts->take(10) as $post)
            <li>
                <a class="hover:underline text-blue-600" href="{{ route('posts.show', ['post' => $post]) }}">{{ $post->title }}</a>
            </li>
        @endforeach
    </ul>
    <ul x-data x-animate="{ easing: 'ease-in-out' }" class="text-white">
        <li x-on:click="$event.target.remove()" class="p-3">
            <span>Hola</span>
        </li>
        <li x-on:click="$event.target.remove()" class="p-3">
            Lorem ipsum dolor sit amet.
            <span>Hola</span>
        </li>
        <li x-on:click="$event.target.remove()" class="p-3">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id, iste.
            <span>Hola</span>
        </li>
    </ul>

    <div x-data="{modalIsOpen: false}">
        <button @click="modalIsOpen = true" type="button" class="cursor-pointer whitespace-nowrap rounded-md bg-black px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white">Open Modal</button>
        <div x-cloak x-show="modalIsOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="modalIsOpen" @keydown.esc.window="modalIsOpen = false" @click.self="modalIsOpen = false" class="fixed inset-0 z-30 flex items-end justify-center bg-black/20 p-4 pb-8 backdrop-blur-md sm:items-center lg:p-8" role="dialog" aria-modal="true" aria-labelledby="defaultModalTitle">
            <!-- Modal Dialog -->
            <div x-show="modalIsOpen" x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity" x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100" class="flex max-w-lg flex-col gap-4 overflow-hidden rounded-md border border-neutral-300 bg-white text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">
                <!-- Dialog Header -->
                <div class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20">
                    <h3 id="defaultModalTitle" class="font-semibold tracking-wide text-neutral-900 dark:text-white">Special Offer</h3>
                    <button @click="modalIsOpen = false" aria-label="close modal">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <!-- Dialog Body -->
                <div class="px-4 py-8">
                    <p>As a token of appreciation, we have an exclusive offer just for you. Upgrade your account now to unlock premium features and enjoy a seamless experience.</p>
                </div>
                <!-- Dialog Footer -->
                <div class="flex flex-col-reverse justify-between gap-2 border-t border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20 sm:flex-row sm:items-center md:justify-end">
                    <button @click="modalIsOpen = false" type="button" class="cursor-pointer whitespace-nowrap rounded-md px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-600 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:text-neutral-300 dark:focus-visible:outline-white">Remind me later</button>
                    <button @click="modalIsOpen = false" type="button" class="cursor-pointer whitespace-nowrap rounded-md bg-black px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white">Upgrade Now</button>
                </div>
            </div>
        </div>
    </div>
</div>

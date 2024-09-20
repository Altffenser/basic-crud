@foreach ($post->tags as $tag)
    <div class="inline-block relative p-1.5 text-[10px]">
        <div class="absolute inset-0 text-slate-300 flex">
            <svg height="100%" viewBox="0 0 50 100">
                <path
                    d="M49.9,0a17.1,17.1,0,0,0-12,5L5,37.9A17,17,0,0,0,5,62L37.9,94.9a17.1,17.1,0,0,0,12,5ZM25.4,59.4a9.5,9.5,0,1,1,9.5-9.5A9.5,9.5,0,0,1,25.4,59.4Z"
                    fill="currentColor"/>
            </svg>
            <div class="flex-grow h-full -ml-px bg-slate-300 rounded-md rounded-l-none"></div>
        </div>
        <span class="relative text-slate-500 uppercase font-semibold pr-px">
              <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>{{ $tag }}<span>&nbsp;</span>
        </span>
    </div>
@endforeach

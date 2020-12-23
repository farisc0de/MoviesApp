<div class="relative mt-3 md:mt-0" x-data="{ isOpen: true }" @click.away="isOpen = false">
    <input
        wire:model.debounce.500ms="search"
        type="text"
        class="bg-gray-800 rounded-full w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline"
        placeholder="Search ..."
        @focus="isOpen = true"
        @keydown="isOpen = true"
        @keydown.escape.window="isOpen = false"
        @keydown.shift.tab="isOpen = false"
    />
    <div class="absolute top-0">
        <i class="w-4 mt-2 ml-2 text-gray-500 fas fa-search"></i>
    </div>
    
    <div wire:loading class="spinner top-0 right-0 mr-4 mt-4"></div>

        @if (strlen($search) > 2)
        <div
        class="z-50 absolute bg-gray-800 rounded w-64 mt-4"
        x-show.transition.opacity="isOpen"

        >
            @if ($searchResults->count() > 0)
            <ul>
                @foreach ($searchResults as $result)
                <li class="border-b border-gray-700 ">
                    <a
                    href="{{route('movies.show', $result['id'])}}"
                    class="hover:bg-gray-700 px-3 py-3 flex items-center"
                    @if($loop->last)
                        @keydown.tab.exact = "isOpen = false"
                    @endif
                    >
                    @if ($result['poster_path'])
                        <img src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}" alt="{{
                            $result['title']
                        }}" class="w-8" />
                    @else
                        <img src="https://via.placeholder.com/50x75" alt="{{
                            $result['title']
                        }}" class="w-8" />
                    @endif
                    <span class="ml-4">{{
                        $result['title']
                    }}</span></a>
                </li>                
                @endforeach
            </ul>
            @else
            <div class="px-3 py-3">No results found for "{{ $search }}"</div>
            @endif
            </div>
        @endif
    
</div>

@extends('layouts.main') @section('title', $movie['title']) @section('content')
<div class="movie-info border-b border-gray-800">
    <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
        <div class="flex-none">
            <img
                src="{{ $movie['poster_path'] }}"
                alt="{{ $movie['title'] }}"
                class="w-64 lg:w-96"
            />
        </div>
        <div class="md:ml-24">
            <h2 class="text-4xl font-semibold">{{ $movie["title"] }}</h2>
            <div class="flex flex-wrap items-center text-gray-400 text-sm">
                <i class="text-orange-500 fas fa-star"></i>
                <span class="ml-1">{{ $movie["vote_average"] }}%</span>
                <span class="mx-2">|</span>
                <span
                    >{{  $movie['release_date'] }}</span
                >
                <span class="mx-2">|</span>
                {{ $movie['genres'] }}
            </div>

            <p class="text-gray-300 mt-8">
                {{ $movie["overview"] }}
            </p>

            <div class="mt-12">
                <h4 class="text-white font-semibold">
                    Featured Crew
                </h4>
                <div class="flex mt-4">
                    @foreach ($movie['crew'] as $crew)
                    <div class="mr-8">
                        <div>{{ $crew["name"] }}</div>
                        <div class="text-sm text-gray-400">
                            {{ $crew["job"] }}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div x-data="{ isOpen: false }">
                @if (count($movie['videos']['results']) > 0)
                <div class="mt-12">
                    <button
                        @click="isOpen = true"
                        class="inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150"
                    >
                        <svg class="w-6 fill-current" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"
                            />
                        </svg>
                        <span class="ml-2">Play Trailer</span>
                    </button>
                </div>

                <template x-if="isOpen">
                    <div
                        style="background-color: rgba(0, 0, 0, .5);"
                        class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                    >
                        <div
                            class="container mx-auto lg:px-32 rounded-lg overflow-y-auto"
                        >
                            <div class="bg-gray-900 rounded"  @click.away="isOpen = false">
                                <div class="flex justify-end pr-4 pt-2">
                                    <button
                                        @click="isOpen = false"
                                        @keydown.escape.window="isOpen = false"
                                        class="text-3xl leading-none hover:text-gray-300"
                                    >
                                        &times;
                                    </button>
                                </div>
                                <div class="modal-body px-8 py-8">
                                    <div
                                        class="responsive-container overflow-hidden relative"
                                        style="padding-top: 56.25%"
                                    >
                                        <iframe
                                            class="responsive-iframe absolute top-0 left-0 w-full h-full"
                                            src="https://www.youtube.com/embed/{{
                                                $movie['videos']['results'][0][
                                                    'key'
                                                ]
                                            }}"
                                            style="border:0;"
                                            allow="autoplay; encrypted-media"
                                            allowfullscreen
                                        ></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="movie-cast border-b border-gray-800">
    <div class="container mx-auto px-4 py-16">
        <h2 class="text-4xl font-semibold">Cast</h2>
        <div
            class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8"
        >
            @foreach ($movie['cast'] as $cast)
            <div class="mt-8">
                <a href="/actors/{{ $cast["id"] }}">                   
                    <img
                    src="@if($cast['profile_path'])
                    https://image.tmdb.org/t/p/w500/{{$cast["profile_path"]}}
                    @else
                        https://quantumdetectors.com/wp-content/uploads/2018/06/person-placeholder-1080x1529.png
                    @endif"
                    alt="{{ $cast["name"] }}" class="hover:opacity-75" />
                </a>
                <div class="mt-2">
                    <a href="/actors/{{ $cast["id"] }}" class="hover:text-gray-300">{{
                        $cast["name"]
                    }}</a>
                    <div class="text-gray-400 text-sm">
                        {{ $cast["character"] }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="movie-images">
    <div class="container mx-auto px-4 py-16">
        <h2 class="text-4xl font-semibold">Images</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @foreach ($movie['images'] as $image)
            <div class="mt-8">
                <a href="{{ 'https://image.tmdb.org/t/p/original/'.$image['file_path'] }}">
                <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$image['file_path'] }}" alt="image1" class="hover:opacity-75 transition ease-in-out duration-150">
                </a>
            </div>
            @endforeach
        </div>
    </div>
 </div>
@endsection

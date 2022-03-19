@extends('layouts.main') @section('title', $actor['name']) @section('content')
<div class="movie-info border-b border-gray-800">
    <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
        <div class="flex-none">
            <img
                src="{{ $actor['profile_path'] }}"
                alt="{{ $actor['name'] }}"
                class="w-76"
            />
            <ul class="flex items-center mt-4">
                @if ($social['facebook'])
                <li>
                    <a href="{{ $social['facebook'] }}" class="Faebook"><i class="fab fa-facebook-square text-2xl"></i></a>
                </li>                    
                @endif
                @if ($social['instagram'])
                <li class="ml-6">
                    <a href="{{ $social['instagram'] }}" class="Instagram"><i class="fab fa-instagram text-2xl"></i></a>
                </li>                    
                @endif
                @if ($social['twitter'])
                <li class="ml-6">
                    <a href="{{ $social['twitter'] }}" class="Twitter"><i class="fab fa-twitter text-2xl"></i></a>
                </li>                    
                @endif
                @if ($social['imdb'])
                <li class="ml-6">
                    <a href="{{ $social['imdb'] }}" class="IMDB"><i class="fab fa-imdb text-2xl"></i></a>
                </li>                    
                @endif



                @if ($actor['homepage'])
                <li class="ml-6">
                    <a href="{{ $actor['homepage'] }}" class="Website"><i class="fas fa-globe-americas text-2xl"></i></a>
                </li>  
                @endif
            </ul>
        </div>
        <div class="md:ml-24">
            <h2 class="text-4xl font-semibold">{{ $actor['name'] }}</h2>
            <div class="flex flex-wrap items-center text-gray-400 text-sm">
                <i class="fas fa-birthday-cake text-gray-400 hover:text-white text-sm"></i>
                <span class="ml-1">{{$actor['birthday']}} ( {{ $actor['age'] }} years old )</span>
                <span class="mx-2">|</span>
                <span>{{ $actor['known_for_department'] }}</span>
            </div>

            <p class="text-gray-300 mt-8">
                {{ $actor['biography'] }}
            </p>

            <h4 class="font-semibold mt-12">
                Known For
            </h4>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8">
                @foreach ($knownForMovies as $movie)
                <div class="mt-4">
                    <a href="{{ route('movies.show', $movie['id']) }}">
                        <img src="{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}" class="hover:opacity-75"/>
                    </a>
                    <a href="{{ route('movies.show', $movie['id']) }}" class="text-sm leading-normal block text-gray-400 hover:text-white mt-1">{{ $movie['title'] }}</a>
                </div>                    
                @endforeach

            </div>
            
        </div>
    </div>
</div>

<div class="movie-cast border-b border-gray-800">
    <div class="container mx-auto px-4 py-16">
        <h2 class="text-4xl font-semibold">Credits</h2>
        <ul class="list-disc leading-loose pl-5 mt-8">
            @foreach ($credits as $credit)
                <li>{{ $credit['release_year'] }} &middot; <strong>{{ $credit['title'] }}</strong> as {{ $credit['character'] }}</li>
            @endforeach
        </ul>
    </div>
</div>


@endsection

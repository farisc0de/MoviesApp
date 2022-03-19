@extends('layouts.main') @section('title', 'Actors') @section('content')
<div class="container mx-auto px-4 py-16">
    <div class="popular-movies">
        <h2
            class="uppercase tracking-wider text-orange-500 text-lg font-semibold"
        >
            Popular Actors
        </h2>
        <div
            class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8"
        >
            @foreach ($popularActors as $actor)
            <div class="actor mt-8">
                <a href="/actors/{{ $actor['id'] }}">
                    <img
                        src="{{ $actor['profile_path'] }}"
                        alt=""
                        class="hover:opacity-75"
                    />
                </a>
                <div class="mt-2">
                    <a href="/actors/{{ $actor['id'] }}" class="text-lg hover:text-gray-300">
                        {{ $actor["name"] }}
                    </a>
                    <div class="text-sm truncate text-gray-400">
                        {{ $actor["known_for"] }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- End actors section --->

    <div class="page-load-status">
        <div class="flex justify-center pb-16">
            <p class="infinite-scroll-request spinner my-8 text-4xl">&nbsp;</p>
            <p class="infinite-scroll-last">End of content</p>
            <p class="infinite-scroll-error">Error</p>
        </div>
    </div>

</div>
@endsection @section('scripts')
<script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>
<script type="application/javascript">
    var elem = document.querySelector('.grid');
    var infScroll = new InfiniteScroll( elem, {
        path: '/actors/page/@{{#}}',
        append: '.actor',
        history: true,
        status: '.page-load-status'
    });
</script>
@endsection

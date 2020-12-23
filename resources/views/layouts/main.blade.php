<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>Movie App - @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link
            rel="stylesheet"
            type="text/css"
            media="screen"
            href="/css/app.css"
        />
        <link
            rel="stylesheet"
            type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
        />

        @livewireStyles
    </head>

    <body class="font-sans bg-gray-900 text-white">
        <nav class="border-b border-gray-800">
            <div
                class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between py-6"
            >

                <ul class="flex flex-col md:flex-row items-center">
                    <li>
                        <a href="{{ route('movies.index') }}" class="w-32"
                            ><i class="fas fa-ticket-alt"></i> Movie App</a
                        >
                    </li>
                    <li class="md:ml-6 mt-3 md:mt-0">
                        <a
                            href="{{ route('movies.index') }}"
                            class="hover:text-gray-300"
                            >Movies</a
                        >
                    </li>
                    <li class="md:ml-6 mt-3 md:mt-0">
                        <a href="#" class="hover:text-gray-300">TV Shows</a>
                    </li>
                    <li class="md:ml-6 mt-3 md:mt-0">
                        <a
                            href="{{ route('actors.index') }}"
                            class="hover:text-gray-300"
                            >Actors</a
                        >
                    </li>
                </ul>
                <div class="flex flex-col md:flex-row items-center">
                    @livewire('search-dropdown')

                    <div class="md:ml-4 mt-3 md:mt-0">
                        <a href="#"
                            ><img
                                src="/img/avatar.png"
                                alt="avatar"
                                class="rounded-full w-8 h-8"
                        /></a>
                    </div>
                </div>
            </div>
        </nav>


        @yield('content')

        <footer class="border border-t border-gray-800">
            <div class="container mx-auto text-sm px-4 py-6">
                Powered by
                <a
                    href="https://www.themoviedb.org/documentation/api"
                    class="underline hover:text-gray-300"
                    >TMDb API</a
                >
                |
                Developed with <span class="fas fa-heart text-red-700"></span> By <a class="underline hover:text-gray-300" href="https://www.arabline.co/">ArabLine Co.</a>
            </div>
        </footer>

        <script
            src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.min.js"
            defer
        ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js"></script>
        @livewireScripts
        @yield('scripts')
    </body>
</html>

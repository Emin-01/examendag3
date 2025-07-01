<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Voedselbank Maaskantje')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex-shrink-0">
                        <h1 class="text-xl font-bold text-white">Voedselbank Maaskantje</h1>
                    </a>
                </div>
                
                <div class="flex items-center space-x-4">
                    @auth
                        <a href="{{ route('allergies.index') }}" class="text-white hover:text-blue-200 px-3 py-2 rounded-md">
                            Overzicht gezinsallergieën
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-white hover:text-blue-200 px-3 py-2 rounded-md">
                                Uitloggen
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-white hover:text-blue-200 px-3 py-2 rounded-md">
                            Inloggen
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>
</body>
</html>

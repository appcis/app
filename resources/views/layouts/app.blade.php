<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased" x-data="{ open: false }">
<div class="min-h-screen bg-gray-50 flex">

    <nav class="min-h-screen bg-gray-700 text-gray-100 md:static md:w-72" :class="open ? 'absolute w-4/6' : 'w-0 h-0'">
        <div class="flex items-center px-3 py-3 border-b border-gray-100">
            <img class="h-12 pr-8" src="{{ asset('img/logo.png') }}" alt="logo aups">
            <span class="text-2xl">CIS Aups</span>
        </div>
        <div class="border-b border-gray-100 py-4 px-3">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                {{ Auth::user()->name }} <button type="submit"><i class="fas fa-sign-out-alt"></i></button>
            </form>
        </div>
        <ul class="px-2 py-2 space-y-1">
            <li><a href="{{ route('sms.send') }}" class="block hover:bg-gray-600 py-2 px-4 rounded"><i class="fas fa-sms mr-4"></i> SMS</a></li>
            @can('admin')
            <li><a href="{{ route('agent.index') }}" class="block hover:bg-gray-600 py-2 px-4 rounded"><i class="fas fa-user mr-4"></i> Agent</a></li>
            <li><a href="{{ route('groupe.index') }}" class="block hover:bg-gray-600 py-2 px-4 rounded"><i class="fas fa-users mr-4"></i> Groupe</a></li>
            <li><a href="{{ route('utilisateur.index') }}" class="block hover:bg-gray-600 py-2 px-4 rounded"><i class="fas fa-user-cog mr-4"></i> Utilisateur</a></li>
            @endcan
        </ul>
    </nav>

    <!-- Page Content -->
    <main class="w-full">
        <div class="bg-gray-100 md:hidden">
            <i class="fas fa-bars p-6" @click="open = true"></i>
        </div>
        <div class="p-2 w-full">
            {{ $slot }}
        </div>
    </main>
</div>
</body>
</html>

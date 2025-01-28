<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{$title}}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        <script src="{{ mix('js/app.js') }}" defer></script>
    @endif

    <style>
        .line-end {
            float: right;
            text-align: right;
        }
    </style>

</head>
<body class="font-sans antialiased h-full bg-yellow-100">
<!--
This example requires updating your template:

```
<html class="h-full bg-gray-100">
<body class="h-full">
```
-->
<div class="min-h-full">

    <x-site-layout-menu />

    <header class="bg-yellow-100 shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <div class="flex items-center space-x-4">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{$title ?? 'unknown' }}</h1>
                <h2 class="text-xl italic text-gray-500"><livewire:quote-dynamic/></h2>
            </div>
        </div>
    </header>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <!-- Your content -->
            {{ $slot }}
        </div>
    </main>

    <x-site-layout-footer />
</div>



</body>
</html>
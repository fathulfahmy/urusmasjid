<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @isset($title)
            {{ str($title) }} -
        @endisset
        {{ config('app.name') }}
    </title>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="bg-white antialiased dark:bg-zinc-900">
    {{ $slot }}

    @livewire('notifications') {{-- Only required if you wish to send flash notifications --}}

    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>

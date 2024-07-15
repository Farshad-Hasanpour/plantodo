<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Dynamic meta and title -->
		@isset($metaKeys) <meta name="keywords" content="{{$metaKeys}}"> @endisset
		@isset($metaAuthor) <meta name="author" content="{{$metaAuthor}}"> @endisset
		@isset($metaDescription) <meta name="description" content="{{$metaDescription}}"> @endisset
		<title>@isset($title) {{$title . ' - '}} @endisset {{ config('app.name') }}</title>
        <!-- Favicon -->
		<link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
		<!-- Build styles and scripts -->
		@vite(['resources/sass/app.scss', 'resources/js/app.js'])
		@livewireStyles
		<!-- stack styles -->
		@stack('styles')
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <body>
        @yield('body')
		<!-- livewire scripts -->
		@livewireScriptConfig
		<!-- stack scripts -->
		@stack('scripts')
    </body>
</html>

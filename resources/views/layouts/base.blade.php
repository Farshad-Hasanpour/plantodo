<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">

		@php
			$metaDescription = config('app.name') . ' is a simple open-source to-do list powered by Livewire. It features multiple list creation, daily task reset to build habits, and much more.'
		@endphp
		<meta name="keywords" content="to-do list, free, open-source, multi-list, daily task reset, daily habit, planning, lifestyle">
		@isset($metaDescription) <meta name="description" content="{{$metaDescription}}"> @endisset
		<meta name="author" content="Farshad Hasanpour">
		<meta name="language" content="{{ str_replace('_', '-', app()->getLocale()) }}">
		@yield('other_meta_tags')

		<meta property="og:site_name" content="{{config('app.name')}}">
		<meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}">
		<meta property="og:image" content="{{config('app.url')}}/assets/img/dashboard.png">
		<meta property="og:title" content="@isset($title) {{$title . ' - '}} @endisset{{ config('app.name') }}">
		@isset($metaDescription) <meta property="og:description" content="{{$metaDescription}}"> @endisset
		<meta property="og:url" content="{{url()->current()}}">
		<meta property="og:type" content="website">

		<meta name="twitter:site" content="@F_Hasanpour">
		<meta name="twitter:card" content="summary">
		<meta name="twitter:image" content="{{config('app.url')}}/assets/img/dashboard.png">
		<meta name="twitter:title" content="@isset($title) {{$title . ' - '}} @endisset{{ config('app.name') }}">
		@isset($metaDescription) <meta property="twitter:description" content="{{$metaDescription}}"> @endisset
		<meta name="twitter:creator" content="@F_Hasanpour">

		<meta name="theme-color" content="#FF00FF">

		<title>@isset($title) {{$title . ' - '}} @endisset{{ config('app.name') }}</title>
		<!-- Font -->
		<link rel="stylesheet" href="https://rsms.me/inter/inter.css">
		<!-- Build styles and scripts -->
		@vite(['resources/sass/app.scss', 'resources/js/app.js'])
		<link rel="manifest" href="/build/manifest.webmanifest">
		<script id="vite-plugin-pwa:register" src="/build/registerSW.js"></script>
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

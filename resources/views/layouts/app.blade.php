@extends('layouts.base')

@section('body')
	<div class="min-h-screen bg-gray-200 flex flex-col items-stretch">
		<nav class="w-full p-4 h-[100px]">
			<div
				class="w-full h-full rounded-3xl flex items-center px-7 py-2 bg-purple-800 text-white"
				style="box-shadow: 0 8px 16px rgba(107, 33, 168, 0.6);"
			>
				@php
					$pages = [
						'todo-list' => 'My Todo List',
					]
				@endphp
				@foreach($pages as $name => $text)
					<a
						href="{{route($name)}}"
						@class([
							'px-4 py-2 mr-4 rounded-md uppercase',
							request()->is($name) ? 'bg-black bg-opacity-30' : 'hover:bg-black hover:bg-opacity-10'
						])
					>
						{{ $text }}
					</a>
				@endforeach
				<form action="{{route('logout')}}" method="POST" class="block ml-auto">
					@csrf
					<button
						type="submit"
						class="px-4 py-2 rounded-md uppercase hover:bg-black hover:bg-opacity-10"
					>LOGOUT</button>
				</form>
			</div>
		</nav>
		<main class="p-4">
			@yield('content')

			@isset($slot)
				{{ $slot }}
			@endisset
		</main>
	</div>
@endsection

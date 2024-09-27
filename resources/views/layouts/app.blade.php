@extends('layouts.base')

@section('other_meta_tags')
	<meta name="robots" content="noindex">
@endsection

@section('body')
	<div class="min-h-screen bg-gray-100 flex flex-col items-stretch">
		<nav class="w-full p-4 h-[100px]">
			<div
				class="w-full h-full rounded-3xl px-4 sm:px-7 py-2 flex justify-between items-center bg-primary text-white"
				style="box-shadow: 0 8px 16px rgba(107, 33, 168, 0.6);"
			>
				@php
					$pages = [
						'todo-list' => 'Tasks',
					]
				@endphp
				<div class="flex items-center">
					<a
						wire:navigate
						href="{{route('home')}}"
						class="mr-1 sm:mr-4"
					>
						<x-button variant="icon" class="p-1 hover:bg-transparent">
							<x-logo class="w-9 h-9" />
						</x-button>
					</a>

					@foreach($pages as $name => $text)
						<a
							wire:navigate
							href="{{route($name)}}"
							title="{{$text}}"
							@class([
								'sm:px-4 sm:py-2 mr-4 sm:rounded-md uppercase',
								\Request::route()->getName() === $name ? 'sm:bg-black/30' : 'sm:hover:bg-black/10'
							])
						>
							<span class="hidden sm:block">{{ $text }}</span>
							<x-button variant="icon-text" class="sm:hidden p-2">
								<x-icons.download-outline class="w-6 h-6 shrink-0" />
								<span class="text-xs">Tasks</span>
							</x-button>
						</a>
					@endforeach
				</div>

				<div class="flex items-center space-x-1">
					<form action="{{route('logout')}}" method="POST" class="block">
						@csrf
						<x-button type="submit" variant="icon-text" title="Logout" class="p-2">
							<x-icons.logout class="w-6 h-6 shrink-0" />
							<span class="text-xs">Logout</span>
						</x-button>
					</form>
					<x-dropdown h-align="right">
						<x-slot:trigger>
							<x-button variant="icon-text" title="Export tasks" class="p-2">
								<x-icons.download-outline class="w-6 h-6 shrink-0" />
								<span class="text-xs">Export</span>
							</x-button>
						</x-slot:trigger>
						<x-slot:list>
							<div class="select-none">
								<a
									href="{{route('export-to-google-drive')}}"
									class="p-2 text-gray-800 hover:bg-gray-100 flex items-center whitespace-nowrap"
								>
									<x-icons.google-drive class="w-5 h-5 mr-2" />
									<span>Export CSV to Google Drive</span>
								</a>
								<a
									href="{{route('download-csv-export')}}"
									class="p-2 text-gray-800 hover:bg-gray-100 flex items-center whitespace-nowrap"
								>
									<x-icons.cellpone-link class="w-5 h-5 mr-2" />
									<span>Export CSV to Device</span>
								</a>
							</div>
						</x-slot:list>
					</x-dropdown>
				</div>
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

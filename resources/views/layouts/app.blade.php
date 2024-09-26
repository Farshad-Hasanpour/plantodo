@extends('layouts.base')

@section('other_meta_tags')
	<meta name="robots" content="noindex">
@endsection

@section('body')
	<div class="min-h-screen bg-gray-100 flex flex-col items-stretch">
		<nav class="w-full p-4 h-[100px]">
			<div
				class="w-full h-full rounded-3xl flex justify-between items-center px-7 py-2 bg-primary text-white"
				style="box-shadow: 0 8px 16px rgba(107, 33, 168, 0.6);"
			>
				@php
					$pages = [
						'todo-list' => 'Tasks',
					]
				@endphp
				<div class="flex items-center">
					@foreach($pages as $name => $text)
						<a
							wire:navigate
							href="{{route($name)}}"
							@class([
								'px-4 py-2 mr-4 rounded-md uppercase',
								\Request::route()->getName() === $name ? 'bg-black/30' : 'hover:bg-black/10'
							])
						>
							{{ $text }}
						</a>
					@endforeach
				</div>

				<div class="flex items-center space-x-1">
					<x-dropdown h-align="right">
						<x-slot:trigger>
							<x-button variant="icon" title="Export tasks" class="p-2">
								<x-icons.download-outline class="w-6 h-6" />
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
					<form action="{{route('logout')}}" method="POST" class="block">
						@csrf
						<x-button type="submit" variant="icon" title="Logout" class="p-2">
							<x-icons.logout class="w-6 h-6" />
						</x-button>
					</form>
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

@props([
	'task',
])

<div
	{{ $attributes->merge([
    	'class' => 'w-full flex items-center px-6 border border-gray-400 rounded-2xl bg-white hover:bg-primary/5'
    ]) }}
	wire:key="{{ $task->id }}"
>
	<label
		class="grow mr-4 cursor-pointer min-h-[74px] select-none flex items-center overflow-hidden py-3"
		draggable="false"
		title="{{$task->title}}"
		@if($task->is_done)
			wire:click.prevent="makeTaskIncomplete({{$task->id}})"
		@else
			wire:click.prevent="completeTask({{$task->id}})"
		@endif
	>
		<input
			wire:loading.remove
			@if($task->is_done)
				wire:target="makeTaskIncomplete({{$task->id}})"
			@else
				wire:target="completeTask({{$task->id}})"
			@endif
			type="checkbox"
			@checked($task->is_done)
			class="w-7 h-7 cursor-pointer bg-transparent text-primary focus:ring-primary border-primary border-2 rounded-full"
		/>
		<svg
			wire:loading
			@if($task->is_done)
				wire:target="makeTaskIncomplete({{$task->id}})"
			@else
				wire:target="completeTask({{$task->id}})"
			@endif
			class="rotate w-7 h-7 text-primary"
			xmlns="http://www.w3.org/2000/svg"
			viewBox="0 0 24 24"
			fill="currentColor"
		>
			<title>loading</title>
			<path d="M12,4V2A10,10 0 0,0 2,12H4A8,8 0 0,1 12,4Z" />
		</svg>
		<span class="text-md lg:text-2xl font-normal text-gray-800 ms-4">{{$task->title}}</span>
	</label>
	<div class="actions flex items-center space-x-1">
		<x-button
			wire:loading.flex
			wire:target="delete({{$task->id}})"
			variant="icon"
			class="w-11 h-11 text-gray-600 flex items-center justify-center"
		>
			<svg
				class="rotate"
				xmlns="http://www.w3.org/2000/svg"
				viewBox="0 0 24 24"
				fill="currentColor"
				width="24"
				height="24"
			>
				<title>loading</title>
				<path d="M12,4V2A10,10 0 0,0 2,12H4A8,8 0 0,1 12,4Z" />
			</svg>
		</x-button>
		<x-button
			wire:loading.class="hidden"
			wire:target="delete({{$task->id}})"
			variant="icon"
			class="w-11 h-11 flex items-center justify-center text-gray-500"
			wire:click.stop="delete({{$task->id}});"
		>
			<x-icons.trash-can-outline class="w-6 h-6"></x-icons.trash-can-outline>
		</x-button>

		{{-- TODO: According to the below github issue, Livewire 3 can't handle alpine in dynamically changing loops  --}}
		{{-- https://github.com/livewire/livewire/discussions/7475 --}}
		<!-- <x-dropdown
			wire:loading.class="hidden"
			wire:target="delete({{$task->id}})"
			h-align="right"
		>
			<x-slot:trigger>
				<x-button variant="icon" class="w-11 h-11 text-2xl font-bold flex items-center justify-center">
					&vellip;
				</x-button>
			</x-slot:trigger>
			<x-slot:list>
				<ul class="select-none w-[140px]">
					<li
						class="p-2 hover:bg-gray-100 cursor-pointer text-error"
						wire:click.stop="delete({{$task->id}}); close();"
					>
						Delete
					</li>
				</ul>
			</x-slot:list>
		</x-dropdown> -->
	</div>
</div>

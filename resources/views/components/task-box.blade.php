@props([
	'task',
])

<div
	{{ $attributes->merge([
    	'class' => 'w-full flex items-center px-6 border border-gray-400 rounded-2xl bg-white'
    ]) }}
>
	<label
		wire:key="{{ $task->id }}"
		class="grow mr-4 cursor-pointer min-h-[74px] select-none flex items-center space-x-4 py-1"
		draggable="false"
		wire:click.prevent="{{$task->is_done ? 'makeTaskIncomplete(' . $task->id . ')' : 'completeTask(' . $task->id . ')'}}"
	>
		<input
			type="checkbox"
			@checked($task->is_done)
			class="w-7 h-7 text-primary focus:ring-primary rounded-full"
		/>
		<span class="text-md lg:text-2xl font-normal text-gray-800">{{$task->title}}</span>
	</label>
	<div class="actions flex items-center space-x-1">
		<x-dropdown h-align="right">
			<x-slot:trigger>
				<x-button variant="icon" class="w-11 h-11 text-2xl font-bold flex items-center justify-center">
					&vellip;
				</x-button>
			</x-slot:trigger>
			<x-slot:list>
				<ul class="select-none w-[140px]">
					<li
						class="p-2 hover:bg-gray-100 cursor-pointer text-red-600"
						wire:click.stop="delete({{$task->id}}); dropdownOpen = !dropdownOpen"
					>
						Delete
					</li>
				</ul>
			</x-slot:list>
		</x-dropdown>
	</div>
</div>

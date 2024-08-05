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
			class="w-7 h-7 text-purple-600 focus:ring-purple-600 rounded-full"
		/>
		<span class="text-md lg:text-2xl font-normal text-gray-800">{{$task->title}}</span>
	</label>
	<div class="actions space-x-1">
		<button
			type="button"
			wire:click.stop="delete({{$task->id}})"
		>Delete</button>
		<button type="button">more</button>
	</div>
</div>

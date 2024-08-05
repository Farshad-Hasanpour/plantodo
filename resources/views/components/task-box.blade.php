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
	<div class="actions flex items-center space-x-1">
		<x-dropdown h-align="right">
			<x-slot:trigger>
				<button class="flex items-center">
					<span>More</span>
					<svg
						width="20"
						height="20"
						viewBox="0 0 20 20"
						fill="none"
						xmlns="http://www.w3.org/2000/svg"
						class="fill-current ml-2"
					>
					   <path
						   d="M10 14.25C9.8125 14.25 9.65625 14.1875 9.5 14.0625L2.3125 7C2.03125 6.71875 2.03125 6.28125 2.3125 6C2.59375 5.71875 3.03125 5.71875 3.3125 6L10 12.5312L16.6875 5.9375C16.9688 5.65625 17.4063 5.65625 17.6875 5.9375C17.9687 6.21875 17.9687 6.65625 17.6875 6.9375L10.5 14C10.3437 14.1563 10.1875 14.25 10 14.25Z"
					   />
					</svg>
				</button>
			</x-slot:trigger>
			<x-slot:list>
				<ul class="select-none w-[140px]">
					<li
						class="p-2 hover:bg-gray-100 cursor-pointer"
						wire:click.stop="delete({{$task->id}}); dropdownOpen = !dropdownOpen"
					>
						Delete
					</li>
				</ul>
			</x-slot:list>
		</x-dropdown>
	</div>
</div>

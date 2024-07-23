<div>
	{{-- TODO: add lists later --}}
	{{--<div class="mb-8">
		@foreach($lists as $list)
			<button
				wire:key="{{$list->id}}"
				class="uppercase px-3 py-2 bg-purple-600 text-white rounded-md disabled:bg-gray-400"
				@disabled($list->id == $active_list_id)
				wire:click="loadList({{$list->id}})"
			>{{$list->name ?? 'My List'}}</button>
		@endforeach
		<button
			class="uppercase px-3 py-2 bg-purple-600 text-white rounded-md disabled:bg-gray-400"
		>+</button>
	</div>--}}
	<form wire:submit="store" class="mb-6">
		<input
			wire:model.defer="new_task.title"
			type="text"
			class="rounded-lg w-full min-w-[300px] max-w-[300px] focus:ring-0 border-2 focus:border-purple-600"
			placeholder="Enter the title and press enter"
		/>
		<button type="submit" class="uppercase px-3 py-2 bg-purple-600 text-white rounded-md">Add</button>
	</form>
	<div class="flex flex-col items-start space-y-3 mb-6">
		@foreach($tasks as $task)
			<div class="w-full flex items-center justify-between px-6 py-4 border border-gray-400 rounded-2xl bg-white">
				<label
					wire:key="{{ $task->id }}"
					class="cursor-pointer py-1 select-none flex items-center space-x-4"
					draggable="false"
				>
					<input type="checkbox" class="w-7 h-7 text-purple-600 focus:ring-purple-600 rounded-full" />
					<span class="text-2xl font-normal text-gray-800">{{$task->title}}</span>
				</label>
			</div>
		@endforeach
	</div>
	<div
		class="w-full text-gray-500 py-6 cursor-pointer space-y-1"
	>
		<h3 class="text-4xl font-bold">Completed</h3>
		<div class="text-sm ">Click to show/hide</div>
	</div>

</div>

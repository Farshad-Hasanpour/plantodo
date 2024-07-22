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
	<div class="flex flex-col items-start space-y-1">
		@foreach($tasks as $task)
			<label
				wire:key="{{ $task->id }}"
				class="cursor-pointer py-1 select-none flex items-center space-x-2"
				draggable="false"
			>
				<input type="checkbox" class="w-5 h-5 text-purple-600 focus:ring-purple-600 rounded-md" />
				<span class="text-2xl font-normal text-gray-800">{{$task->title}}</span>
			</label>
		@endforeach
	</div>

</div>

<div>
	<div class="mb-8">
		@foreach($lists as $list)
			<button
				class="uppercase px-3 py-2 bg-purple-600 text-white rounded-md disabled:bg-gray-400"
				@disabled($list->id == $active_list_id)
				wire:click="loadList({{$list->id}})"
			>{{$list->name ?? 'My List'}}</button>
		@endforeach
		<button
			class="uppercase px-3 py-2 bg-purple-600 text-white rounded-md disabled:bg-gray-400"
		>+</button>
	</div>
	<form wire:submit="store">
		<input type="text" wire:model="icon" />
		<input type="text" wire:model="task" />
		<button type="submit">submit</button>
	</form>
	<div class="flex flex-col items-start">
		@foreach($tasks as $task)
			<label class="cursor-pointer py-1">
				<input type="checkbox" />
				<span>{{$task->title}}</span>
			</label>
		@endforeach
	</div>

</div>

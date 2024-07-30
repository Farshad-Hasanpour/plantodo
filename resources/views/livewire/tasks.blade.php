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
	<form wire:submit="store" class="mb-4 mt-4 flex items-start">
		@csrf
		<label class="cursor-pointer w-full min-w-[300px] max-w-[300px]">
			<input
				wire:model.defer="new_task_title"
				type="text"
				class="rounded-lg w-full focus:ring-0 border-2 focus:border-purple-600 h-[44px]"
				placeholder="Enter the title and press enter"
			/>
			<span class="block w-full text-red-600 min-h-[24px]">
				@error('new_task_title') {{$message}} @enderror
			</span>
		</label>
		<button
			type="submit"
			class="uppercase px-3 py-2 bg-purple-600 text-white rounded-md flex-center min-w-[80px] h-[44px] ml-2"
		>
			<span wire:loading.remove>Add</span>
			<svg
				wire:loading
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
		</button>
	</form>
	<div class="flex flex-col items-start space-y-3 mb-6">
		@foreach($this->incompleteTasks as $task)
			<x-task-box :task="$task"></x-task-box>
		@endforeach
	</div>
	<div
		class="w-full text-gray-500 py-6 cursor-pointer space-y-1"
		wire:click="toggleCompletedList"
	>
		<div class="text-4xl font-bold flex items-center space-x-3">
			<h3>Completed ({{count($this->completedTasks)}})</h3>
			@if($this->show_completed)
				<span class="mb-3">&#8964;</span>
			@else
				<span class="mt-3">&#8963;</span>
			@endif
		</div>
		<div class="text-sm ">Click to show/hide</div>
	</div>
	@if($this->show_completed)
		<div class="flex flex-col items-start space-y-3 mb-6">
			@foreach($this->completedTasks as $task)
				<x-task-box :task="$task"></x-task-box>
			@endforeach
		</div>
	@endif
</div>

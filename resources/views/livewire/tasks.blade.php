<div class="flex flex-wrap">
	<div class="flex flex-wrap items-stretch mt-4 mb-8 -ml-2" style="width: calc(100% + 8px)">
		{{-- TODO: add list modal --}}
		<x-button class="flex items-center text-xl justify-center mb-2 ms-2 w-10 h-10">+</x-button>
		@foreach($this->lists as $list)
			<x-button
				wire:key="{{$list->id}}"
				class="mb-2 ms-2"
				:disabled="$list->id === $this->active_list_id"
				title="{{$list->name ?? 'My List'}}"
				wire:click="loadList({{$list->id}})"
			>{{$list->name ?? 'My List'}}</x-button>
		@endforeach
	</div>
	<form wire:submit="store" class="w-full flex items-start mb-2">
		<label class="w-full max-w-[300px]">
			<input
				wire:model.defer="new_task_form.title"
				type="text"
				class="rounded-lg w-full focus:ring-0 border-2 h-[44px] @error('new_task_form.title') border-error focus:border-error @else focus:border-primary @enderror"
				placeholder="Enter the title and press enter"
			/>
			<span class="block w-full text-error min-h-[24px]">
				@error('new_task_form.title') {{$message}} @enderror
			</span>
		</label>
		<x-button type="submit" class="min-w-[80px] h-11 ms-2">
			<span wire:loading.remove wire:target="store">Add</span>
			<svg
				wire:loading
				wire:target="store"
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
	</form>

	<div class="w-full flex flex-col items-start space-y-3 mb-6">
		@foreach($this->incompleteTasks as $task)
			<x-task-box :task="$task"></x-task-box>
		@endforeach
	</div>
	<div x-cloak x-data="{showCompleted: false}" class="w-full flex flex-col">
		<div
			class="self-start text-gray-500 py-6 cursor-pointer space-y-1 select-none"
			x-on:click="showCompleted = !showCompleted"
		>
			<div class="text-4xl font-bold flex items-center space-x-3">
				<h3>Completed ({{count($this->completedTasks)}})</h3>
				<span x-show="showCompleted" class="mb-3">&#8964;</span>
				<span x-show="!showCompleted" class="mt-3">&#8963;</span>
			</div>
			<div class="text-sm ">Click to show/hide</div>
		</div>
		<div
			x-show="showCompleted"
			x-transition
			class="flex flex-col items-start space-y-3 mb-6"
		>
			@foreach($this->completedTasks as $task)
				<x-task-box :task="$task"></x-task-box>
			@endforeach
		</div>
	</div>
</div>

@script
<script>
	console.log($wire);
</script>
@endscript

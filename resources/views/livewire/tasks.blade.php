<div class="flex flex-wrap">
	{{-- All lists plus add form --}}
	<div
		x-data="{todoListToEdit: null}"
		class="flex flex-wrap items-stretch mt-4 mb-16 -ml-2"
		style="width: calc(100% + 8px)"
	>
		<x-button
			class="box-center mb-2 ms-2 w-10 h-10 !p-0 bg-secondary"
			@click="
				$wire.list_form.name = '';
				todoListToEdit = null;
				$store.modals['todo-list-dialog'].open = true
			"
		>
			<x-icons.plus class="w-7 h-7"></x-icons.plus>
		</x-button>
		@foreach($this->lists as $list)
			<div
				wire:key="{{$list->id}}"
				@class([
					'bg-gray-600 cursor-not-allowed' => $list->id === $this->active_list_id,
					'bg-primary cursor-pointer' => $list->id !== $this->active_list_id,
					'mb-2 ms-2 text-sm btn uppercase px-3 min-h-10 text-white rounded-md truncate box-center'
				])
				title="View {{$list->name ?? 'My List'}}"
				wire:click="loadList({{$list->id}})"
			>
				<span>{{$list->name ?? 'My List'}}</span>
				@if($list->id === $this->active_list_id && $this->lists->count() > 1)
					<x-button
						variant="icon"
						class="ms-2 w-8 h-8"
						title="Delete {{$list->name}}"
						wire:confirm="Do you want to delete {{$list->name}} and all its tasks?"
						wire:click.stop="deleteList({{$list->id}})"
					>
						<x-icons.loading
							wire:loading.flex
							wire:target="deleteList({{$list->id}})"
							class="w-5 h-5"
						></x-icons.loading>
						<x-icons.trash-can-outline
							wire:loading.remove
							wire:target="deleteList({{$list->id}})"
							class="w-5 h-5"
						></x-icons.trash-can-outline>
					</x-button>
					<x-button
						variant="icon"
						class="w-7 h-7"
						title="Edit {{$list->name}}"
						@click.stop="
							$wire.list_form.name = '{{$list->name}}';
							todoListToEdit = {{Js::from($list)}};
							$store.modals['todo-list-dialog'].open = true
						"
					>
						<x-icons.pencil-outline class="w-5 h-5"></x-icons.pencil-outline>
					</x-button>
				@endif
			</div>
		@endforeach
		<x-tasks.list-dialog></x-tasks.list-dialog>
	</div>

	{{-- List Loader --}}
	<div
		wire:target="loadList"
		wire:loading.flex
		class="w-full box-center flex-wrap py-6"
	>
		<x-icons.loading class="w-12 h-12 text-primary mb-2"></x-icons.loading>
		<p class="w-full text-lg text-gray-500 text-center">
			Loading the list...
		</p>
	</div>

	{{-- Task form for the selected list --}}
	<form
		wire:submit="store"
		wire:target="loadList"
		wire:loading.remove
		class="w-full flex items-start mb-2"
	>
		<label class="w-full max-w-[300px]">
			<input
				wire:model.defer="new_task_form.title"
				type="text"
				class="rounded-lg w-full focus:ring-0 border-2 h-[44px] @error('new_task_form.title') border-error focus:border-error @else focus:border-primary @enderror"
				placeholder="Enter the title and press enter"
				maxlength="255"
			/>
			<span class="block w-full text-error min-h-[24px]">
				@error('new_task_form.title') {{$message}} @enderror
			</span>
		</label>
		<x-button type="submit" class="min-w-[80px] h-11 ms-2">
			<span wire:loading.remove wire:target="store">Add</span>
			<x-icons.loading
				wire:loading
				wire:target="store"
				class="w-6 h-6"
			></x-icons.loading>
		</x-button>
	</form>

	@if(!$this->tasks->count())
		<p
			wire:target="loadList"
			wire:loading.remove
			class="text-lg text-gray-500 w-full py-6 box-center text-center"
		>
			🕸️
			@if($this->lists->count())
				Your list is empty! Try another list or create new tasks for this list.
			@else
				No list! Get started by creating a new list.
			@endif
		</p>
	@else
		<div
			wire:target="loadList"
			wire:loading.remove
			class="w-full flex flex-col items-start space-y-3 mb-6"
		>
			@if($this->incompleteTasks->count())
				@foreach($this->incompleteTasks as $task)
					<x-tasks.task-box :task="$task"></x-tasks.task-box>
				@endforeach
			@else
				<p class="text-lg text-gray-500 w-full py-6 box-center text-center">
					🎉 Congratulations! All tasks in this list are completed.
				</p>
			@endif
		</div>
		<div
			wire:target="loadList"
			wire:loading.remove
			x-cloak
			x-data="{showCompleted: {{!$this->completedTasks->count() ? 'true' : 'false'}}}"
			class="w-full flex flex-col"
		>
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
				@if($this->completedTasks->count())
					@foreach($this->completedTasks as $task)
						<x-tasks.task-box :task="$task"></x-tasks.task-box>
					@endforeach
				@else
					<p class="text-lg text-gray-500 w-full py-6 box-center text-center">
						💪 Never give up! You can do it.
					</p>
				@endif
			</div>
		</div>
	@endif
</div>

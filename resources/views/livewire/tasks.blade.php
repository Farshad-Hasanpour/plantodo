<div class="flex flex-wrap">
	{{-- All lists plus add form --}}
	<div class="flex flex-wrap items-stretch mt-4 mb-8 -ml-2" style="width: calc(100% + 8px)">
		{{-- TODO: add list modal --}}
		<x-dialog
			title="Add a List"
			is_form
			on_save="addList"
		>
			<x-slot:trigger>
				<x-button
					class="flex items-center text-xl justify-center mb-2 ms-2 w-10 h-10"
				>+</x-button>
			</x-slot:trigger>

			<x-slot:content>
				<div class="w-full" @close-list-dialog.window="open = false">
					<input
						wire:model.defer="new_list_form.name"
						type="text"
						class="rounded-lg bg-gray-100 w-full focus:ring-0 border-2 @error('new_list_form.name') border-error focus:border-error @else focus:border-primary @enderror"
						placeholder="Enter the list name and press enter"
					/>
					<span class="block w-full text-error min-h-[24px]">
						@error('new_list_form.name') {{$message}} @enderror
					</span>
				</div>
			</x-slot:content>

			<x-slot:actions>
				<x-button type="submit" class="min-w-[100px]">
					<span wire:loading.remove wire:target="addList">Add</span>
					<x-icons.loading
						wire:loading
						wire:target="addList"
						class="w-6 h-6"
					></x-icons.loading>
				</x-button>
				<x-button
					variant="outline"
					class="min-w-[100px] text-error hover:bg-error"
					@click="open = false"
				>Close</x-button>
			</x-slot:actions>

			<x-slot:header_icon>
				<x-icons.pencil-plus-outline class="w-6 h-6"></x-icons.pencil-plus-outline>
			</x-slot:header_icon>
		</x-dialog>
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
					<x-task-box :task="$task"></x-task-box>
				@endforeach
			@else
				<p class="text-lg text-gray-500 w-full py-6 box-center text-center">
					🎉 Congratulations! All tasks completed.
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
						<x-task-box :task="$task"></x-task-box>
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

@script
<script>
	console.log($wire);
</script>
@endscript

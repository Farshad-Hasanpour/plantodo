<div>
	<form wire:submit="store">
		<input type="text" wire:model="icon" />
		<input type="text" wire:model="task" />
		<button type="submit">submit</button>
	</form>
	<ol>
		@foreach($tasks as $task)
			{{$task->title}}
		@endforeach
	</ol>
</div>

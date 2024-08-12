<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Models\Task;
use App\Models\TodoList;
use App\Livewire\Forms\NewTaskForm;
use App\Livewire\Forms\NewListForm;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class Tasks extends Component
{
	public $active_list_id = null;
	public NewTaskForm $new_task_form;
	public NewListForm $list_form;

	#[Computed]
	public function lists() {
		return TodoList::where('user_id', Auth::id())->get();
	}

	#[Computed]
	public function tasks(){
		// return empty collection if no list is selected
		if(!$this->active_list_id) return new EloquentCollection();

		// show tasks within the selected list
		$list = $this->lists->firstWhere('id', $this->active_list_id);
		if(!$list) return new EloquentCollection();
		return $list->tasks()->orderBy('priority', 'desc')->get();
	}

	#[Computed]
	public function completedTasks(){
		return $this->tasks->where('is_done', 1);
	}

	#[Computed]
	public function incompleteTasks(){
		return $this->tasks->where('is_done', 0);
	}

	public function addList(){
		$this->list_form->validate();

		$new_list = TodoList::create([
			'user_id' => Auth::id(),
			'name' => $this->list_form->name,
		]);
		$this->list_form->name = '';
		$this->loadList($new_list->id);
		$this->dispatch('close-list-dialog');
	}

	public function deleteList(TodoList $list){
		if($list->user_id !== Auth::id()) abort(403);
		if($this->lists->count() <= 1) return;
		$list->delete();
		unset($this->lists);
		$this->loadList();
	}

	public function store(){
		$this->new_task_form->validate();

		if(!$this->active_list_id) {
			$this->addError('new_task_form.title', 'Please select a list first.');
			return;
		};

		Task::create([
			'list_id' => $this->active_list_id,
			'title' => $this->new_task_form->title,
			'description' => empty($this->new_task_form->description)
				? null
				: $this->new_task_form->description,
			'priority' => 1 + $this->tasks->max('priority')
		]);
		$this->new_task_form->title = '';
		$this->new_task_form->description = '';

		// refresh computed property
		unset($this->tasks);
	}

	public function delete(Task $task){
		$this->authorize('update', $task);
		$task->delete();
	}

	public function completeTask(Task $task){
		$this->authorize('update', $task);
		$task->update([
			'is_done' => 1,
			'priority' => 1 + $this->tasks->max('priority')
		]);
		unset($this->tasks);
	}

	public function makeTaskIncomplete(Task $task){
		$this->authorize('update', $task);
		$task->update([
			'is_done' => 0,
			'priority' => 1 + $this->tasks->max('priority')
		]);
		unset($this->tasks);
	}

	public function loadList($id = null){
		if($id){
			$list = $this->lists->where('user_id', Auth::id())->find($id);
			if(!$list) abort(403);
		}
		$this->active_list_id = $id ?? $this->lists->first()?->id;
	}

	public function mount(){
		$this->loadList();
	}

    public function render(){
        return view('livewire.tasks');
    }
}

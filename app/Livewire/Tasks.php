<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Models\Task;
use App\Models\TodoList;
use App\Livewire\Forms\NewTaskForm;

class Tasks extends Component
{
	public $lists = [];
	public $active_list_id = null;
	public $tasks = [];
	public NewTaskForm $new_task_form;

	#[Computed]
	public function completedTasks(){
		return $this->tasks->where('is_done', 1);
	}

	#[Computed]
	public function incompleteTasks(){
		return $this->tasks->where('is_done', 0);
	}

	public function store(){
		$this->new_task_form->validate();

		if(!$this->active_list_id) return;
		Task::create([
			'list_id' => $this->active_list_id,
			'title' => $this->new_task_form->title,
			'description' => empty($this->new_task_form->description)
				? null
				: $this->new_task_form->description,
			'priority' => 1 + $this->tasks->max('priority')
		]);
		$this->new_task_title = '';
		$this->new_task_description = '';
		$this->loadList($this->active_list_id);
	}

	public function delete(Task $task){
		$task->delete();
		$this->loadList($this->active_list_id);
	}

	public function loadList($list_id = null){
		$list = $list_id
			? $this->lists->firstWhere('id', $list_id)
			: $this->lists->first();
		if(!$list) return;
		$this->active_list_id = $list->id;
		$this->tasks = $list->tasks()->orderBy('priority', 'desc')->get();
	}

	public function completeTask(Task $task){
		$task->update(['is_done' => 1]);
		$this->loadList($this->active_list_id);
	}

	public function makeTaskIncomplete(Task $task){
		$task->update(['is_done' => 0]);
		$this->loadList($this->active_list_id);
	}

	public function mount(){
		$this->lists = TodoList::where('user_id', Auth::id())->get();
		$this->loadList();
	}

    public function render(){
        return view('livewire.tasks');
    }
}

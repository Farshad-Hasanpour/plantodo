<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Computed;
// use Livewire\Attributes\Rule;
use App\Models\Task;
use App\Models\TodoList;

class Tasks extends Component
{
	public $lists = [];
	public $active_list_id = null;
	public $tasks = [];
	public $show_completed = false;

	// #[Rule('required|string', as: 'title')]
	public $new_task_title = '';

	// #[Rule('nullable|string', as: 'description')]
	public $new_task_description = '';

	#[Computed]
	public function completedTasks(){
		return $this->tasks->where('is_done', 1);
	}

	#[Computed]
	public function incompleteTasks(){
		return $this->tasks->where('is_done', 0);
	}

	public function toggleCompletedList(){
		$this->show_completed = !$this->show_completed;
	}

	public function store(){
		// $this->validate();
		$this->validate([
			'new_task_title' => 'required|string',
			'new_task_description' => 'nullable|string'
		], [], [
			'new_task_title' => 'title',
			'new_task_description' => 'description'
		]);

		if(!$this->active_list_id) return;
		Task::create([
			'list_id' => $this->active_list_id,
			'title' => $this->new_task_title,
			'description' => empty($this->new_task_description)
				? null
				: $this->new_task_description,
			'priority' => 1 + $this->tasks->max('priority')
		]);
		$this->new_task_title = '';
		$this->new_task_description = '';
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

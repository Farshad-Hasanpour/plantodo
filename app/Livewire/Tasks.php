<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Task;
use App\Models\TodoList;

class Tasks extends Component
{
	public $lists = [];
	public $active_list_id = null;
	public $tasks = [];

	public $new_task = [
		'title' => '',
		'description' => ''
	];

	public function store(){
		if(!$this->active_list_id || !$this->new_task['title']) return;
		Task::create([
			'list_id' => $this->active_list_id,
			'title' => $this->new_task['title'],
			'description' => empty($this->new_task['description'])
				? null
				: $this->new_task['description'],
		]);
		$this->new_task['title'] = '';
		$this->new_task['description'] = '';
		$this->loadList($this->active_list_id);
	}

	public function loadList($list_id){
		if(!$list_id) return;
		$new_list = $this->lists->firstWhere('id', $list_id);
		if($new_list){
			$this->active_list_id = $new_list->id;
			$this->tasks = $new_list->tasks;
		}
	}

	public function mount(){
		$this->lists = TodoList::where('user_id', Auth::id())->get();
		$firstList = $this->lists->first();
		if($firstList){
			$this->active_list_id = $firstList->id;
			$this->tasks = $firstList->tasks;
		}
	}

    public function render()
    {
        return view('livewire.tasks');
    }
}

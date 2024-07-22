<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Task;
use App\Models\TodoList as ListModel;

class TodoList extends Component
{
	public $lists = [];
	public $active_list_id = null;
	public $tasks = [];

	public $icon = '';
	public $task = '';
	public function store(){
		dd($this->icon);
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
		$this->lists = ListModel::where('user_id', Auth::id())->get();
		$firstList = $this->lists->first();
		if($firstList){
			$this->active_list_id = $firstList->id;
			$this->tasks = $firstList->tasks;
		}
	}

    public function render()
    {
        return view('livewire.todo-list');
    }
}

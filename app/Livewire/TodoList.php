<?php

namespace App\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Task;

class TodoList extends Component
{
	public $listToShow = null;
	public $icon = '';
	public $task = '';
	public function store(){
		dd($this->icon);
	}

    public function render()
    {
        return view('livewire.todo-list', [
			'tasks' => []
		]);
    }
}

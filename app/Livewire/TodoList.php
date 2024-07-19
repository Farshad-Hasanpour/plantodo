<?php

namespace App\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;

class TodoList extends Component
{
	public $icon = '';
	public $task = '';
	public function store(){
		dd($this->icon);
	}

    public function render()
    {
        return view('livewire.todo-list');
    }
}

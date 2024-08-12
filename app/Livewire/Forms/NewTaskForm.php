<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class NewTaskForm extends Form
{
	#[Rule('required|string|max:255', as: 'title')]
	public $title = '';

	#[Rule('nullable|string', as: 'description')]
	public $description = '';
}

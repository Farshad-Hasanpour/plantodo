<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Attributes\Rule;
use Livewire\Form;

class NewTaskForm extends Form
{
	#[Rule('required|string', as: 'title')]
	public $title = '';

	#[Rule('nullable|string', as: 'description')]
	public $description = '';
}

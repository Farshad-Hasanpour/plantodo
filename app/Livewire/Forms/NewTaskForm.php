<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class NewTaskForm extends Form
{
	#[Rule('required|string|max:255', as: 'title')]
	public $title = '';

	#[Rule('boolean', as: 'is_daily_habit')]
	public $is_daily_habit = false;

	#[Rule('string', as: 'description')]
	public $description = '';
}

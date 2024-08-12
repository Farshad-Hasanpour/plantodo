<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class NewListForm extends Form
{
	#[Rule('required|string|max:255', as: 'list name')]
	public $name = '';
}

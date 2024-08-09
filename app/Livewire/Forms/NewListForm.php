<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class NewListForm extends Form
{
	#[Rule('required|string', as: 'list name')]
	public $name = '';
}

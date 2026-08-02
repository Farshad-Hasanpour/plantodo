<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class UpdateProfileForm extends Form
{
	#[Rule('required|string|max:255', as: 'name')]
	public $name = '';

	#[Rule('required|email', as: 'email')]
    public $email = '';
}

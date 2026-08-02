<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class UpdatePasswordForm extends Form
{
	#[Rule('required|string|min:8|confirmed', as: 'new password')]
	public $new_password = '';

	#[Rule('required|string', as: 'password confirmation')]
    public $new_password_confirmation = '';
}

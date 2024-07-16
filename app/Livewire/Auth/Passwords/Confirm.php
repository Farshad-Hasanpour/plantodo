<?php

namespace App\Livewire\Auth\Passwords;

use Livewire\Component;

class Confirm extends Component
{
    /** @var string */
    public $password = '';

    public function confirm()
    {
        $this->validate([
            'password' => 'required|current_password',
        ]);

        session()->put('auth.password_confirmed_at', time());

        return redirect()->intended(route('todo-list'));
    }

    public function render()
    {
        return view('livewire.auth.passwords.confirm')
			->layoutData([
				'metaKeys' => 'key1',
				'metaDescription' => 'Some description',
				'metaAuthor' => 'John G__',
				'title' => 'Confirm Password'
			])
			->extends('layouts.auth');
    }
}

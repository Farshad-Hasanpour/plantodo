<?php

namespace App\Livewire\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Verify extends Component
{
    public function resend()
    {
        Auth::user()->sendEmailVerificationNotification();

        $this->dispatch('resent');

        session()->flash('resent');
    }

    public function render()
    {
		if (Auth::user()->hasVerifiedEmail()) {
			redirect(route('todo-list'));
		}

        return view('livewire.auth.verify')
			->layoutData([
				'metaKeys' => 'key1',
				'metaDescription' => 'Some description',
				'metaAuthor' => 'John G__',
				'title' => 'Email Verificaion'
			])->layout('layouts.auth');
    }
}

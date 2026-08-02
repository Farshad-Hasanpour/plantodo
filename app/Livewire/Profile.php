<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;
use App\Livewire\Forms\UpdateProfileForm;
use App\Livewire\Forms\UpdatePasswordForm;

class Profile extends Component
{
	public UpdateProfileForm $update_profile_form;
	public UpdatePasswordForm $update_password_form;

	public function mount()
	{
		$user = Auth::user();
		$this->update_profile_form->name = $user->name;
		$this->update_profile_form->email = $user->email;
	}

	public function updateProfile()
	{
		$this->update_profile_form->validate([
			'name' => ['required', 'string', 'max:255'],
			'email' => [
				'required',
				'email',
				Rule::unique('users', 'email')->ignore(Auth::id()),
			],
		]);

		Auth::user()->update([
			'name' => $this->update_profile_form->name,
			'email' => $this->update_profile_form->email,
		]);

		session()->flash('success_profile', 'Profile updated successfully.');
	}

	public function updatePassword()
	{
		$this->update_password_form->validate();

		Auth::user()->update([
			'password' => $this->update_password_form->new_password,
		]);

		$this->update_password_form->reset();

		session()->flash('success_password', 'Password updated successfully.');
	}

	public function render()
	{
		return view('livewire.profile')
			->layoutData([
				'title' => 'Profile',
			]);
	}
}

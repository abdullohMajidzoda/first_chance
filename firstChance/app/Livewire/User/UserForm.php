<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\User;

class UserForm extends Component
{
    #[Validate('required|min:2')]
    public string $name;

    #[Validate('required|email|unique:users')]
    public $email;

    #[Validate('required|min:4')]
    public $password;

    public function save(){
        $validated = $this->validate();
        User::create($validated);
        session()->flash('register', 'You Have Successfully Registered');
        return $this->redirectRoute('home', navigate: true);
    }

    public function render()
    {
        return view('livewire.user.user-form');
    }
}

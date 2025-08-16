<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class LoginForm extends Component
{

    #[Validate('required|email')]
    public $email;

    #[Validate('required|min:4')]
    public $password;

    public function save(){
        $validated = $this->validate();

        if(Auth::attempt($validated)){
            session()->flash('login_success', 'You Have Successfully Logged In');
            return $this->redirectRoute('home', navigate: true);
        }
        return back()->withErrors([
            session()->flash('login', 'Wrong Email Or Password'),
        ]);
    }

    public function render()
    {
        return view('livewire.user.login-form');
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Signin extends Component
{




  public $email;
    public $password;
    public $rememberMe = false;

    public function sign_in()
    {
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials, $this->rememberMe)) {
            // Authentication passed
            return redirect()->intended('/');
        } else {
            session()->flash('error', 'Invalid credentials. Please try again.');
        }
    }

    public function render()
    {
        return view('livewire.signin');
    }
}

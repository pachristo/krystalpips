<?php

namespace App\Livewire;





use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Register extends Component
{
    public $name;
    public $email;
    public $country;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'country' => 'required|string',
        'password' => 'required|min:8|confirmed',
    ];

    public function register()
    {
        $this->validate();

        // Create the user
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'country' => $this->country,
            'password' => Hash::make($this->password),
        ]);
       // Emit the registered event
    //    $this->emit('registered');
        // Redirect or emit an event for success
        return redirect()->route('login')->with('message', 'Registration Successful');
    }

    public function render()
    {
        return view('livewire.register');
    }
}

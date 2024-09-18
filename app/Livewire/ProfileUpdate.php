<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileUpdate extends Component
{
    use WithFileUploads;

    public $name;
    public $occupation;
    public $telegram_username;
    public $email;
    public $phone_numbers;
    public $profile_picture;
    public $profile_picture_preview;

    public function mount()
    {
        // Initialize with existing data if any
        $this->name =auth()->user()->name;  // Example data
      // Example data
        $this->telegram_username = auth()->user()->telegram;
        $this->email =auth()->user()->email;
        $this->phone_numbers = auth()->user()->phone;
        $this->profile_picture_preview = ''; // Preview Image
    }

    public function updatedProfilePicture()
    {
        // Automatically update the preview when the image is uploaded
        $this->validate([
            'profile_picture' => 'image|max:7024', // 1MB Max
        ]);

        $this->profile_picture_preview = $this->profile_picture->temporaryUrl();
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string',
            
            'telegram_username' => 'required|string',
            'email' => 'required|email',
            'phone_numbers.*' => 'required|string',
            'profile_picture' => 'nullable|image|max:7024',
        ]);

        // Store the profile picture if uploaded
        $path="";
        if ($this->profile_picture) {
            $path = $this->profile_picture->store('profile-pictures', 'public');
        }
    \App\Models\User::where('id',auth()->user()->id)->update([
        'name'=>$this->name,
        'telegram'=>$this->telegram_username,
        'phone'=>$this->phone_numbers,
        'avatar'=>$path
        
        
        ]);
        // Handle saving logic here (update user in DB etc.)
        
        // Example flash message for success
        session()->flash('message', 'Profile updated successfully.');
    }

    public function render()
    {
        return view('livewire.profile-update');
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ContactUs;
use Livewire\Attributes\Validate;

class Home extends Component
{
    #[Validate('required')]
    public $name = "";

    public $email = "";

    #[Validate('required|min:5')]
    public $contact = "";

    #[Validate('required')]
    public $inquiry = "";

    public function rules() 
    {
        return [
            'email' => 'required|email',
        ];
    }

    public function saveContact()
    {
        $this->validate();

        ContactUs::create(
            $this->only(['name', 'email', 'contact', 'inquiry'])
        );

        session()->flash('success', 'Your submission has been received successfully, we shall get back to you shortly.');


        $this->reset();
    }

    public function render()
    {
        return view('livewire.index');
    }
}

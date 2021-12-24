<?php

namespace App\Http\Livewire\Validate;

use Livewire\Component;

class Validate extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    protected $rules    = [
        'name' => 'required|min:3|max:14',
        'email' => 'required|email',
        'password' => 'required|min:6|max:14',
    ];
    /* 
    protected $message = [
        'name.required' => 'Emri edhe i obliguar',
        'name.min' => 'Emri :attribute  duhet te jete me i madh se 3 karaktere',
        'name.max' => 'Emri :attribute  duhet te jete me i vogel se 14 karaktere',
        'email.required' => 'Emaili eshte i obliguar',
        'email.email' => 'Emaili duhet te jete ne formatin e email',
    ];
    */

    // Validate after press submit button
    public function submit()
    {
        $this->validate();
    }

    //Live time validate
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.validate.validate');
    }
}

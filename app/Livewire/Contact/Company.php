<?php

namespace App\Livewire\Contact;

use Livewire\Component;
use App\Models\ContactCompany;

class Company extends Component
{

    public $name;
    public $identification;
    public $email;
    public $extra;
    public $choices;

    protected $rules = [
        'name' => 'required',
        'identification' => 'required',
        'email' => 'required|email',
        'extra' => 'required',
        'choices' => 'required',
    ];    


    public function render()
    {
        return view('livewire.contact.company');
    }

    function submit()
    {
        $this->validate();
        ContactCompany::create([
            'name' => $this->name,
            'identification' => $this->identification,
            'email' => $this->email,
            'extra' => $this->extra,
            'choices' => $this->choices,
        ]);
    }
}

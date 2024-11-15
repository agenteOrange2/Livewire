<?php

namespace App\Livewire\Contact;

use Livewire\Component;
use App\Models\ContactCompany;
use Livewire\Attributes\Layout;


#[Layout('layouts.contact')]
class Company extends Component
{

    public $name;
    public $identification;
    public $email;
    public $extra;
    public $choices;


    /*
    protected $rules = [
        'name' => 'required',
        'identification' => 'required',
        'email' => 'required|email',
        'extra' => 'required',
        'choices' => 'required',
    ];    */


    public function render()
    {
        return view('livewire.contact.company');
    }

    function submit()
    {
        /*$this->validate();
        ContactCompany::create([
            'name' => $this->name,
            'email' => $this->email,
            'identification' => $this->identification,
            'extra' => $this->extra,
            'choices' => $this->choices,
            'contact_general_id' => 1,
        ]);*/


    }
}

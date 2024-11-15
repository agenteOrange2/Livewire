<?php

namespace App\Livewire\Contact;

use Livewire\Component;
use App\Models\ContactPerson;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

class Person extends Component
{

    //Validación a nivel propiedad    
    public $name;
    public $surname;
    public $choices;
    public $other;

    protected $rules = [
        'name' => 'required|min:2|max:255',
        'surname' => 'required|min:2|max:255',
        'choices' => 'required',
        'other' => 'nullable',
    ];

    #[Layout('layouts.contact')]
    
    public function render()
    {
        return view('livewire.contact.person');
    }

    function submit()
    {
        /*
        $this->validate();
        ContactPerson::create([
            'name' => $this->name,
            'surname' => $this->surname,
            'choices' => $this->choices,
            'contact_general_id' => 1,
            'other' => $this->other
        ]);
        */
    }
}

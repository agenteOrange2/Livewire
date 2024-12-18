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
    
    public $parentId;
    
    protected $listeners = ['parentId'];

     function mount($parentId){

        logger()->info('Montando componente', ['parentId' => $parentId]);
         $this->parentId($parentId);
     }

    function parentId($parentId)
    {
        $this->parentId = $parentId;

        $c = ContactPerson::where('contact_general_id', $this->parentId)->first();
        if($c != null)
        {
            $this->name = $c->name;   
            $this->surname = $c->surname;
            $this->other = $c->other;
            $this->choices = $c->choices;
        }
    }


    #[Layout('layouts.contact')]

    public function render()
    {
        return view('livewire.contact.person');
    }

    function submit()
    {        
        $this->validate();
        ContactPerson::updateOrCreate(
            [
                'contact_general_id' => $this->parentId
            ],
            [
            'name' => $this->name,
            'surname' => $this->surname,
            'choices' => $this->choices,
            'contact_general_id' => $this->parentId,
            'other' => $this->other
        ]);
        

        $this->dispatch('stepEvent', 3);
    }

    function back()
    {
        $this->dispatch('stepEvent', 1);
    }
}

<?php

namespace App\Livewire\Contact;

use Livewire\Component;
use App\Models\ContactGeneral;
use Livewire\Attributes\Validate;


class General extends Component
{

    //Validacion a nivel propiedad
    /*#[Validate('required|min:2|max:255')]*/
    public $subject;
    /*#[Validate('required')]*/
    public $type;
    /*#[Validate('required|min:2')]*/
    public $message;


    public $step = 1;
    public $pk;

    protected $listeners = ['stepEvent' => 'stepEvent']; // Escucha el evento 'stepEvent'

    function stepEvent(int $step)
    {
        $this->step = $step;
        $this->dispatch('parentId', $this->pk);
    }

    public function render()
    {
        return view('livewire.contact.general')->layout('layouts.contact');
    }

    function submit()
    {

        // $this->validate();
        /*
        if ($this->pk) {
            ContactGeneral::where('id', $this->pk)->update([
                'subject' => $this->subject,
                'type' => $this->type,
                'message' => $this->message,
            ]);
        } else {
            $this->pk = ContactGeneral::create([
                'subject' => $this->subject,
                'type' => $this->type,
                'message' => $this->message,
            ])->id;            
        }

        if ($this->type == 'company') {
            $this->step = 2;
        } else if ($this->type == 'person') {
            $this->step = 2.5;
        }
        */        
    }
}

<?php

namespace App\Livewire\Contact;

use Livewire\Component;
use App\Models\ContactGeneral;
use Livewire\Attributes\Validate;

class General extends Component
{

    //Validacion a nivel propiedad
    #[Validate('required|min:2|max:255')]
    public $subject;
    #[Validate('required')]
    public $type;
    #[Validate('required|min:2')]
    public $message;

    //Implementar validaciones
    /*protected $rules = [
        'subject' => 'required|min:2|max:255',
        'type' => 'required',
        'message' => 'nullable|min:2'
    ];*/    

    public function render()
    {
        return view('livewire.contact.general');
    }

    function submit()
    {
        $this->validate();

        ContactGeneral::create([
            'subject' => $this->subject,
            'type' => $this->type,
            'message' => $this->message
        ]);

    }
}

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
    
    protected $rules = [
        'name' => 'required',
        'identification' => 'required',
        'email' => 'required|email',
        'extra' => 'required',
        'choices' => 'required',
    ];
      
    public $parentId;
    
    protected $listeners = ['parentId'];

    function mount($parentId)
    {
        logger()->info('Montando componente', ['parentId' => $parentId]);
        $this->parentId($parentId);
    }


    function parentId($parentId)
    {

        logger()->info('Evento parentId recibido', ['parentId' => $parentId]);

        $this->parentId = $parentId;

        $c = ContactCompany::where('contact_general_id', $this->parentId)->first();
        if($c != null)
        {
            $this->name = $c->name;   
            $this->identification = $c->identification;
            $this->extra = $c->extra;
            $this->choices = $c->choices;  
            $this->email = $c->email;

            logger()->info('Datos cargados', [
                'name' => $this->name,
                'identification' => $this->identification,
                'extra' => $this->extra,
                'choices' => $this->choices,
                'email' => $this->email,
            ]);
        } else {
            logger()->warning('No se encontraron datos para parentId', ['parentId' => $this->parentId]);
        
        }
    }


    public function render()
    {
        return view('livewire.contact.company');
    }

    function submit()
    {
        $this->validate();

        $company = ContactCompany::updateOrCreate(
            [
                'contact_general_id' => $this->parentId
            ],
            [
            'name' => $this->name,
            'email' => $this->email,
            'identification' => $this->identification,
            'extra' => $this->extra,
            'choices' => $this->choices,
            'contact_general_id' => $this->parentId,
        ]);
        
        
    logger()->info('Registro guardado en ContactCompany', [
        'contact_general_id' => $company->contact_general_id,
        'name' => $company->name,
        'email' => $company->email,
    ]);


        $this->dispatch('stepEvent', 3);

    }

    function back()
    {
        $this->dispatch('stepEvent', 1);
    }
}

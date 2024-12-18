<?php

namespace App\Livewire\Contact;

use Livewire\Component;
use App\Models\ContactDetail;
use App\Models\ContactGeneral;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

#[Layout('layouts.contact')]
class Detail extends Component
{

    #[Validate('required|min:2|max:255')]
    public $extra;

    public $parentId;
    
    protected $listeners = ['parentId'];

    function mount($parentId){
        $this->parentId($parentId);
    }


    function parentId($parentId)
    {
        $this->parentId = $parentId;

        $c = ContactDetail::where('contact_general_id', $this->parentId)->first();
        if ($c != null) {
            $this->extra = $c->extra;
        }
    } 

    public function render()
    {
        return view('livewire.contact.detail');
    }

    function submit()
    {

        $this->validate();

        ContactDetail::updateOrCreate(
            [
                'contact_general_id' => $this->parentId
                ]
            ,
            [
                'extra' => $this->extra,
                'contact_general_id' => $this->parentId,
            ]
        );
        
        
        $this->dispatch('stepEvent', 4);
    }

    function back()
    {
        logger()->info('Paso 3: Retrocediendo', [
            'parentId' => $this->parentId,
            'type' => ContactGeneral::find($this->parentId)->type ?? null,
        ]);
    
        $contactGeneral = ContactGeneral::find($this->parentId);
    
        if ($contactGeneral) {
            if ($contactGeneral->type == 'company') {
                $this->dispatch('stepEvent', 2);
            } else if ($contactGeneral->type == 'person') {
                $this->dispatch('stepEvent', 2.5);
            }
        }
    }
}    
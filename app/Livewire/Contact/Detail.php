<?php

namespace App\Livewire\Contact;

use Livewire\Component;
use App\Models\ContactDetail;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

#[Layout('layouts.contact')]
class Detail extends Component
{

    #[Validate('required|min:2|max:255')]
    public $extra;

    public $parentId;
    
    protected $listeners = ['parentId'];

    function parentId($parentId)
    {
        $this->parentId = $parentId;
    }

    // protected $rules = [
    //     'extra' => 'required',
    // ];    


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
            ],
            [
            'extra' => $this->extra,
            'contact_general_id' => 1,            
        ]);
        
        $this->dispatch('stepEvent', 4);
    }
}

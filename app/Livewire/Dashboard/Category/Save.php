<?php

namespace App\Livewire\Dashboard\Category;

use Livewire\Component;
use App\Models\Category;

class Save extends Component
{

    public $title;
    public $text;

    public function render()
    {
        return view('livewire.dashboard.category.save');
    }

    function submit(){
        Category::create(
            [
                'title' => $this->title,
                'text' => $this->text,
                'slug' => str($this->title)->slug(),
            ]
            );
    }
}

<?php

namespace App\Livewire\Dashboard\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class Index extends Component
{    

    use WithPagination;

    public function render()
    {
        $categories = Category::paginate(5);
        return view('livewire.dashboard.category.index', compact('categories'));
    }

    function delete(Category $category){
        $category->delete();
        $this->dispatch('deleted');
    }
}

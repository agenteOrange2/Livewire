<?php

namespace App\Livewire\Dashboard\Post;
<<<<<<< HEAD
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

=======

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
>>>>>>> 84254cf7c75f8aab1a4ac073e5024dce07e0651a

class Index extends Component
{

    use WithPagination;
    public $confirmingDeletePost;
    public $postToDelete;

    function selectPostToDelete(Post $post)
    {
        $this->confirmingDeletePost = true;
        $this->postToDelete = $post;
    }

<<<<<<< HEAD

=======
>>>>>>> 84254cf7c75f8aab1a4ac073e5024dce07e0651a
    public function render()
    {
        $posts = Post::paginate(2);
        return view('livewire.dashboard.post.index', compact('posts'));
<<<<<<< HEAD
=======
    }

    function delete()
    {
        $this->postToDelete->delete();
        $this->confirmingDeletePost = false;
        $this->dispatch('deleted');
>>>>>>> 84254cf7c75f8aab1a4ac073e5024dce07e0651a
    }


    function delete()
    {
        $this->postToDelete->delete();
        $this->confirmingDeletePost = false;
        $this->dispatch('deleted');
    }

}
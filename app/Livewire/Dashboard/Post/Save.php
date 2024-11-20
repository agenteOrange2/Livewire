<?php

namespace App\Livewire\Dashboard\Post;

use App\Models\Post;
use Livewire\Component;

class Save extends Component
{
    public $title;
    public $description;
    public $text;
    public $type;
    public $posted;
    public $category_id;
    public $mage;
    public $date;

    public $post;

    public function render()
    {
        return view('livewire.dashboard.post.save');
    }

    protected $rules = [
        'title' => 'required',
        'description' => 'required',
        'text' => 'required',
        'type' => 'required',
        'posted' => 'required',
        'category_id' => 'required',
        'mage' => 'required',
        'date' => 'required',
    ];

    function mount(?int $id = null)
    {
        if ($id != null) {
            $this->post = Post::findOrFail($id);
            $this->title = $this->post->title;
            $this->description = $this->post->description;
            $this->text = $this->post->text;
            $this->category_id = $this->post->category_id;
            $this->posted = $this->post->posted;
            $this->type = $this->post->description;
            $this->date = $this->post->date;
        }
    }

    function submit()
    {
        $this->validate();

        if ($this->post) {
            $this->post->update(
                [
                    'title' => $this->title,
                    'text' => $this->text,
                    'description' => $this->description,
                    'category_id' => $this->category_id,
                    'date' => $this->date,
                    'type' => $this->type,
                    'posted' => $this->posted,
                    'slug' => str($this->title)->slug(),

                ]
            );
            $this->dispatch('updated');
        } else {
            $this->post = Post::create(
                [
                    'title' => $this->title,
                    'text' => $this->text,
                    'description' => $this->description,
                    'category_id' => $this->category_id,
                    'date' => $this->date,
                    'type' => $this->type,
                    'posted' => $this->posted,
                    'slug' => str($this->title)->slug(),
                ]
            );
            $this->dispatch('created');
        }

        //Upload
        if($this->image)
        {
            $imageName = $this->post->slug . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('images/post', $imageName, 'public_upload');

            $this->post->update([
                'image' => $imageName
            ]);
        }
    }
}

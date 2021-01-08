<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Str;
use Livewire\Component;

class AdminPost extends Component
{
    /** @var Post[] */
    public $posts = [];

    public ?Post $post;

    public bool $isOpen = false;

    public function mount()
    {
        $this->post = new Post();
    }

    public function render()
    {
        $this->posts = Post::all();
        return view('livewire.admin-post')
            ->extends('layouts.app')
            ->section('content');
    }

    public function create()
    {
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function store()
    {
        $this->validate([
            'post.title' => 'required|min:6',
            'post.body' => 'required|min:6',
        ]);

        $this->post->is_active = 1;
        $this->post->slug = Str::slug($this->post->title);
        $this->post->save();

        session()->flash('message',
            $this->post->id ? 'Student Updated Successfully.' : 'Student Created Successfully.');

        $this->closeModal();
    }

    public function edit($id)
    {
        $this->post = Post::findOrFail($id);
        $this->openModal();
    }

    public function delete($id)
    {
        Post::find($id)->delete();
        session()->flash('message', 'Student Deleted Successfully.');
    }
}

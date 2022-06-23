<?php

namespace App\Http\Livewire\Pages;

use App\Models\Category as ModelsCategory;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Category extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $categories = ModelsCategory::orderBy('updated_at','desc')->get();
        $posts = Post::orderBy('updated_at','desc')->paginate(5);
        return view('livewire.pages.category',['categories'=>$categories,'posts'=>$posts])->layout('layouts.base');
    }
}

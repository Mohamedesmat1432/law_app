<?php

namespace App\Http\Livewire\Pages;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $cate_id;

    public function mount($cate_id){
        $this->cate_id = $cate_id;
    }

    public function render()
    {
        $categories = Category::orderBy('updated_at','desc')->get();
        $posts = Post::where('category_id',$this->cate_id)->orderBy('updated_at','desc')->paginate(5);
        return view('livewire.pages.category-component',['categories'=>$categories,'posts'=>$posts])->layout('layouts.base');
    }
}

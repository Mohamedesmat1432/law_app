<?php

namespace App\Http\Livewire\Pages;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $seachItem;

    public function render()
    {
        $seachItem = '%'.$this->seachItem.'%';

        $posts = Post::where('name','like',$seachItem)->
                        orwhere('description','like',$seachItem)->
                        orwhere('created_at','like',$seachItem)->
                        orwhere('updated_at','like',$seachItem)->
                        orderBy('updated_at','desc')->paginate(5);
        return view('livewire.pages.post-component',['posts'=>$posts])->layout('layouts.base');
    }
}

<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use livewire\WithPagination;

class AdminPost extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $ids;
    public $name;
    public $description;
    public $category_id;
    public $seachItem = '';

    public function resetInput(){
        $this->name = '';
        $this->description = '';
        $this->category_id = '';
    }
    public function createPost () {
        $this->validate([
            'name' => 'required',
            'description' => 'required' ,
            'category_id' => 'required'
        ]);

        $post = new Post();
        $post->name = $this->name;
        $post->description = $this->description;
        $post->category_id = $this->category_id;
        $post->save();
        session()->flash('message','تم اضافة المنشور بنجاح');
        $this->resetInput();
        $this->emit('postCreated');
    }

    public function edit($id) {
        $post = Post::where('id',$id)->first();
        $this->ids = $post->id;
        $this->name = $post->name;
        $this->description = $post->description;
        $this->category_id = $post->category_id;
    }
    public function updatePost() {
        $this->validate([
            'name' => 'required',
            'description' => 'required' ,
            'category_id' => 'required'
        ]);

        if($this->ids){
            $post = Post::find($this->ids);
            $post->name = $this->name;
            $post->description = $this->description;
            $post->category_id = $this->category_id;
            $post->save();
            session()->flash('message','تم تعديل المنشور بنجاح');
            $this->resetInput();
            $this->emit('postUpdated');
        }
    }

    public function delete($id) {
        $post = Post::find($id);
        $post->delete();
        session()->flash('message','تم حذف المنشور بنجاح');
    }
    public function render()
    {
        $seachItem = '%'.$this->seachItem.'%';
        $categories = Category::get();
        $posts = Post::where('name','like',$seachItem)->
                        orwhere('description','like',$seachItem)->
                        orwhere('created_at','like',$seachItem)->
                        orwhere('updated_at','like',$seachItem)->
                        orderBy('updated_at','desc')->paginate(5);
        return view('livewire.admin.admin-post',['posts'=>$posts,'categories'=>$categories])->layout('layouts.base');
    }
}

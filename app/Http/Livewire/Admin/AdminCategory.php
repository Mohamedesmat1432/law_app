<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCategory extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $ids;
    public $name;
    public $seachItem = '';
    public $updateModel;

    public function resetInput(){
        $this->name = '';
    }

    public function createCategory(){
        $this->validate([
            'name' => 'required'
        ]);
        $category = new Category();
        $category->name = $this->name;
        $category->save();
        session()->flash('message','تم اضافة القسم بنجاح');
        $this->resetInput();
        $this->emit('categoryCreated');
    }

    public function edit($id){
        $category = Category::where('id',$id)->first();
        $this->ids = $category->id;
        $this->name = $category->name;
    }
    public function updateCategory(){
        $this->validate([
            'name'=>'required'
        ]);
        if($this->ids){
            $category = Category::find($this->ids);
            $category->name = $this->name;
            $category->save();
            session()->flash('message','تم تعديل القسم بنجاح');
            $this->resetInput();
            $this->emit('categoryUpdated');
        }
    }
    public function delete($id){
        $category = Category::find($id);
        $category->delete();
        session()->flash('message','تم حذف القسم بنجاح');
    }
    public function render()
    {
        $seachItem = '%'.$this->seachItem.'%';
        $categories = Category::where('name','like',$seachItem)->
                                orwhere('created_at','like',$seachItem)->
                                orwhere('updated_at','like',$seachItem)->
                                orderBy('id','desc')->paginate(5);
        return view('livewire.admin.admin-category',['categories'=>$categories])->layout('layouts.base');
    }
}

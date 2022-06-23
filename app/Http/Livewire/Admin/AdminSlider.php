<?php

namespace App\Http\Livewire\Admin;

use App\Models\Slider;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class AdminSlider extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $ids;
    public $title;
    public $description;
    public $image;
    public $link;
    public $newimage;
    public $seachItem = '';

    public function resetInput(){
        $this->title = '';
        $this->description = '';
        $this->image = '';
        $this->link = '';
        if($this->newimage){
            $this->newimage = '';
        }
    }

    public function createSlider(){
        $this->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'required|mimes:jpeg,png,jpg',
            'link'=>'required',
        ]);
        $slider = new Slider();
        $slider->title = $this->title;
        $slider->description = $this->description;
        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('sliders',$imageName);
        $slider->image = $imageName;
        $slider->link = $this->link;
        $slider->save();
        session()->flash('message','تم اضافة الواجهة جديد بنجاح');
        $this->resetInput();
        $this->emit('sliderCreated');
    }
    public function edit($id){
        $slider = Slider::where('id',$id)->first();
        $this->ids = $slider->id;
        $this->title = $slider->title;
        $this->description = $slider->description;
        $this->image = $slider->image;
        $this->link = $slider->link;
    }
    public function updateSlider(){
        $this->validate([
            'title'=>'required',
            'description'=>'required',
            // 'image'=>'required|mimes:jpeg,jpg,png',
            'link'=>'required'
        ]);
        if($this->newimage){
            $this->validate([
                'newimage'=>'required|mimes:jpeg,jpg,png'
            ]);
        }
        if($this->ids){
            $slider = Slider::find($this->ids);
            $slider->title = $this->title;
            $slider->description = $this->description;
            if($this->newimage){
                unlink('assets/images/sliders/'.$slider->image);
                $imageName1 = Carbon::now()->timestamp.'.'.$this->newimage->extension();
                $this->newimage->storeAs('sliders',$imageName1);
                $slider->image = $imageName1;
            }
            $slider->link = $this->link;
            $slider->save();
            session()->flash('message','تم تعديل الواجهة بنجاح');
            $this->resetInput();
            $this->emit('sliderUpdated');
        }
    }
    public function delete($id)
    {
        $slider = Slider::find($id);

        if($slider->image)
        {
            unlink('assets/images/sliders/'.$slider->image);
        }
        $slider->delete();
        session()->flash('message','تم حذف الواجهة بنجاح!');
    }
    public function render()
    {
        $seachItem = '%'.$this->seachItem.'%';
        $sliders = Slider::where('title','like',$seachItem)->
                            orwhere('description','like',$seachItem)->
                            orwhere('created_at','like',$seachItem)->
                            orwhere('updated_at','like',$seachItem)->
                            orderBy('updated_at','desc')->paginate(5);
        return view('livewire.admin.admin-slider',['sliders'=>$sliders])->layout('layouts.base');
    }
}

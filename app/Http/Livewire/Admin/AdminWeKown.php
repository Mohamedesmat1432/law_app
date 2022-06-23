<?php

namespace App\Http\Livewire\Admin;

use App\Models\WeKown;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class AdminWeKown extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $ids;
    public $name;
    public $image;
    public $information;
    public $phone;
    public $address;
    public $newimage;
    public $seachItem = '';

    public function resetInput(){
        $this->name = '';
        $this->image = '';
        $this->information = '';
        $this->phone = '';
        $this->address = '';
        if($this->newimage){
            $this->newimage = '';
        }
    }

    public function createWeKown(){
        $this->validate([
            'name'=>'required',
            'image'=>'required|mimes:jpeg,png,jpg',
            'information'=>'required',
            'phone'=>'required|numeric',
            'address'=>'required'
        ]);
        $data = new WeKown();
        $data->name = $this->name;
        $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('personals',$imageName);
        $data->image = $imageName;
        $data->information = $this->information;
        $data->phone = $this->phone;
        $data->address = $this->address;
        $data->save();
        session()->flash('message','تم اضافة عضو جديد بنجاح');
        $this->resetInput();
        $this->emit('WeKownCreated');
    }
    public function edit($id){
        $data = WeKown::where('id',$id)->first();
        $this->ids = $data->id;
        $this->name = $data->name;
        $this->image = $data->image;
        $this->information = $data->information;
        $this->phone = $data->phone;
        $this->address = $data->address;
    }
    public function updateWeKown(){
        $this->validate([
            'name'=>'required',
            // 'image'=>'required|mimes:jpeg,jpg,png',
            'information'=>'required',
            'phone'=>'required',
            'address'=>'required',
        ]);
        if($this->newimage){
            $this->validate([
                'newimage'=>'required|mimes:jpeg,jpg,png'
            ]);
        }
        if($this->ids){
            $data = WeKown::find($this->ids);
            $data->name = $this->name;
            if($this->newimage){
                unlink('assets/images/personals/'.$data->image);
                $imageName1 = Carbon::now()->timestamp . '.' . $this->newimage->extension();
                $this->newimage->storeAs('personals',$imageName1);
                $data->image = $imageName1;
            }else{
                $data->image = $this->image;
            }
            $data->information = $this->information;
            $data->phone = $this->phone;
            $data->address = $this->address;
            $data->save();
            session()->flash('message','تم تعديل العضو بنجاح');
            $this->resetInput();
            $this->emit('weKownUpdated');
        }
    }
    public function delete($id)
    {
        $data = WeKown::find($id);

        if($data->image)
        {
            unlink('assets/images/personals/'. $data->image);
        }
        $data->delete();
        session()->flash('message','تم حذف العضو بنجاح!');
    }
    public function render()
    {
        $seachItem ='%'.$this->seachItem.'%';
        $weKownDatas = WeKown::where('name','like',$seachItem)->
                        orWhere('name','like',$seachItem)->
                        orWhere('information','like',$seachItem)->
                        orWhere('phone','like',$seachItem)->
                        orWhere('address','like',$seachItem)->
                        orWhere('created_at','like',$seachItem)->
                        orWhere('updated_at','like',$seachItem)->
                        orderBy('id','desc',)->paginate(5);
        return view('livewire.admin.admin-we-kown',['weKownDatas'=>$weKownDatas])->layout('layouts.base');
    }
}

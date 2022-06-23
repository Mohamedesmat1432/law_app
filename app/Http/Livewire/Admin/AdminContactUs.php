<?php

namespace App\Http\Livewire\Admin;

use App\Models\ContactUs;
use Livewire\Component;
use Livewire\WithPagination;

class AdminContactUs extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $ids;
    public $name;
    public $address;
    public $phone;
    public $problem;
    public $seachItem = '';

    public function resetInput(){
        $this->name = '';
        $this->address = '';
        $this->phone = '';
        $this->problem = '';
    }

    public function createContact() {
        $validateData = $this->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required:numeric',
            'problem' => 'required'
        ]);
        $contact = new ContactUs();
        $contact->name = $this->name;
        $contact->address =$this->address;
        $contact->phone = $this->phone;
        $contact->problem = $this->problem;
        $contact->save();
        session()->flash('message','تم ارسال البيانات بنجاح');
        $this->resetInput();
        $this->emit('contactCreated');

    }
    public function edit($id){
        $contact = ContactUs::where('id',$id)->first();
        $this->ids = $contact->id;
        $this->name = $contact->name;
        $this->address = $contact->address;
        $this->phone = $contact->phone;
        $this->problem = $contact->problem;
    }
    public function updateContact(){
        $this->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required:numeric',
            'problem' => 'required'
        ]);
        if($this->ids) {
            $contact = ContactUs::find($this->ids);
            $contact->name = $this->name;
            $contact->address =$this->address;
            $contact->phone = $this->phone;
            $contact->problem = $this->problem;
            $contact->save();
            session()->flash('message','تم تعديل البيانات بنجاح');
            $this->resetInput();
            $this->emit('contactUpdated');
        }
    }
    public function delete($id) {
        $contact = ContactUs::find($id);
        $contact->delete();
        session()->flash('message','تم حذف العميل بنجاح');
    }
    public function render()
    {
        $seachItem ='%'.$this->seachItem.'%';
        $contact_us = ContactUs::where('name','like',$seachItem)->
                                orwhere('address','like',$seachItem)->
                                orwhere('phone','like',$seachItem)->
                                orwhere('problem','like',$seachItem)->
                                orwhere('created_at','like',$seachItem)->
                                orwhere('updated_at','like',$seachItem)->
                                orderBy('id','desc')->paginate(5);
        return view('livewire.admin.admin-contact-us',['contact_us'=>$contact_us])->layout('layouts.base');
    }
}

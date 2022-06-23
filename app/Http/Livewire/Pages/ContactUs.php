<?php

namespace App\Http\Livewire\Pages;

use App\Models\ContactUs as ModelsContactUs;
use Livewire\Component;

class ContactUs extends Component
{
    public $name;
    public $address;
    public $phone;
    public $problem;

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
        $contact = new ModelsContactUs();
        $contact->name = $this->name;
        $contact->address =$this->address;
        $contact->phone = $this->phone;
        $contact->problem = $this->problem;
        $contact->save();
        session()->flash('message','تم ارسال البيانات بنجاح سيتم التواصل معك في اقرب وقت.');
        $this->resetInput();

    }
    public function render()
    {
        return view('livewire.pages.contact-us')->layout('layouts.base');
    }
}

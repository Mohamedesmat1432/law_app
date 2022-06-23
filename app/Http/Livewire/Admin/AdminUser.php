<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class AdminUser extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $ids;
    public $name;
    public $email;
    public $password;
    public $utype;


    public function resetInput(){
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->utype = '';
    }

    public function createUser(){
        $this->validate([
            'name' =>  ['required', 'string', 'max:255'],
            'email' => ['required','string', 'email', 'max:255', 'unique:users'] ,
            'password' => 'required',
            'utype' => 'required',
        ]);
        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        $user->utype = $this->utype;
        $user->save();
        session()->flash('message','تم اضافة القسم بنجاح');
        $this->resetInput();
        $this->emit('userCreated');
    }

    public function edit($id){
        $user = User::where('id',$id)->first();
        $this->ids = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->utype = $user->utype;
    }
    public function updateUser(){
        $this->validate([
            'name'=>  'required',
            'email'=> 'required' ,
            'utype'=> 'required'
        ]);
        if($this->ids){
            $user = User::find($this->ids);
            $user->name = $this->name;
            $user->email = $this->email;
            $user->utype = $this->utype;
            $user->save();
            session()->flash('message','تم تعديل المستخدم بنجاح');
            $this->resetInput();
            $this->emit('userUpdated');
        }
    }
    public function delete($id){
        $user = User::find($id);
        $user->delete();
        session()->flash('message','تم حذف المستخدم بنجاح');
    }
    public function render()
    {
        $users = User::orderBy('id','desc')->paginate(5);
        return view('livewire.admin.admin-user',['users'=>$users])->layout('layouts.base');
    }
}

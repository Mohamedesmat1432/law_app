<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\ContactUs;
use App\Models\Post;
use App\Models\User;
use App\Models\WeKown;
use Livewire\Component;

class AdminDashboard extends Component
{

    public function render()
    {
        $users = User::count();
        $categories = Category::count();
        $posts = Post::get('id')->count();
        $wekowns = WeKown::count();
        $contacts = ContactUs::count();
        return view('livewire.admin.admin-dashboard',
        ['users'=>$users,'contacts'=>$contacts,'categories'=>$categories,'posts'=>$posts,'wekowns'=>$wekowns]
        )->layout('layouts.base');
    }
}

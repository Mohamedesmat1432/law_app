<?php

namespace App\Http\Livewire\Pages;
use Livewire\Component;
use App\Models\Category;
use App\Models\Slider;
use App\Models\WeKown;
// use Livewire\WithPagination;

class HomeComponent extends Component
{

    public function render()
    {
        $categories = Category::orderBy('updated_at','desc')->get();
        $wekowns = WeKown::orderBy('updated_at','desc')->get();
        $sliders = Slider::orderBy('id','desc')->get();
        return view('livewire.pages.home-component',['wekowns'=>$wekowns,'categories'=>$categories,'sliders'=>$sliders])->layout('layouts.base');
    }
}

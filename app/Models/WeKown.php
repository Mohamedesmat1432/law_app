<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeKown extends Model
{
    use HasFactory;
    protected $table = 'we_kowns';
    protected $fillable = ['name','image','information','phone','address'];
}

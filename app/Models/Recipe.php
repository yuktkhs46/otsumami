<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    protected $guarded = array('id');

    
    public static $rules = array(
        'recipe_name' => 'required',
        'comment' => 'required',
    );

    public function tags(){
        return $this->belongsToMany('App\Models\Tag');
    }
}

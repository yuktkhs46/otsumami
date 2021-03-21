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

    public function user(){
        return $this->belongsTo(User::class);
    }

    protected static function boot()
{
    parent::boot();
 
    // 保存時user_idをログインユーザーに設定
    self::saving(function($recipe) {
        $recipe->user_id = \Auth::id();
    });
}
}

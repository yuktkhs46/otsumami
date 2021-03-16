<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    
    use HasFactory;
    protected $guarded = array('id');

    
    public static $rules = array(
        'tag_name' => 'required',
        
    );

    public function resipes(){
        return $this->belongsToMany('App\Models\Recipe');
    }

    
}



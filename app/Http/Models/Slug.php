<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Slug extends Model
{
    
    protected $table = 'slug';

    public $timestamps = true;

    protected function add($args= []){
        if(sizeof($args) > 0 ){
            return $this->insertGetId($args);
        }
        return 0;
    }
    
    protected function get_with_slug_name($slug_name){
        $item = $this->where('slug_name', $slug_name)
        ->first();
        return $item;
    }

}

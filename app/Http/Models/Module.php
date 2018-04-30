<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    
    protected $table = 'modules';
    protected $columns = ['modules.module_id', 'modules.module_key', 'module_name' , 'modules.lang_id', 'modules.created_at'];

    protected function add($args= []){
        if(sizeof($args) > 0 ){
            return $this->insertGetId($args);
        }
        return 0;
    }

    protected function gets($columns = [], $limit = 20){
        if(sizeof($columns) == 0){
            $columns = $this->columns;
        }
        $data = $this->select($columns)
        ->leftjoin('languages', 'modules.lang_id', '=', 'languages.lang_id')
        ->addSelect('languages.lang_key')
        ->leftjoin('slug', 'modules.slug_id', '=', 'slug.slug_id')
        ->addSelect('slug.slug_name')
        ->limit($limit)
        ->get();
        return $data;
    }

    protected function check_isset_key($key){
    	$item = $this->where(['module_key' => $key])->count();
    	return ($item > 0 ) ? true : false;
    }
}

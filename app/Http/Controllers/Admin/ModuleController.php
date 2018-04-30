<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Http\Models\Module;
use App\Http\Models\Slug;
use Session;
use Lang;

class ModuleController extends AdminController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    	parent::__construct();
        $this->configs['module'] = 'module';
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$data = [
    		'configs' => $this->configs,
            'columns' => ['module_key', 'module_name', 'slug_name', 'created_at']
    	];
        // add new module
        if(isset($request->_token)){
            $rules = [
                'module_name' => 'required',
                'module_key' => 'required|unique:modules',
            ];
            $messages = [];
            $this->validate($request, $rules, $messages);
            

            $args = [
                'module_name' => $request->module_name,
                'module_key' => $request->module_key,
                'lang_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            // check isset slug
            $slug = Slug::get_with_slug_name($request->slug);
            if(empty($slug)){
                $args_slug = [
                    'slug_name' => $request->slug,
                    'slug_title' => $request->module_name,
                    'module_key' => $request->module_key,
                    'lang_id' => 1,
                    'module_action' => 'index',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ];
                $slug_id = Slug::add($args_slug);
            }else{
                $slug_id = $slug->slug_id;
            }
            $args['slug_id'] = $slug_id;
            $message = Lang::get('notify.add_not_success');
            $alert_class = 'alert-danger';
            try{
                $insert_id = Module::add($args);
                if($insert_id){
                    $message = Lang::get('notify.add_success');
                    $alert_class = 'alert-success';
                }
            } catch(Exception $e){
                $message = $e->getMessage();
            }
            $this->result($message, $alert_class);
        }

        // get list module

        $items = Module::gets();
        $data['items']  = $items;

        return view($this->configs['view'].'.module.index', $data);
    }

    public function result($message, $class){
        Session::flash('message', $message);
        Session::flash('alert-class', $class);
    }
}

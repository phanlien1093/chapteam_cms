<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;

class PostController extends AdminController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    	parent::__construct();
        $this->configs['module'] = 'post';
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //view 
        $action = 'index';
        $view = $this->configs['view']. '.' . $this->configs['module']. '.' . $action;
        // data
    	$data = [
    		'configs' => $this->configs,
    	];
        //handle
        return view($view, $data);
    }

    public function add(){
        $data = [
            'view' => $this->view,
            'module' => $this->module,
        ];
        return view($this->configs[''].'.'. $this->module .'.add', $data);
    }

    public function setting(){
        $data = [
            'view' => $this->view,
            'module' => $this->module,
        ];
        return view($this->view.'.'. $this->module .'.setting', $data);
    }
}

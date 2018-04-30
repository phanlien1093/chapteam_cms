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
    	$this->module = 'post';
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$data = [
    		'view' => $this->view,
    		'module' => $this->module,
    	];
        return view($this->view.'.'. $this->module .'.index', $data);
    }

    public function add(){
        $data = [
            'view' => $this->view,
            'module' => $this->module,
        ];
        return view($this->view.'.'. $this->module .'.add', $data);
    }

    public function setting(){
        $data = [
            'view' => $this->view,
            'module' => $this->module,
        ];
        return view($this->view.'.'. $this->module .'.setting', $data);
    }
}

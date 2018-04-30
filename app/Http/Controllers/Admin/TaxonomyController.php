<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;

class TaxonomyController extends AdminController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    	parent::__construct();
        $this->configs['module'] = 'taxonomy';
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type)
    {
    	$data = [
            'configs' => $this->configs
    	];
        
        return view($this->configs['view'].'.' . $this->configs['module']. '.index', $data);
    }
}

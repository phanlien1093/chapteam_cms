<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AdminController extends Controller{
	public $configs;
	public function __construct(){
		$this->configs = [
			'view' => config('admin.view'),
			'languages' => config('admin.languages'),
		];
	}
}
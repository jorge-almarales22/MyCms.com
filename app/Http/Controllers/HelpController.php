<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
    public function getHelp()
    {
    	return "solo admin";
    }
}

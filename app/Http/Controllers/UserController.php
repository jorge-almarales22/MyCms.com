<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isadmin');     
        $this->middleware('user_status');
    }
    public function getHome($status)
    {
    	if($status == 'all')
    	{
    		$users = User::orderBy('id', 'Desc')->paginate(5);	
    	}else{
    		$users = User::where('status', $status)->paginate(5);
    	}
    	return view('users.home', compact('users'));
    }
    public function getShow(User $user)
    {
    	return view('users.show', compact('user'));
    }
    public function getBanned(User $user)
    {
    	if($user->status == '100')
    	{
    		$user->status = '1';
    		$user->save();
    		Alert::success('¡ Exito !', 'El usuario esta activo nuevamente');
    		return redirect()->route('users.show',$user->id)->with('status', '¡ El usuario esta activo nuevamente felicidades !');
    	}else{
    		$user->status = '100';
    		$user->save();
    		Alert::success('¡ Exito !', 'El usuario ah sido baneado con exito');
    		return redirect()->route('users.show', $user->id)->with('status', '¡ El usuario no podra ingresar a la plataforma nuevamente !');
    	}    	
    }
}

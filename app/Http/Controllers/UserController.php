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
        $this->middleware('user_permissions');
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
    		return redirect()->route('users_show',$user->id)->with('status', '¡ El usuario esta activo nuevamente felicidades !');
    	}else{
    		$user->status = '100';
    		$user->save();
    		Alert::success('¡ Exito !', 'El usuario ah sido baneado con exito');
    		return redirect()->route('users_show', $user->id)->with('status', '¡ El usuario no podra ingresar a la plataforma nuevamente !');
    	}    	
    }

    public function getUserPermissions(User $user)
    {
        return view('users.permissions', compact('user'));
    }
    public function postUserPermissions(User $user, Request $request)
    {
        $permissions = [
            'home' => $request->home,
            'products_home' => $request->products_home,
            'products_store' => $request->products_store,
            'products_create' => $request->products_create,
            'products_search' => $request->products_search,
            'products_edit' => $request->products_edit,
            'products_destroy' => $request->products_destroy,         
            'categories_home' => $request->categories_home,
            'category_add' => $request->category_add,
            'category_edit' => $request->category_edit,
            'category_destroy' => $request->category_destroy,
            'users_home' => $request->users_home,
            'users_show' => $request->users_show,
            'users_permissions' => $request->users_permissions,
            'users_banned' => $request->users_banned,
        ];
        $permissions = json_encode($permissions);
        $user->permissions = $permissions;
        $user->save();
        return back()->with('status', 'Se asigno correctamente el permiso al usuario');

    }

}

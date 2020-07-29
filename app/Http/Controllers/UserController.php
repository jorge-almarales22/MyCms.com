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

    public function postUserEdit(Request $request, User $user)
    {
        $user->role = $request->type_user;
        if($request->type_user == '1')
        {
            if(is_null($user->permissions))
            {
                $permissions = ['home' => true, 'users_permissions' => true, 'users_home' => true];
                $permissions = json_encode($permissions);
                $user->permissions = $permissions;
            }
        }else
        {
                $permissions = ['home' => true, 'products_home' => true, 'products_search' => true,
                'categories_home' => true, 'users_home'=>true];
                $permissions = json_encode($permissions);
                $user->permissions = $permissions;
        }
        if($user->save() && $user->role == '1')
        {
            return redirect('/users/permissions/'. $user->id)->with('status', '¡ El usuario es administrador ahora felicidades !');
        }else{
            return back()->with('status', '¡ El usuario es un usuario normal ahora felicidades !');
        }
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
            'users_edit' => $request->users_edit,
            'estadisticas' => $request->estadisticas,
            'estadisticas_admin' => $request->estadisticas_admin,
        ];
        $permissions = json_encode($permissions);
        $user->permissions = $permissions;
        $user->save();
        return back()->with('status', 'Se asigno correctamente el permiso al usuario');

    }

}

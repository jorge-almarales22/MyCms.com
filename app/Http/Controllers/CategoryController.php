<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Category;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isadmin');     
        $this->middleware('user_status');
    }
    public function home($module)
    {
    	$cats = Category::where('module', $module)->orderBy('id', 'Desc')->paginate(5);
    	return view('categories.home', compact('cats'));
    }
    public function postCategoryAdd(Request $request)
    {
    	$request->validate([
    		'module' => 'required',
    		'name' => 'required|min:3',
    		'icono' => 'required'
    	]);
    	$category = new Category;
    	$category->module = e($request->module);
    	$category->name = e($request->name);
    	$category->slug = Str::slug($request->name);
    	$category->icono = e($request->icono);
        Alert::success('Exito', 'Categoria Guardada con exito');
    	if($category->save())
    	{
    		return redirect('/categories/'.$category->module)->with('status', '¡ Felicidades ahora puede guardar productos con la nueva categoria !');
    	}else{
    		return back();
    	}
    }
    public function editCategory(Category $category)
    {
    	$cats = Category::orderBy('id', 'DESC')->get();
    	return view('categories.edit', compact('category', 'cats'));
    }

    public function updateCategory(Category $category, Request $request)
    {
    	$request->validate([
    		'module' => 'required',
    		'name' => 'required|min:3',
    		'icono' => 'required'
    	]);
    	$category->module = e($request->module);
    	$category->name = e($request->name);
    	$category->icono = e($request->icono);
    	if($category->save())
    	{
    		return redirect('/categories/'.$category->module)->with('status', 'Categoria actualizada correctamente');
    	}else{
    		return back();
    	}
    }

    public function deleteCategory(Category $category)
    {
    	$cat = $category->module;
    	$category->delete();
        Alert::success('Exito', 'Categoria eliminada con exito');
    	return redirect('/categories/'.$cat)->with('status', 'La categoria cambia de estado en la BD pero no se elimina para su recuperación si lo desea');
    }
}

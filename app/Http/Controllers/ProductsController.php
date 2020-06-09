<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Config, Image;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isadmin');     
        $this->middleware('user_status');
    }
    public function getHome()
    {
    	// $products = Product::orderBy('id', 'Desc')->get();
        $products = Product::with(['category'])->orderBy('id','Desc')->paginate(4);
    	return view('products.home', compact('products'));
    }
    public function getCreate()
    {
    	$cats = Category::where('module', '0')->pluck('name', 'id');
    	return view('products.create', compact('cats'));
    }    
    public function postStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'img' => 'required',
            'price' => 'required',
            'content' => 'required'
        ]);
        $path = '/'.date('Y-m-d');
        $fileExt = trim($request->file('img')->getClientOriginalExtension());
        $upload_path = Config::get('filesystems.disks.uploads.root');
        $name = Str::slug(str_replace($fileExt, '', $request->file('img')->getClientOriginalName()));

        $filename = rand(1,999).'-'. $name.'.' .$fileExt;
        $file_file = $upload_path.'/'.$path.'/'.$filename;

        $product = new Product;
        $product->status ='0';
        $product->name = e($request->name);
        $product->slug =  Str::slug($request->name);
        $product->category_id = e($request->category);
        $product->file_path = date('Y-m-d');
        $product->image = $filename;
        $product->price = e($request->price);
        $product->in_discount = e($request->indiscount);
        $product->discount = e($request->discount);
        $product->content = e($request->content);
        if($product->save())
        { 
            if($request->hasFile('img'))
            {
                $fl = $request->img->storeAs($path, $filename, 'uploads');
                $img = Image::make($file_file);
                $img->fit(256,256, function($constraint){
                    $constraint->upsize();
                });
                $img->save($upload_path.'/'.$path.'/t_'.$filename);
            }
            Alert::success('Exito', 'Producto Guardado con exito');
            return redirect()->route('products.home')->with('status', '¡ El producto fue guardado satisfatoriamente felicidades !');
        }
    }
    public function getEdit(Product $product)
    {
        $cats = Category::where('module', '0')->pluck('name', 'id');
        return view('products.edit', compact('product', 'cats'));
    }
    public function putUpdate(Product $product, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required',
            'content' => 'required'
        ]);
        $ipp = $product->file_path;
        $ip = $product->image;
        $product->status = e($request->status);
        $product->name = e($request->name);
        $product->category_id = e($request->category);
        if($request->hasFile('img')){
            $path = '/'.date('Y-m-d');
            $fileExt = trim($request->file('img')->getClientOriginalExtension());
            $upload_path = Config::get('filesystems.disks.uploads.root');
            $name = Str::slug(str_replace($fileExt, '', $request->file('img')->getClientOriginalName()));
            $filename = rand(1,999).'-'. $name.'.' .$fileExt;
            $file_file = $upload_path.'/'.$path.'/'.$filename;
            $product->file_path = date('Y-m-d');
            $product->image = $filename;
        }

        $product->price = e($request->price);
        $product->in_discount = e($request->indiscount);
        $product->discount = e($request->discount);
        $product->content = e($request->content);
        if($product->save())
        { 
            if($request->hasFile('img')){
                $fl = $request->img->storeAs($path, $filename, 'uploads');
                $img = Image::make($file_file);
                $img->fit(256,256, function($constraint){
                    $constraint->upsize();
                });
                $img->save($upload_path.'/'.$path.'/t_'.$filename);
                unlink($upload_path.'/'.$ipp.'/'.$ip);
                unlink($upload_path.'/'.$ipp.'/t_'.$ip);
            }
            Alert::success('Exito', 'Producto modificado con exito');
            return redirect()->route('products.home')->with('status', '¡ El producto fue modificado satisfatoriamente felicidades !');
        }
    }
    public function productDestroy(Product $product)
    {
        $product->delete();
        Alert::success('Exito', 'Producto Elimiando con exito');
        return redirect()->route('products.home')->with('status', '¡ El producto fue eliminado satisfatoriamente pero puede recuperarlo en cualquier momento si lo desea !');
    }

    public function getSearch(Request $request)
    {
        $products = Product::whereHas('category', function ($query) use ($request) {    
        $query->where('name', 'like', "%{$request->search_cat}%");
        })->name($request->search)->orderBy('id', 'DESC')->paginate(4);
        return view('products.home', compact('products')); 
    }
}

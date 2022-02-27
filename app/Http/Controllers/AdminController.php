<?php

namespace App\Http\Controllers;

use App\Jobs\ExportCategories;
use App\Jobs\ExportProducts;
use App\Jobs\ImportCategories;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{
    public function index ()
    {
        $users = User::get();
        return view('admin.home', compact('users'));
    }//


    public function enterAsUser ($userId)
    {
        Auth::loginUsingId($userId);
        return redirect()->route('home');
    }

    public function exportCategories ()
    {
        ExportCategories::dispatch();
        session()->flash('startExportCategories');
        return back();
    }

    

    public function pageuser ()
    {
        $users = User::get();
        return view('pageuser', compact('users'));// если это вставить 'привет' без вью то на странице админ список будет привет
    }

    public function spisokсategory ()
    {
        $category = Category::get();
        return view('spisokcategory',compact('category'));// если это вставить 'привет' без вью то на странице админ список будет привет
    }

       public function mapproduct ()
    {
        $product = Product::get();
        return view('mapproduct',compact('product'));
    }

    public function importCategories ()
    {
        
        ImportCategories::dispatch();
        session()->flash('startImportCategories');
        return back();
    }

    public function categoryCreated ()
    {
        return view('admin.categoryCreated');
    }

    public function productCreated ()
    {
        return view('admin.productCreated');
    }

    public function addCategories (Request $request)
    {
        $categories = new Category();
        $file = $request->file('picture');
        $input = $request->all();

        if ($file) {
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . rand(1000, 9999) . '.' . $ext;
            $file->storeAs('public/img/categories', $fileName);
            $categories->picture = $fileName;
        }

        $categories->name = $input['name'];
        $categories->description = $input['description'];
        $categories->picture = $fileName;
        $categories->save();
        session()->flash('addCategories');
        return back();
    }

    public function addProducts (Request $request)
    {
        $products = new Product();
        $file = $request->file('picture');
        $input = $request->all();

        if ($file) {
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . rand(1000, 9999) . '.' . $ext;
            $file->storeAs('public/img/products', $fileName);
            $products->picture = $fileName;
        }

        $products->name = $input['name'];
        $products->description = $input['description'];
        $products->price = $input['price'];
        $products->picture = $fileName;
        $products->category_id = $input['category_id'];
        $products->save();
        session()->flash('addProducts');
        return back();
    }
    
}

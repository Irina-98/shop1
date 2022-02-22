<?php

namespace App\Http\Controllers;

use App\Jobs\ExportCategories;
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
        $exportColumns = true;
        ImportCategories::dispatch($exportColumns);
        session()->flash('startImportCategories');
        return back();
    }
}

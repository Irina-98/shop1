<?php

namespace App\Http\Controllers;

use App\Jobs\ImportCategories;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category (Category $category)
    {
        
        return view('category', compact('category'));// если значение id меняем на другое измени в веб
    }
    
    public function importCategories ()
    {
        $exportColumns = true;
        ImportCategories::dispatch($exportColumns);
        session()->flash('startImportCategories');
        return back();
    }
}

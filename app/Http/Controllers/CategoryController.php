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
    public function getProducts (Category $category)
    {
        $products = $category->products;
        $basketProducts = session('products');
        return $products->transform(function ($product) use ($basketProducts) {
            $product->quantity = $basketProducts[$product->id] ?? 0;
            return $product;
        });
    }
}

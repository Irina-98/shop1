<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;


class ProductController extends Controller
{
    public function export() 
    {
        return Excel::download(new ProductExport, 'users.xlsx');
    }
}

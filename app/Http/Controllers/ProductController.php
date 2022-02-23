<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Jobs\ExportProducts;
use App\Jobs\ImportProducts;
use App\Models\Product;
use Maatwebsite\Excel\Facades\Excel;


class ProductController extends Controller
{
    //public function export() 
    //{
    //    return Excel::download(new ProductExport, 'users.xlsx');
    //}
    
    public function exportProducts ()
    {
        $exportColumns = true;
        ExportProducts::dispatch($exportColumns);
        session()->flash('startExportProducts');
        return back();
    }

   
    public function importProducts ()
    {
        $exportColumns = true;
        ImportProducts::dispatch($exportColumns);
        session()->flash('startImportProducts');
        return back();
    }

    
}

<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use App\Imports\ProductImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades;

class ExcelController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    public function importExportView(){
//        return view('import');
    }
    public function export(){
        return Facades\Excel::download(new ProductExport, 'Product.xlsx');
    }
    public function import(){
        Facades\Excel::import(new ProductImport, \request()->file('file'));
    }
}

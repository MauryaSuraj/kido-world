<?php

namespace App\Http\Controllers;

use App\Exports\OrderExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;

class OrderControllerExcel extends Controller
{

    public function export(){
        return \Maatwebsite\Excel\Facades\Excel::download(new OrderExport(), 'Order.xlsx');
    }
}

<?php

namespace App\Exports;

use App\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrderExport implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Order::all();
    }



    /**
     * @return array
     */
    public function headings(): array
    {
        return  [
            'ID',
            'Customer Id',
            'Product Id',
            'Payment Status',
            'Payment Id',
            'Order Status',
            'Order Generated At',
            'Updated At'
    ];
    }
}

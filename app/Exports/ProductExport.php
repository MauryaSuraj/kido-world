<?php

namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
       return [
           'Product id',
           'Product Type',
           'Category ID',
           '',
           'Flash Sale',
           'Special',
           'Product Name',
           'Product Description',
           'Banner Left Side',
           'Banner Right side',
           'TAX',
           'Product Price',
           'Product Sell Price',
           'Min Order Limit',
           'Max Order Limit',
           'Product weight ',
           'Product Image',
           'Is Featured',
           'Status',
           'Quantity',
           'Available',
           'Meta Title',
           'Meta Keywords',
           'Meta Description',
           'Created AT',
           'Updated AT',
           'Slug',
           'Dimensions',
           'Size',
           'Color',
           'Gender'
       ];
    }
}

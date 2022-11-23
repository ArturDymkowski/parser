<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataExport implements FromCollection, WithHeadings
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect($this->data);
    }

    public function headings():array
    {
        return [
            'tracking_number',
            'po_number',
            'date',
            'customer',
            'trade',
            'nte',
            'store_id',
            'street',
            'city',
            'state',
            'postcode',
            'phone',
        ];
    }
}

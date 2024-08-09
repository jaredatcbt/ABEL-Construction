<?php

namespace App\Exports\Purchases;

use App\Exports\Purchases\Sheets\Bill as Base;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class Bill implements WithMultipleSheets
{
    use Exportable;

    public $singleBill;

    public function __construct($singleBill = null)
    {
        $this->singleBill = $singleBill;
    }

    public function sheets(): array
    {
        return [
            new Base($this->singleBill),
        ];
    }
}

<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class PengembalianExport implements FromCollection
{
    protected $pengembalian;

    public function __construct($pengembalian)
    {
        $this->pengembalian = $pengembalian;
    }

    public function collection()
    {
        return $this->pengembalian;
    }
}

<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class BarangExport implements FromCollection
{
    protected $barangs;

    public function __construct($barangs)
    {
        $this->barangs = $barangs;
    }

    public function collection()
    {
        return $this->barangs;
    }
}

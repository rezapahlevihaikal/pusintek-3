<?php

namespace App\Exports;

use App\Bast;
use Maatwebsite\Excel\Concerns\FromCollection;

class BastExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Bast::all();
    }
}

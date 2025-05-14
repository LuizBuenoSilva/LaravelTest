<?php

namespace App\Exports;

use App\Models\Entry;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class EntryExport implements FromView
{

    public function view(): View
    {
        return view('exports.export-excel', [
            'entrys' => Entry::all()
        ]);
    }
}

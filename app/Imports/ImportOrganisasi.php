<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Organisasi;
use Carbon\Carbon;

class ImportOrganisasi implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $col) {
            if ($key >= 1) {
                Organisasi::insert([
                    'kode_unit' => $col[0],
                    'unit_kerja' => $col[1],
                    'parent_kode_unit' => $col[2],
                    'unit_kerja_level' => $col[3],
                    'status' => $col[4],
                    'valid_from' => Carbon::parse($col[5]),
                    'valid_to' => Carbon::parse($col[6]),
                ]);
            }
        }
    }
}

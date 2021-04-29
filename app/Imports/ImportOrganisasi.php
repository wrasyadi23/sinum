<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Organisasi;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;

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
                    'valid_from' => Carbon::instance(Date::excelToDateTimeObject($col[5])),
//                    'valid_from' => Carbon::createFromFormat('Y-m-d', $col[5]),
                    'valid_to' => Carbon::instance(Date::excelToDateTimeObject($col[6])),
//                    'valid_to' => Carbon::createFromFormat('Y-m-d', $col[6]),
                ]);
            }
        }
    }
}

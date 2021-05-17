<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\HasMany;
// use Illuminate\Database\Eloquent\Relations\HasOne;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawan';

    public $incrementing = 'false';

    /**
     * Get the user associated with the Karyawan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function organisasi(): HasOne
    {
        return $this->hasOne(Organisasi::class, 'kode_unit', 'kode_unit');
    }
}

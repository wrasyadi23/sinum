<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    use HasFactory;

    protected $table = 'organisasi';

    public $incrementing = 'false';

    /**
     * Get all of the comments for the Organisasi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function organisasi(): HasMany
    {
        return $this->hasMany(Organisasi::class, 'parent_kode_unit', 'kode_unit');
    }

    /**
     * Get all of the comments for the Organisasi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function childOrganisasi(): HasMany
    {
        return $this->hasMany(Organisasi::class, 'parent_kode_unit', 'kode_unit')->with('organisasi');
    }
    
}

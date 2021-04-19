<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use PDF;
use Carbon\Carbon;
use App\Models\Organisasi;

class OrganisasiController extends Controller
{
    public function index()
    {
        $organisasi = Organisasi::whereYear('valid_from','2020')->get();
        return view('organisasi.organisasi', [
            'organisasi' => $organisasi,
        ]);
    }

    public function store(Request $request)
    {
        $organisasi = new Organisasi;
        $organisasi->kode_unit = $request->kode_unit;
        $organisasi->unit_kerja = $request->unit_kerja;
        $organisasi->unit_kerja_level = $request->unit_kerja_level;
        $organisasi->status = 'Actived';
        $organisasi->valid_from = $request->valid_from;
        $organisasi->valid_to = $request->valid_to;
        $organisasi->save();

        return redirect('organisasi.organisasi')->with('success','Struktur baru berhasil disimpan.');
    }
}

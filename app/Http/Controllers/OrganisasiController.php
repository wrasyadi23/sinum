<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use PDF;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Organisasi;
use App\Imports\ImportOrganisasi;

class OrganisasiController extends Controller
{
    public function index()
    {
        $organisasi = Organisasi::orderBy('id','desc')
            ->whereYear('valid_to','4001')
            ->get();
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

        return back()->with('success','Struktur baru berhasil disimpan.');
    }

    public function store_downline(request $request)
    {
        $organisasi = new Organisasi;
        $organisasi->kode_unit = $request->kode_unit;
        $organisasi->unit_kerja = $request->unit_kerja;
        $organisasi->parent_kode_unit = $request->parent_kode_unit;
        $organisasi->unit_kerja_level = $request->unit_kerja_level;
        $organisasi->status = 'Actived';
        $organisasi->valid_from = $request->valid_from;
        $organisasi->valid_to = $request->valid_to;
        $organisasi->save();

        return back()->with('success','Struktur baru berhasil disimpan.');
    }

    public function import(request $request)
    {
        Excel::import(new ImportOrganisasi, $request->file('organisasi'));
        return back()->with('import-success','Data berhasil diimport.');
    }

    public function update(request $request, $id)
    {
        $organisasi = Organisasi::where('id',$id)->first();
        $organisasi->kode_unit = $request->kode_unit;
        $organisasi->unit_kerja = $request->unit_kerja;
        $organisasi->parent_kode_unit = $request->parent_kode_unit;
        $organisasi->unit_kerja_level = $request->unit_kerja_level;
        $organisasi->status = $request->status;
        $organisasi->valid_from = $request->valid_from;
        $organisasi->valid_to = $request->valid_to;
        $organisasi->save();

        return back()->with('update','Data berhasil diupdate.');
    }
}

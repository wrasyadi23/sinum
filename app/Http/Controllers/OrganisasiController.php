<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use PDF;
use App\Models\Organisasi;

class OrganisasiController extends Controller
{
    public function index()
    {
        $organisasi = Organisasi::all();
        return view('organisasi.organisasi', [
            'organisasi' => $organisasi,
        ]);
    }

    public function store(Request $request)
    {
        
    }
}

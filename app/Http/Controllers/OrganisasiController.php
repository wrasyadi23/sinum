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
        
    }
}

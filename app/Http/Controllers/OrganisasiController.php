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
        return view('organisasi.organisasi');
    }

    public function store(Request $request)
    {
        
    }
}

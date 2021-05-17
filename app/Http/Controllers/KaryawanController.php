<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use PDF;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class KaryawanController extends Controller
{
    public function index()
    {
        return view('karyawan.karyawan');
    }
}

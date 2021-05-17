@extends('layouts.app')
@section('title','Karyawan')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-12">
            <h1>Karyawan</h1>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#add">
                                <i class="fa fa-plus-circle"></i>
                                Add New
                            </button>

                            <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#import">
                                <i class="fa fa-upload"></i>
                                Import
                            </button>

                            <a href="{{asset('organisasi-import.xlsx')}}" class="btn btn-primary mb-3">
                                <i class="fa fa-download" aria-hidden="true"></i>
                                Download Template
                            </a>
                        </div>
                    </div>

                    {{-- table  --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('page_css')
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush

@push('page_script')

@endpush

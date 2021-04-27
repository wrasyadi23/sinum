@extends('layouts.app')
@section('title', 'Organisasi')
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Organisasi</h1>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    {{-- <div class="card-header">
                        <h5 class="card-title">Card title</h5>
                    </div> --}}
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

                                <a href="#" class="btn btn-primary mb-3">
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                    Download Template
                                </a>
                            </div>
                        </div>

                        <table id="example1" class="table table-striped table-bordered">
                            <thead>
                                @php
                                    $no = 1;
                                @endphp
                                <tr>
                                    <th>No</th>
                                    <th>Kode Unit</th>
                                    <th>Unit Kerja</th>
                                    <th>Parent Kode Unit</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($organisasi as $result => $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->kode_unit}}</td>
                                    <td>{{$item->unit_kerja}}</td>
                                    <td>{{$item->parent_kode_unit}}</td>
                                    <td>{{$item->status}}</td>
                                    <td><button class="btn btn-sm btn-primary"
                                        data-toggle="modal"
                                        data-target="#addDownline"
                                        onclick='uplineValue({!! $item !!})'>
                                        <i class="fa fa-plus-circle"></i> Add Downline
                                        </button>

                                        <button class="btn btn-sm btn-warning"
                                        data-toggle="modal"
                                        data-target="#edit"
                                        onclick='editValue({!! $item !!})'>
                                        <i class="far fa-edit"></i> Edit</button></td>
                                </tr>
                                @endforeach
                            </tbody>
                            {{-- <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Unit</th>
                                    <th>Unit Kerja</th>
                                    <th>Parent Kode Unit</th>
                                    <th>Status</th>
                                </tr>
                            </tfoot> --}}
                        </table>

                        {{-- modal add new--}}
                        <div class="modal fade" id="add">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Input Organisasi</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <form action="/organisasi/organisasi-store" name="add" method="post" enctype="multipart/form-data">
                                    @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="">Kode Unit</label>
                                        <input type="text" name="kode_unit" id="" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Unit Kerja</label>
                                        <input type="text" name="unit_kerja" id="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Klasifikasi Unit Kerja</label>
                                        <select class="form-control select2bs4" style="width: 100%;"
                                            name="unit_kerja_level" id="" required>
                                            <option selected disabled>Pilih Klasifikasi</option>
                                            <option value="Komisaris" >Komisaris</option>
                                            <option value="Direktorat" >Direksi</option>
                                            <option value="Kompartemen" >Kompartemen</option>
                                            <option value="Departemen" >Departemen</option>
                                            <option value="Bagian" >Bagian</option>
                                            <option value="Seksi" >Seksi</option>
                                            <option value="Regu" >Regu</option>
                                            <option value="Staf" >Staf</option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="">Valid From</label>
                                            <input type="date" name="valid_from" id="" class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Valid To</label>
                                            <input type="date" name="valid_to" id="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="add">Submit</button>
                                </div>
                                </form>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>

                        {{-- modal add branch  --}}
                        <div class="modal fade" id="addDownline">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Input Downline</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <form action="" name="addDownline"
                                 method="post" id="addDownline-form" enctype="multipart/form-data">
                                    @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="">Upline</label>
                                        <input type="text" name="parent_kode_unit" id="kode_unit"
                                        class="form-control" value="{{$organisasi->first()}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kode Unit</label>
                                        <input type="text" name="kode_unit" id="" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Unit Kerja</label>
                                        <input type="text" name="unit_kerja" id="" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Klasifikasi Unit Kerja</label>
                                        <select class="form-control select2bs4" style="width: 100%;"
                                            name="unit_kerja_level" id="" required>
                                            <option selected disabled>Pilih Klasifikasi</option>
                                            <option value="Komisaris" >Komisaris</option>
                                            <option value="Direktorat" >Direksi</option>
                                            <option value="Kompartemen" >Kompartemen</option>
                                            <option value="Departemen" >Departemen</option>
                                            <option value="Bagian" >Bagian</option>
                                            <option value="Seksi" >Seksi</option>
                                            <option value="Regu" >Regu</option>
                                            <option value="Staf" >Staf</option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="">Valid From</label>
                                            <input type="date" name="valid_from" id="" class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Valid To</label>
                                            <input type="date" name="valid_to" id="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="addDownline">Submit</button>
                                </div>
                                </form>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>

                        {{-- modal import  --}}
                        <div class="modal fade" id="import">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Import Organisasi</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <form action="/organisasi/organisasi-import" method="post" name="import" enctype="multipart/form-data">
                                    @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="">Browse</label>
                                        <input type="file" name="organisasi" id="" class="fomr-control" required>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="import">Submit</button>
                                </div>
                                </form>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>

                        {{-- modal edit  --}}
                        <div class="modal fade" id="edit">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit Organisasi</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <form action="" name="edit"
                                 method="post" id="edit-form" enctype="multipart/form-data">
                                    @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="">Upline</label>
                                        <input type="text" name="parent_kode_unit" id="parent_kode_unit"
                                        class="form-control" value="{{$organisasi->first()}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kode Unit</label>
                                        <input type="text" name="kode_unit" id="kode_unit"
                                        class="form-control" value="{{$organisasi->first()}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Unit Kerja</label>
                                        <input type="text" name="unit_kerja" id="unit_kerja"
                                        class="form-control" value="{{$organisasi->first()}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Klasifikasi Unit Kerja</label>
                                        <select class="form-control select2bs4" style="width: 100%;"
                                            name="unit_kerja_level" id="unit_kerja_level" required>
                                            <option value="Komisaris" {{$organisasi->first() == 'Komisaris' ? 'selected' : ''}}>Komisaris</option>
                                            <option value="Direktorat" {{$organisasi->first() == 'Direktorat' ? 'selected' : ''}}>Direksi</option>
                                            <option value="Kompartemen" {{$organisasi->first() == 'Kompartemen' ? 'selected' : ''}}>Kompartemen</option>
                                            <option value="Departemen" {{$organisasi->first() == 'Departemen' ? 'selected' : ''}}>Departemen</option>
                                            <option value="Bagian" {{$organisasi->first() == 'Bagian' ? 'selected' : ''}}>Bagian</option>
                                            <option value="Seksi" {{$organisasi->first() == 'Seksi' ? 'selected' : ''}}>Seksi</option>
                                            <option value="Regu" {{$organisasi->first() == 'Regu' ? 'selected' : ''}}>Regu</option>
                                            <option value="Staf" {{$organisasi->first() == 'Staf' ? 'selected' : ''}}>Staf</option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="">Valid From</label>
                                            <input type="date" name="valid_from" id="valid_from"
                                            class="form-control" value="{{$organisasi->first()}}" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Valid To</label>
                                            <input type="date" name="valid_to" id="valid_to"
                                            class="form-control" value="{{$organisasi->first()}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="edit">Submit</button>
                                </div>
                                </form>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>

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

@push('page_scripts')
<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "orderCellsTop": true,
        "fixedHeader": true,
        "autoWidth": false,
        "buttons": [
            {
                extend: "copy",
                exportOptions: {
                    columns: ':visible',
                    rows: ':visible'
                }
            },
            {
                extend: "csv",
                exportOptions: {
                    columns: ':visible',
                    rows: ':visible'
                }
            },
            {
                extend: "excel",
                exportOptions: {
                    columns: ':visible',
                    rows: ':visible'
                }
            },
            {
                extend: "pdf",
                exportOptions: {
                    columns: ':visible',
                    rows: ':visible'
                }
            },
            {
                extend: "print",
                exportOptions: {
                    columns: ':visible',
                    rows: ':visible'
                }
            },
            "colvis"
        ]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    //   $('#example2').DataTable({
    //     "paging": true,
    //     "lengthChange": false,
    //     "searching": false,
    //     "ordering": true,
    //     "info": true,
    //     "autoWidth": false,
    //     "responsive": true,
    //   });
        const dataTableApi = new $.fn.dataTable.Api('#example1');
        $('#example1 thead tr').clone(true).appendTo( '#example1 thead' );
        $('#example1 thead tr:eq(1) th').each( function (i) {
            var title = $(this).text();
            $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );
            $( 'input', this ).on( 'keyup change', function () {
                if ( dataTableApi.columns().search() !== this.value ) {
                    dataTableApi
                        .columns(i)
                        .search( this.value )
                        .draw();
                }
            } );
        } );
    });
</script>
<script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    $(function() {
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    });

    function uplineValue(data) {
        $('#kode_unit').val(data.kode_unit)
        $('#addDownline-form').attr('action','/organisasi/organisasi-store-downline')
    }

    function editValue(data) {
        $('input[name=kode_unit]').val(data.kode_unit)
        $('#unit_kerja').val(data.unit_kerja)
        $('#parent_kode_unit').val(data.parent_kode_unit)
        $('#unit_kerja_level').val(data.unit_kerja_level).change()
        $('#status').val(data.status)
        $('#valid_from').val(data.valid_from)
        $('#valid_to').val(data.valid_to)
        $('#edit-form').attr('action','/organisasi/organisasi-update/' + data.id)
    }
</script>
@endpush

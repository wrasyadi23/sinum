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
                        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#add">
                            <i class="far fa-edit"></i>
                            Add New
                        </button>

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
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>No</td>
                                    <td>12345</td>
                                    <td>Unit Kerja</td>
                                    <td>Parent Kode Unit</td>
                                    <td>Status</td>
                                </tr>
                                <tr>
                                    <td>No</td>
                                    <td>12334</td>
                                    <td>Unit Kerja</td>
                                    <td>Parent Kode Unit</td>
                                    <td>Status</td>
                                </tr>
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
                                <form action="/organisasi/organisasi-store" method="post" enctype="multipart/form-data">
                                    @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="">Unit Kerja</label>
                                        <input type="text" name="unit_kerja" id="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Klasifikasi Unit Kerja</label>
                                        <select class="form-control select2bs4" style="width: 100%;" 
                                            name="klas_unit_kerja" id="" required>
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
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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
    });
 
    $(document).ready(function() {
    // Setup - add a text input to each footer cell
        $('#example1 thead tr').clone(true).appendTo( '#example1 thead' );
        $('#example1 thead tr:eq(1) th').each( function (i) {
            var title = $(this).text();
            $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );
    
            $( 'input', this ).on( 'keyup change', function () {
                if ( table.column(i).search() !== this.value ) {
                    table
                        .column(i)
                        .search( this.value )
                        .draw();
                }
            } );
        } );
    
        var table = $('#example1').DataTable( {
            orderCellsTop: true,
            fixedHeader: true
        } );
    } );
</script>
<script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    $(function() {
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    });
</script>
@endpush
@extends('layouts.main')

@section('title', 'Pasien')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header with-border">
                <button onclick="updatePeriode()" class="btn btn-success">Periode</button>
                <a href="{{ route('report.export_pdf', [$dateStart, $dateEnd]) }}" target="_blank" class="btn btn-info">Export PDF</a><br><br>
            </div>
            <div class="card-body table-responsive">
                <h4>Daftar Pasien Periode registrasi <?php echo date('d/m/Y', strtotime($dateStart)); ?> sampai <?php echo date('d/m/Y', strtotime($dateEnd)); ?></h4>
                <table class="table table-bordered table-striped table">
                    <thead>
                        <tr>
                            <th width="5%">No.</th>
                            <th>No RM</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Hp</th>
                            <th>Gender</th>
                            <th>Dokter PJ</th>
                            <th>Ruangan</th>
                            <th>Penjamin</th>
                            <th>Tgl Registrasi</th>
                            <th>Tgl Keluar</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('report.index') }}" method="get" data-toggle="validator" class="form-horizontal">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Periode Laporan</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="date_start" class="col-lg-2 col-lg-offset-1 control-label">Dari</label>
                        <div class="col-lg-6">
                            <input type="date" name="date_start" id="date_start" class="form-control" required autofocus value="{{ request('date_start') }}">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="date_end" class="col-lg-2 col-lg-offset-1 control-label">Sampai</label>
                        <div class="col-lg-6">
                            <input type="date" name="date_end" id="date_end" class="form-control" required value="{{ request('date_end') ?? date('Y-m-d') }}">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<!-- DataTables  & Plugins -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script>
    let table;

    $(function() {
        table = $('.table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('report.data', [$dateStart, $dateEnd]) }}',  
            },
            columns: [{
                    data: 'DT_RowIndex',
                    searchable: false,
                    sortable: false
                },
                {
                    data: 'no_rm'
                },
                {
                    data: 'name'
                },
                {
                    data: 'address'
                },
                {
                    data: 'phone'
                },
                {
                    data: 'gender'
                },
                {
                    data: 'dokter_id'
                },
                {
                    data: 'room_id'
                },
                {
                    data: 'penjamin_id'
                },
                {
                    data: 'tgl_registrasi'
                },
                {
                    data: 'tgl_keluar'
                },
            ],
            dom: 'Brt',
            bSort: false,
            bPaginate: false,
        });
    });

    function updatePeriode() {
        $('#modal-form').modal('show');
    }
</script>
@endsection
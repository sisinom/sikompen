@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title}}</h3>
            <div class="card-tools">
                {{-- <button onclick="modalAction('{{ url('/mahasiswa/import') }}')" class="btn btn-info">Import Data Mahasiswa</button>
                <a href="{{ url('/mahasisawa/export_excel') }}" class="btn btn-primary"><i class="fa fa-file-excel"></i> Export Data Mahasiswa</a>
                <a href="{{ url('/mahasisawa/export_pdf') }}" class="btn btn-warning"><i class="fa fa-file-pdf"></i> Export Data Mahasiswa</a> --}}
                {{-- <button onclick="modalAction('{{ url('mahasiswa/create_ajax') }}')" class="btn btn-success">Tambah Data (Ajax)</button> --}}
            </div>
        </div>
        <div class="card-body">
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Filter:</label>
                        <div class="col-3">
                            <select name="filter_prodi" id="filter_prodi" class="form-control" required>
                                <option value="">- Semua -</option>
                                @foreach ($prodi as $item)
                                    <option value="{{ $item->id_prodi }}">{{ $item->nama_prodi }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Prodi Mahasiswa</small>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped table-hover table-sm" id="table_mahasiswa">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Prodi</th>
                        <th>Kompen Dikerjakan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" data-width="75%" aria-hidden="true"></div>
@endsection

@push('css')
@endpush

@push('js')
    <script>
        function modalAction(url = ''){
            $('#myModal').load(url,function(){
                $('#myModal').modal('show');
            });
        }

        var dataMahasiswaKompen;
        $(document).ready(function(){
            dataMahasiswaKompen = $('#table_mahasiswa').DataTable({
                processing: true,
                //serverSide: true, jika ingin menggunakan server side processing
                serverSide: true,
                ajax:{
                    "url": "{{ url('mahasiswa_kompen/list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function (d){
                        d.id_prodi = $('#filter_prodi').val();
                    }
                },
                columns:[
                    {
                        //nomor urut dari laravel datatable addIndexColumn()
                        data: "DT_RowIndex",
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    },{
                        data: "mahasiswa.nomor_induk",
                        className: "text-center",
                        //orderable: true, jika ingin kolom bisa diurutkan
                        orderable: true,
                        //searchable: true, jika ingin kolom bisa dicari
                        searchable: true
                    },{
                        data: "mahasiswa.nama",
                        className: "text-center",
                        orderable: true,
                        searchable: true
                    },{
                        // mengambil data prodi dari hasil ORM berelasi
                        data: "mahasiswa.prodi.nama_prodi",
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    },{
                        data: "kompen.nama",
                        className: "text-center",
                        orderable: true,
                        searchable: false
                    },{
                        data: "aksi",
                        className: "text-center",
                        orderable:false,
                        searchable: false
                    }
                ]
            });
            $('#table_mahasiswa_filter input').unbind().bind().on('keyup', function(e){
                if(e.keyCode == 13){ // enter key
                    dataMahasiswaKompen.search(this.value).draw();
                }
            });
            $('#filter_prodi').on('change', function(){
                dataMahasiswaKompen.ajax.reload();
            });
        });
    </script>
@endpush
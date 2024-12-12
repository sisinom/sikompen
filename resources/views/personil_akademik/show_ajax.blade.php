@empty($personil_akademik)
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kesalahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    <h5><i class="icon fas fa-ban"></i>Kesalahan!!!</h5>
                    Data yang anda cari tidak ditemukan
                </div>
                <a href="{{ url('/personil_akademik') }}" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </div>
@else
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Data Personil Akademik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info">
                    <h5><i class="icon fas fa-info"></i> Data Personil Akademik </h5>
                    Berikut adalah detail dari data personil akademik
                </div>
                <table class="table table-sm table-bordered table-stripped">
                    <tr>
                        <th class="text-right col-3">Level Personil : </th>
                        <td class="col-9">{{ $personil_akademik->level->nama_level }}</td>
                    </tr>
                    <tr>
                        <th class="text-right col-3">Nomor Induk : </th>
                        <td class="col-9">{{ $personil_akademik->nomor_induk }} </td>
                    </tr>
                    <tr>
                        <th class="text-right col-3">Username : </th>
                        <td class="col-9">{{ $personil_akademik->username }}</td>
                    </tr>
                    <tr>
                        <th class="text-right col-3">Nama : </th>
                        <td class="col-9">{{ $personil_akademik->nama }}</td>
                    </tr>
                    <tr>
                        <th class="text-right col-3">Nomor Telfon : </th>
                        <td class="col-9">{{ $personil_akademik->nomor_telp }}</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-warning">Kembali</button>
            </div>
        </div>
    </div>
@endempty
@empty($kompen_diajukan)
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
                <a href="{{ url('/kompen_diajukan') }}" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </div>
@else
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Data Kompen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info">
                    <h5><i class="icon fas fa-info"></i> Data Kompen </h5>
                    Berikut adalah detail dari data kompen
                </div>
                <table class="table table-sm table-bordered table-stripped">
                    <tr>
                        <th class="text-right col-3">Nama Kompen : </th>
                        <td class="col-9">{{ $kompen_diajukan->nama }}</td>
                    </tr>
                    <tr>
                        <th class="text-right col-3">Deskripsi : </th>
                        <td class="col-9">{{ $kompen_diajukan->deskripsi }} </td>
                    </tr>
                    <tr>
                        <th class="text-right col-3">Pemberi Tugas : </th>
                        <td class="col-9">{{ $kompen_diajukan->personilAkademik->nama }}</td>
                    </tr>
                    <tr>
                        <th class="text-right col-3">Jenis Kompen : </th>
                        <td class="col-9">{{ $kompen_diajukan->jenisKompen->nama_jenis }}</td>
                    </tr>
                    <tr>
                        <th class="text-right col-3">Kuota Maksimal : </th>
                        <td class="col-9">{{ $kompen_diajukan->kuota }}</td>
                    </tr>
                    <tr>
                        <th class="text-right col-3">Jam Konversi : </th>
                        <td class="col-9">{{ $kompen_diajukan->jam_kompen }}</td>
                    </tr>
                    <tr>
                        <th class="text-right col-3">Tanggal Mulai : </th>
                        <td class="col-9">{{ $kompen_diajukan->tanggal_mulai }}</td>
                    </tr>
                    <tr>
                        <th class="text-right col-3">Tanggal Selesai : </th>
                        <td class="col-9">{{ $kompen_diajukan->tanggal_selesai }}</td>
                    </tr>
                </table>
                @if (auth()->user()->level->kode_level == "ADM")
                <div class="form-group">
                    <label>Alasan</label>
                    <input type="text" name="alasan" id="alasan" class="form-control" @required(true)>
                    <small id="error-alasan" class="error-text form-text text-danger"></small>
                </div>
                @endif
            </div>
            <div class="modal-footer">
                @if (auth()->user()->level->kode_level == "ADM")
                <form action="{{ url('/kompen_diajukan/'. $kompen_diajukan->id_kompen . '/diterima') }}" method="POST" id="form-diterima">
                    <button type="submit" class="btn btn-success">Setuju</button>
                </form>
                <form action="{{ url('/kompen_diajukan/'. $kompen_diajukan->id_kompen . '/ditolak') }}" method="POST" id="form-ditolak">
                    <button type="submit" class="btn btn-danger">Tolak</button>
                </form>
                @endif
                <button type="button" data-dismiss="modal" class="btn btn-warning">Kembali</button>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#form-ditolak, #form-diterima").on('submit', function(e){
                var alasanValue = $('#alasan').val();
                $(this).append('<input type="hidden" name="alasan" id="alasan" value="' + alasanValue + '">');
            });

            $("#form-ditolak").validate({
                rules: {
                    id_kompen: { required: true },
                    alasan: {required: true}
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: form.action,
                        type: form.method,
                        data: $(form).serialize(),
                        success: function(response) {
                            if (response.status) {
                                $('#myModal').modal('hide');
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: response.message
                                });
                                dataKompenDiajukan.ajax.reload();
                            } else {
                                $('.error-text').text('');
                                $.each(response.msgField, function(prefix, val) {
                                    $('#error-' + prefix).text(val[0]);
                                });
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Terjadi Kesalahan',
                                    text: response.message
                                });
                            }
                        }
                    });
                    return false;
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
            $("#form-diterima").validate({
                rules: {
                    id_kompen: { required: true },
                    alasan: {required: true}
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: form.action,
                        type: form.method,
                        data: $(form).serialize(),
                        success: function(response) {
                            if (response.status) {
                                $('#myModal').modal('hide');
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: response.message
                                });
                                dataKompenDiajukan.ajax.reload();
                            } else {
                                $('.error-text').text('');
                                $.each(response.msgField, function(prefix, val) {
                                    $('#error-' + prefix).text(val[0]);
                                });
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Terjadi Kesalahan',
                                    text: response.message
                                });
                            }
                        }
                    });
                    return false;
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endempty
@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row page-title align-items-center">
            <div class="col-sm-4 col-xl-6">
                <h4 class="mb-1 mt-0">Siswa</h4>
            </div>
            <div class="col-sm-8 col-xl-6">
                <form class="form-inline float-sm-right mt-3 mt-sm-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary" onclick="tambah()">
                            <i class='uil uil-plus-circle mr-1'></i>Tambah</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="basic-datatable" class="table nowrap">
                            <thead>
                            <tr>
                                <th>Nama</th>
                                <th>NIS</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $x)
                                <tr>
                                    <td>{{$x->nama}}</td>
                                    <td>{{$x->nis}}</td>
                                    <td>
                                        <button class="btn btn-success btn-sm" onclick="edit({{$x->id}})"><i data-feather="edit"></i></button>
                                        <button class="btn btn-warning btn-sm" onclick="ubahpass({{$x->id}})"><i data-feather="lock"></i></button>
                                        <button class="btn btn-danger btn-sm" onclick="hapus({{$x->id}})"><i data-feather="trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>

    </div>

    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Nama</label>
                        <div class="col-lg-10">
                            <input type="text" name="nama" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">NIS</label>
                        <div class="col-lg-10">
                            <input type="number" name="nis" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">NISN</label>
                        <div class="col-lg-10">
                            <input type="number" name="nisn" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Tempat Lahir</label>
                        <div class="col-lg-10">
                            <input type="text" name="tempat_lahir" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-lg-10">
                            <input type="date" name="tanggal_lahir" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-lg-10">
                            <select name="jenis_kelamin" class="form-control">
                                <option value="" disabled selected>Pilih...</option>
                                <option>Laki-laki</option>
                                <option>Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Tahun Masuk</label>
                        <div class="col-lg-10">
                            <input type="number" min="2000" max="9999" name="tahun_masuk" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Tahun Keluar</label>
                        <div class="col-lg-10">
                            <input type="number" min="2000" max="9999" name="tahun_keluar" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Status</label>
                        <div class="col-lg-10">
                            <select name="is_aktif" class="form-control">
                                <option value="" disabled selected>Pilih...</option>
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                    <button type="button" id="tmblsubmit" class="btn btn-primary">Simpan</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div id="modalubahpassword" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Password Baru</label>
                        <div class="col-lg-10">
                            <input type="password" name="passbaru" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                    <button type="button" onclick="gantipass()" class="btn btn-primary">Ganti</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection

@push('css')

    <link href="/assets/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

@endpush

@push('js')

    <script src="/assets/libs/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/libs/datatables/dataTables.responsive.min.js"></script>

    <script>
        var table = $('#basic-datatable').DataTable();
        var nama = $('input[name="nama"]');
        var nis = $('input[name="nis"]');
        var nisn = $('input[name="nisn"]');
        var tempat_lahir = $('input[name="tempat_lahir"]');
        var tanggal_lahir = $('input[name="tanggal_lahir"]');
        var jenis_kelamin = $('select[name="jenis_kelamin"]');
        var tahun_masuk = $('input[name="tahun_masuk"]');
        var tahun_keluar = $('input[name="tahun_keluar"]');
        var is_aktif = $('select[name="is_aktif"]');
        function tambah(){
            $('#tmblsubmit').attr('onclick','tambahkan()')
            $('#myModalLabel').html('Tambah Data')
            $('#myModal').modal('show')
        }
        function edit(id){
            axios.get('/datasiswa/'+id)
                .then(function (response) {
                    nama.val(response.data.data['nama'])
                    nis.val(response.data.data['nis'])
                    nisn.val(response.data.data['nisn'])
                    tempat_lahir.val(response.data.data['tempat_lahir'])
                    tanggal_lahir.val(response.data.data['tanggal_lahir'])
                    jenis_kelamin.val(response.data.data['jenis_kelamin'])
                    tahun_masuk.val(response.data.data['tahun_masuk'])
                    tahun_keluar.val(response.data.data['tahun_keluar'])
                    is_aktif.val(response.data.data['is_aktif'])
                    $('#tmblsubmit').attr('onclick','editkan('+response.data.data['id']+')')
                    $('#myModalLabel').html('Edit Data')
                    $('#myModal').modal('show')
                })
                .catch(function (error) {
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });
        }
        function tambahkan(){

            if (!nama){
                return alert('Lengkapi form')
            }
            var datakirim = {
                _token : window.myToken.csrfToken,
                nama : nama.val(),
                nis : nis.val(),
                nisn : nisn.val(),
                tempat_lahir : tempat_lahir.val(),
                tanggal_lahir : tanggal_lahir.val(),
                jenis_kelamin : jenis_kelamin.val(),
                tahun_masuk : tahun_masuk.val(),
                tahun_keluar : tahun_keluar.val(),
                is_aktif : is_aktif.val(),
            }
            axios.post('/datasiswa',datakirim)
                .then(function (response) {
                    toastr.success(response.data)
                    nip = '';nama = ''
                    $('#myModal').modal('hide')
                    setTimeout(function (){
                        location.reload()
                    },1500)
                })
                .catch(function (error) {
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });
        }

        function editkan(id){
            var nip = $('input[name="nip"]');
            var nama = $('input[name="nama"]');
            if (!nip || !nama){
                return alert('Lengkapi form')
            }
            var datakirim = {
                _token : window.myToken.csrfToken,
                nama : nama.val(),
                nis : nis.val(),
                nisn : nisn.val(),
                tempat_lahir : tempat_lahir.val(),
                tanggal_lahir : tanggal_lahir.val(),
                jenis_kelamin : jenis_kelamin.val(),
                tahun_masuk : tahun_masuk.val(),
                tahun_keluar : tahun_keluar.val(),
                is_aktif : is_aktif.val(),
            }
            axios.patch('/datasiswa/' + id,datakirim)
                .then(function (response) {
                    toastr.success(response.data)
                    nip = '';nama = ''
                    $('#myModal').modal('hide')
                    setTimeout(function (){
                        location.reload()
                    },1500)
                })
                .catch(function (error) {
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });
        }
        function hapus(id){
            var r = confirm('Yakin ingin menghapus?');
            if(r){
                axios.delete('/datasiswa/' + id)
                    .then(function (response) {
                        toastr.success(response.data)
                        setTimeout(function (){
                            location.reload()
                        },1500)
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });
            }
        }
        var idpass;
        function ubahpass(id){
            idpass = id;
            $('#modalubahpassword').modal('show')
        }
        function gantipass(){
            var passbaru = $('input[name="passbaru"]');
            axios.patch('/datasiswa/password/' + idpass,{password : passbaru.val()})
                .then(function (response) {
                    toastr.success(response.data)
                    $('#modalubahpassword').modal('hide')
                    setTimeout(function (){
                        location.reload()
                    },1500)
                })
                .catch(function (error) {
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });
        }
    </script>

@endpush

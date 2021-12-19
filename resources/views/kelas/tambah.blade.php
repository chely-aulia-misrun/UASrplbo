@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row page-title align-items-center">
            <div class="col-sm-4 col-xl-6">
                <h4 class="mb-1 mt-0">Tambah Kelas</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="/kelas" method="post" class="card-body">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Kelas</label>
                                    <div class="col-lg-10">
                                        <select name="tingkat" class="form-control">
                                            <option value="" disabled selected>Pilih</option>
                                            <option>X</option>
                                            <option>XI</option>
                                            <option>XII</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Wali Kelas</label>
                                    <div class="col-lg-10">
                                        <select name="wali_kelas_id" class="form-control">
                                            <option value="" disabled selected>Pilih</option>
                                            @foreach($guru as $x)
                                                <option value="{{$x->id}}">{{$x->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Nama</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="nama" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Tahun Ajaran</label>
                                    <div class="col-lg-10">
                                        <select name="tahun_ajaran_id" class="form-control">
                                            <option value="" disabled selected>Pilih</option>
                                            @foreach($tahunajaran as $x)
                                                <option value="{{$x->id}}">{{$x->tahun_aktif}} - {{$x->semester}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <h4>Mata Pelajaran</h4>
                        <div class="row">
                            @foreach($mp as $x)
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">{{$x->nama}}</label>
                                        <div class="col-lg-10">
                                            <select name="mp[{{$x->id}}]" class="form-control" required>
                                                <option value="" disabled selected>Pilih</option>
                                                @foreach($guru as $a)
                                                    <option value="{{$a->id}}">{{$a->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Jadwal</label>
                                        <div class="col-lg-7">
                                            <select name="hari[{{$x->id}}]" class="form-control" required>
                                                <option value="" disabled selected>Pilih</option>
                                                <option>Senin</option><option>Selasa</option><option>Rabu</option><option>Kamis</option><option>Jumat</option><option>Sabtu</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3"><input class="form-control" type="time" name="jam[{{$x->id}}]" required></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <br>
                                <h4>Siswa</h4>
                                <table id="basic-datatable" class="table nowrap">
                                    <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>NIS</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($siswa as $x)
                                        <tr>
                                            <td>{{$x->nama}}</td>
                                            <td>{{$x->nis}}</td>
                                            <td>
                                                <div class="custom-control custom-checkbox mb-2">
                                                    <input type="checkbox" id="customCheck{{$x->id}}" class="custom-control-input" name="siswa[{{$x->id}}]">
                                                    <label class="custom-control-label" for="customCheck{{$x->id}}"></label>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Kelas</label>
                                <div class="col-lg-10">
                                    <select name="tingkat" class="form-control">
                                        <option value="" disabled selected>Pilih</option>
                                        <option>VII</option>
                                        <option>VIII</option>
                                        <option>IX</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Guru</label>
                                <div class="col-lg-10">
                                    <select name="wali_kelas_id" class="form-control">
                                        <option value="" disabled selected>Pilih</option>
                                        @foreach($guru as $x)
                                            <option value="{{$x->id}}">{{$x->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Nama</label>
                                <div class="col-lg-10">
                                    <input type="text" name="nama" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <button type="button" id="tmblsubmit" class="btn btn-primary">Tambah</button>
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
        function tambah(){
            $('#tmblsubmit').attr('onclick','tambahkan()')
            $('#myModalLabel').html('Tambah Data')
            $('#myModal').modal('show')
        }
        function edit(id){
            axios.get('/matapelajaran/'+id)
                .then(function (response) {
                    var kkm = $('input[name="kkm"]');
                    var nama = $('input[name="nama"]');
                    var kurikulum_id = $('select[name="kurikulum_id"]');
                    kkm.val(response.data.data['kkm'])
                    nama.val(response.data.data['nama'])
                    kurikulum_id.val(response.data.data['kurikulum_id'])
                    $('#tmblsubmit').attr('onclick','editkan('+response.data.data['id']+')')
                    $('#myModalLabel').html('Tambah Data')
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
            var kkm = $('input[name="kkm"]');
            var nama = $('input[name="nama"]');
            var kurikulum_id = $('select[name="kurikulum_id"]');
            if (!nama){
                return alert('Lengkapi form')
            }
            var datakirim = {
                _token : window.myToken.csrfToken,
                kkm : kkm.val(),
                nama : nama.val(),
                kurikulum_id : kurikulum_id.val()
            }
            axios.post('/matapelajaran',datakirim)
                .then(function (response) {
                    toastr.success(response.data)
                    deskripsi = '';nama = ''
                    $('#myModal').modal('hide')
                    table.ajax.reload()
                })
                .catch(function (error) {
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });
        }

        function editkan(id){
            var kkm = $('input[name="kkm"]');
            var nama = $('input[name="nama"]');
            var kurikulum_id = $('select[name="kurikulum_id"]');
            if (!nama){
                return alert('Lengkapi form')
            }
            var datakirim = {
                _token : window.myToken.csrfToken,
                kkm : kkm.val(),
                nama : nama.val(),
                kurikulum_id : kurikulum_id.val()
            }
            axios.patch('/matapelajaran/' + id,datakirim)
                .then(function (response) {
                    toastr.success(response.data)
                    deskripsi = '';nama = ''
                    $('#myModal').modal('hide')
                    table.ajax.reload()
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
                axios.delete('/matapelajaran/' + id)
                    .then(function (response) {
                        toastr.success(response.data)
                        table.ajax.reload()
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });
            }
        }
    </script>

@endpush

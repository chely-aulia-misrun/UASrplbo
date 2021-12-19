@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row page-title align-items-center">
            <div class="col-sm-4 col-xl-6">
                <h4 class="mb-1 mt-0">Mata Pelajaran</h4>
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
                                <th>KKM</th>
                                <th>Kurikulum</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $x)
                                <tr>
                                    <td>{{$x->nama}}</td>
                                    <td>{{$x->kkm}}</td>
                                    <td>{{$x->kurikulum->nama}}</td>
                                    <td>
                                        <button class="btn btn-success btn-sm" onclick="edit({{$x->id}})"><i data-feather="edit"></i></button>
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
                        <label class="col-lg-2 col-form-label">KKM</label>
                        <div class="col-lg-10">
                            <input type="number" name="kkm" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Kurikulum</label>
                        <div class="col-lg-10">
                            <select name="kurikulum_id" class="form-control">
                                <option value="" disabled selected>Pilih</option>
                                @foreach($kurikulum as $x)
                                    <option value="{{$x->id}}">{{$x->nama}}</option>
                                @endforeach
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
                axios.delete('/matapelajaran/' + id)
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
    </script>

@endpush

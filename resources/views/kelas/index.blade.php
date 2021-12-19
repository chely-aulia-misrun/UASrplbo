@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row page-title align-items-center">
            <div class="col-sm-4 col-xl-6">
                <h4 class="mb-1 mt-0">Kelas</h4>
            </div>
            <div class="col-sm-8 col-xl-6">
                <form class="form-inline float-sm-right mt-3 mt-sm-0">
                    <div class="btn-group">
                        <a href="/kelas/create" type="button" class="btn btn-primary">
                            <i class='uil uil-plus-circle mr-1'></i>Tambah</a>
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
                                <th>Wali Kelas</th>
                                <th>Jumlah Siswa</th>
                                <th>Jumlah Pelajaran</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $x)
                                <tr>
                                    <td>
                                        {{$x->nama}}<br>
                                        {{$x->tahunajaran->tahun_aktif}} - {{$x->tahunajaran->semester}}
                                    </td>
                                    <td>{{$x->walikelas->nama}}</td>
                                    <td>{{count($x->siswa)}}</td>
                                    <td>{{count($x->jadwal())}}</td>
                                    <td>
                                        <a class="btn btn-success btn-sm" href="/kelas/{{$x->id}}"><i data-feather="edit"></i></a>
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

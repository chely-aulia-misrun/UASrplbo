@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row page-title align-items-center">
            <div class="col-sm-4 col-xl-6">
                <h4 class="mb-1 mt-0">Sekolah</h4>
            </div>
{{--            <div class="col-sm-8 col-xl-6">--}}
{{--                <form class="form-inline float-sm-right mt-3 mt-sm-0">--}}
{{--                    <div class="btn-group">--}}
{{--                        <button type="button" class="btn btn-primary" onclick="tambah()">--}}
{{--                            <i class='uil uil-plus-circle mr-1'></i>Tambah</button>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">Nama</label>
                            <div class="col-lg-10">
                                <input type="text" name="nama" value="{{$data->nama}}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">Alamat</label>
                            <div class="col-lg-10">
                                <input type="text" name="alamat" value="{{$data->alamat}}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">Kepala Sekolah</label>
                            <div class="col-lg-10">
                                <input type="text" name="kepala_sekolah" value="{{$data->kepala_sekolah}}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">NIP Kepala Sekolah</label>
                            <div class="col-lg-10">
                                <input type="text" name="nip_kepala_sekolah" value="{{$data->nip_kepala_sekolah}}" class="form-control">
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-success float-right" type="button" onclick="editkan({{$data->id}})">Edit</button>
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
        function editkan(id){
            var nip_kepala_sekolah = $('input[name="nip_kepala_sekolah"]');
            var kepala_sekolah = $('input[name="kepala_sekolah"]');
            var alamat = $('input[name="alamat"]');
            var nama = $('input[name="nama"]');
            if (!alamat || !nama){
                return alert('Lengkapi form')
            }
            var datakirim = {
                _token : window.myToken.csrfToken,
                nip_kepala_sekolah : nip_kepala_sekolah.val(),
                kepala_sekolah : kepala_sekolah.val(),
                alamat : alamat.val(),
                nama : nama.val()
            }
            axios.patch('/sekolah/' + id,datakirim)
                .then(function (response) {
                    toastr.success(response.data)
                    deskripsi = '';nama = ''
                    $('#myModal').modal('hide')
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

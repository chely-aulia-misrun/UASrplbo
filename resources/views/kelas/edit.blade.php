@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row page-title align-items-center">
            <div class="col-sm-4 col-xl-6">
                <h4 class="mb-1 mt-0">Edit Kelas</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="" method="post" class="card-body">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Kelas</label>
                                    <div class="col-lg-10">
                                        <select name="tingkat" class="form-control">
                                            <option value="" disabled>Pilih</option>
                                            <option @if($data->tingkat == 'X') selected @endif>X</option>
                                            <option @if($data->tingkat == 'XI') selected @endif>XI</option>
                                            <option @if($data->tingkat == 'XII') selected @endif>XII</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Wali Kelas</label>
                                    <div class="col-lg-10">
                                        <select name="wali_kelas_id" class="form-control">
                                            <option value="" disabled>Pilih</option>
                                            @foreach($guru as $x)
                                                <option value="{{$x->id}}" @if($data->wali_kelas_id == $x->id) selected @endif>{{$x->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Nama</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="nama" value="{{$data->nama}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Tahun Ajaran</label>
                                    <div class="col-lg-10">
                                        <select name="tahun_ajaran_id" class="form-control">
                                            <option value="" disabled>Pilih</option>
                                            @foreach($tahunajaran as $x)
                                                <option value="{{$x->id}}" @if($data->tahun_ajaran_id == $x->id) selected @endif>{{$x->tahun_aktif}} - {{$x->semester}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <h4>Mata Pelajaran</h4>
                        <div class="row">
                            @foreach($jadwal as $x)
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">{{$x->pelajaran->nama}}</label>
                                        <div class="col-lg-10">
                                            <select name="mp[{{$x->id}}]" class="form-control" required>
                                                <option value="" disabled>Pilih</option>
                                                @foreach($guru as $a)
                                                    <option value="{{$a->id}}" @if($a->id == $x->mata_pelajaran_id) selected @endif>{{$a->nama}}</option>
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
                                                <option @if($x->hari == 'Senin') selected @endif>Senin</option>
                                                <option @if($x->hari == 'Selasa') selected @endif>Selasa</option>
                                                <option @if($x->hari == 'Rabu') selected @endif>Rabu</option>
                                                <option @if($x->hari == 'Kamis') selected @endif>Kamis</option>
                                                <option @if($x->hari == 'Jumat') selected @endif>Jumat</option>
                                                <option @if($x->hari == 'Sabtu') selected @endif>Sabtu</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3"><input class="form-control" value="{{$x->jam}}" type="time" name="jam[{{$x->id}}]" required></div>
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
                                                    <input type="checkbox" id="customCheck{{$x->id}}" @if(in_array($x->id,$data->siswa)) checked @endif class="custom-control-input" name="siswa[{{$x->id}}]">
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
                                <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-danger">Hapus</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="" method="post" class="modal-content">
                @csrf
                @method('delete')
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Yakin ingin menghapus kelas ini?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form><!-- /.modal-content -->
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
    </script>

@endpush

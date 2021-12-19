@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row page-title align-items-center">
            <div class="col-sm-4 col-xl-6">

            </div>
        </div>

        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <table style="width: 100%">
                            <thead>
                            <tr>
                                <th>Nama Kelas</th>
                                <th>:</th>
                                <th>{{$data->tingkat}} - {{$data->nama}}</th>
                            </tr>
                            <tr>
                                <th>Tahun Ajaran</th>
                                <th>:</th>
                                <th>{{$data->tahunajaran->tahun_aktif}} - {{$data->tahunajaran->semester}}</th>
                            </tr>
                            <tr>
                                <th>Wali Kelas</th>
                                <th>:</th>
                                <th>{{$data->walikelas->nama}}</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NISN</th>
                                <th>N. Pengetahuan</th>
                                <th>P. Pengetahuan</th>
                                <th>N. Keterampilan</th>
                                <th>P. Keterampilan</th>
                                @if($mulai)
                                <th>Isi</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rapor as $y => $x)
                                <tr>
                                    <td>{{$y+1}}</td>
                                    <td>{{$x->siswa->nama}}</td>
                                    <td>{{$x->siswa->nisn}}</td>
                                    <td>{{$x->nilai->nilai_pengetahuan}}</td>
                                    <td>{{$x->nilai->predikat_pengetahuan}}</td>
                                    <td>{{$x->nilai->nilai_keterampilan}}</td>
                                    <td>{{$x->nilai->predikat_keterampilan}}</td>
                                    @if($mulai)
                                    <td>
                                        <button onclick="isi({{$x}})" class="btn btn-info btn-sm"><i data-feather="edit-2"></i></button>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Isi Nilai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="row">
                        @csrf
                        @method('patch')
                        <input name="id" hidden>
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Nama</label>
                                <div class="col-lg-10">
                                    <input type="text" name="nama" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">NISN</label>
                                <div class="col-lg-10">
                                    <input type="text" name="nisn" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Nilai Pengetahuan</label>
                                <div class="col-lg-10">
                                    <input type="number" name="nilai_pengetahuan" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Predikat Pengetahuan</label>
                                <div class="col-lg-10">
                                    <select name="predikat_pengetahuan" class="form-control">
                                        <option value="">Pilih...</option>
                                        <option>A</option>
                                        <option>B</option>
                                        <option>C</option>
                                        <option>D</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Deskripsi Pengetahuan</label>
                                <div class="col-lg-10">
                                    <input type="text" name="deskripsi_pengetahuan" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Nilai Keterampilan</label>
                                <div class="col-lg-10">
                                    <input type="number" name="nilai_keterampilan" class="form-control" >
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Predikat Keterampilan</label>
                                <div class="col-lg-10">
                                    <select name="predikat_keterampilan" class="form-control">
                                        <option value="">Pilih...</option>
                                        <option>A</option>
                                        <option>B</option>
                                        <option>C</option>
                                        <option>D</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Deskripsi Keterampilan</label>
                                <div class="col-lg-10">
                                    <input type="text" name="deskripsi_keterampilan" class="form-control">
                                </div>
                            </div>
                        </div>
                        <button id="tmblsubmit" type="submit" hidden></button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="$('#tmblsubmit').click()">Simpan</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('css')



@endpush

@push('js')

    <script>
        function isi(data){
            $('input[name="nama"]').val(data.siswa.nama)
            $('input[name="nisn"]').val(data.siswa.nisn)
            $('input[name="id"]').val(data.nilai.id)

            $('input[name="nilai_pengetahuan"]').val(data.nilai.nilai_pengetahuan)
            $('select[name="predikat_pengetahuan"]').val(data.nilai.predikat_pengetahuan)
            $('input[name="deskripsi_pengetahuan"]').val(data.nilai.deskripsi_pengetahuan)
            $('input[name="nilai_keterampilan"]').val(data.nilai.nilai_keterampilan)
            $('select[name="predikat_keterampilan"]').val(data.nilai.predikat_keterampilan)
            $('input[name="deskripsi_keterampilan"]').val(data.nilai.deskripsi_keterampilan)
            $('#myModal').modal('show')
        }
    </script>

@endpush

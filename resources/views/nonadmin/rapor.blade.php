@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row page-title align-items-center">
            <div class="col-sm-4 col-xl-6">
                <h4 class="mb-1 mt-0">Isi Rapor - Walikelas</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Nama</label>
                                    <div class="col-lg-10">
                                        <input type="text" value="{{$data->siswa->nama}}" disabled class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">NIS / NISN</label>
                                    <div class="col-lg-10">
                                        <input type="text" value="{{$data->siswa->nis}} / {{$data->siswa->nisn}}" disabled class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Kelas</label>
                                    <div class="col-lg-10">
                                        <input type="text" value="{{$data->kelas->tingkat}} - {{$data->kelas->nama}}" disabled class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Tahun Ajaran</label>
                                    <div class="col-lg-10">
                                        <input type="text" value="{{$data->tahunajaran->tahun_aktif}} - {{$data->tahunajaran->semester}}" disabled class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                    <label class="col-lg-2 col-form-label">Predikat Spiritual</label>
                                    <div class="col-lg-10">
                                        <select name="predikat_spiritual" class="form-control">
                                            <option value="" @if($data->predikat_spiritual == null) selected @endif>Pilih</option>
                                            <option @if($data->predikat_spiritual == 'A') selected @endif>A</option>
                                            <option @if($data->predikat_spiritual == 'B') selected @endif>B</option>
                                            <option @if($data->predikat_spiritual == 'C') selected @endif>C</option>
                                            <option @if($data->predikat_spiritual == 'D') selected @endif>D</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Deskripsi Spiritual</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="deskripsi_spiritual" value="{{$data->deskripsi_spiritual}}" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Predikat Sosial</label>
                                    <div class="col-lg-10">
                                        <select name="predikat_sosial" class="form-control">
                                            <option value="" @if($data->predikat_sosial == null) selected @endif>Pilih</option>
                                            <option @if($data->predikat_sosial == 'A') selected @endif>A</option>
                                            <option @if($data->predikat_sosial == 'B') selected @endif>B</option>
                                            <option @if($data->predikat_sosial == 'C') selected @endif>C</option>
                                            <option @if($data->predikat_sosial == 'D') selected @endif>D</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Deskripsi Sosial</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="deskripsi_sosial" value="{{$data->deskripsi_sosial}}" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Eskul</label>
                                    <div class="col-lg-10">
                                        <select name="eskul[]" class="form-control select2" multiple>
                                            <option value="" disabled>Pilih</option>
                                            @foreach($eskul as $x)
                                                <option value="{{$x->id}}" @if(in_array($x->id,$data->eskul)) selected @endif>{{$x->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <button type="button" onclick="window.history.back()" class="btn btn-outline-dark">Kembali</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection

@push('css')

    <link href="/assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />

@endpush

@push('js')

    <script src="/assets/libs/select2/select2.min.js"></script>
    <script>
        $('.select2').select2()
    </script>

@endpush

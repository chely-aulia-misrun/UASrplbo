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
                                <th>{{$kelas->tingkat}} - {{$kelas->nama}}</th>
                            </tr>
                            <tr>
                                <th>Tahun Ajaran</th>
                                <th>:</th>
                                <th>{{$kelas->tahunajaran->tahun_aktif}} - {{$kelas->tahunajaran->semester}}</th>
                            </tr>
                            <tr>
                                <th>Wali Kelas</th>
                                <th>:</th>
                                <th>{{$kelas->walikelas->nama}}</th>
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
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($siswa as $y => $x)
                                <tr>
                                    <td>{{$y+1}}</td>
                                    <td>{{$x->nama}}</td>
                                    <td>{{$x->nisn}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@push('css')



@endpush

@push('js')



@endpush

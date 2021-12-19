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
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NISN</th>
                                @if($mulai)
                                <th>Raport</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($siswa as $y => $x)
                                <tr>
                                    <td>{{$y+1}}</td>
                                    <td>{{$x->nama}}</td>
                                    <td>{{$x->nisn}}</td>
                                    @if($mulai)
                                    <td>
                                        <a href="/nonadmin/raport/{{$data->id}}/{{$x->id}}" class="btn btn-info">Lihat raport</a>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h4>Mata Pelajaran</h4>
                        <br>
                        @foreach($jadwal as $y => $x)
                            <div class="card" style="border: 1px black solid;">
                                <div class="card-body">
                                    <h4>{{$x->pelajaran->nama}}</h4>
                                </div>
                            </div>
                        @endforeach
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

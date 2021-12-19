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
                                <th>Nama Sekolah</th>
                                <th>:</th>
                                <th>{{$sekolah->nama}}</th>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <th>:</th>
                                <th>{{$sekolah->alamat}}</th>
                            </tr>
                            <tr>
                                <th>Nama Peserta Didik</th>
                                <th>:</th>
                                <th>{{$siswa->nama}}</th>
                            </tr>
                            <tr>
                                <th>Nomor Induk / NISN</th>
                                <th>:</th>
                                <th>{{$siswa->nis}} / {{$siswa->nisn}}</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
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
                                <th>Semester</th>
                                <th>:</th>
                                <th>{{$kelas->tahunajaran->semester}}</th>
                            </tr>
                            <tr>
                                <th>Tahun Ajaran</th>
                                <th>:</th>
                                <th>{{$kelas->tahunajaran->tahun_aktif}}</th>
                            </tr>
                            <tr>
                                <th colspan="3"><button id="printPageButton" type="button" class="btn btn-info" onclick="myPrintFunction()">Print</button></th>
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
                        <h4>A. Sikap</h4>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Predikat</th>
                                <th>Deskripsi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Spiritual</td>
                                <td>{{$rapor->predikat_spiritual}}</td>
                                <td>{{$rapor->deskripsi_spiritual}}</td>
                            </tr>
                            <tr>
                                <td>Sosial</td>
                                <td>{{$rapor->predikat_sosial}}</td>
                                <td>{{$rapor->deskripsi_sosial}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4>B. Pengetahuan</h4>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Mata Pelajaran</th>
                                <th>KKM</th>
                                <th>Angka</th>
                                <th>Predikat</th>
                                <th>Deskripsi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($nilai as $y => $x)
                                <tr>
                                    <td>{{$y+1}}</td>
                                    <td>{{$x->pelajaran->nama}}</td>
                                    <td>{{$x->pelajaran->kkm}}</td>
                                    <td>{{$x->nilai_pengetahuan}}</td>
                                    <td>{{$x->predikat_pengetahuan}}</td>
                                    <td>{{$x->deskripsi_pengetahuan}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <h4>Keterampilan</h4>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Mata Pelajaran</th>
                                <th>KKM</th>
                                <th>Angka</th>
                                <th>Predikat</th>
                                <th>Deskripsi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($nilai as $y => $x)
                                <tr>
                                    <td>{{$y+1}}</td>
                                    <td>{{$x->pelajaran->nama}}</td>
                                    <td>{{$x->pelajaran->kkm}}</td>
                                    <td>{{$x->nilai_keterampilan}}</td>
                                    <td>{{$x->predikat_keterampilan}}</td>
                                    <td>{{$x->deskripsi_keterampilan}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4>C. Ekstrakulikuler</h4>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Kegiatan Ekstrakulikuler</th>
                                <th>Keterangan</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($eskul as $y => $x)
                                <tr>
                                    <td>{{$y+1}}</td>
                                    <td>{{$x->nama}}</td>
                                    <td>{{$x->deskripsi}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4>D. Ketidakhadiran</h4>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Keterangan</th>
                                <th>Jumlah</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Sakit</td>
                                <td>{{$rapor->sakit}}</td>
                            </tr>
                            <tr>
                                <td>Izin</td>
                                <td>{{$rapor->izin}}</td>
                            </tr>
                            <tr>
                                <td>Tanpa Keterangan</td>
                                <td>{{$rapor->tanpa_keterangan}}</td>
                            </tr>
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

    <script>
        function myPrintFunction() {
            window.print();
        }
    </script>

@endpush

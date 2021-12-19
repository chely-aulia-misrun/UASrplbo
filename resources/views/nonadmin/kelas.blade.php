@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row page-title align-items-center">
            <div class="col-sm-4 col-xl-6">
                <h4 class="mb-1 mt-0">Kelas</h4>
            </div>
{{--            <div class="col-sm-8 col-xl-6">--}}
{{--                <form class="form-inline float-sm-right mt-3 mt-sm-0">--}}
{{--                    <div class="btn-group">--}}
{{--                        <a href="/kelas/create" type="button" class="btn btn-primary">--}}
{{--                            <i class='uil uil-plus-circle mr-1'></i>Tambah</a>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="basic-datatable" class="table nowrap">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Kelas</th>
                                <th>Tahun Ajaran</th>
                                <th>Jumlah Siswa</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $y => $x)
                                <tr>
                                    <td>{{$y+1}}</td>
                                    <td>
                                        {{$x->tingkat}} - {{$x->nama}}
                                    </td>
                                    <td>{{$x->tahunajaran->tahun_aktif}} - {{$x->tahunajaran->semester}}</td>
                                    <td>{{count($x->siswa)}}</td>
                                    <td>
                                        <a class="btn btn-success btn-sm" href="/nonadmin/kelas/{{$x->id}}"><i data-feather="info"></i></a>
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
    </script>

@endpush

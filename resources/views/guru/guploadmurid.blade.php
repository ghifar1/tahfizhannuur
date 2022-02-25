@extends('layouts.sbadmin')

@section('content')
    <div>
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah siswa excel</h6>
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputPassword1">File Excel</label>
                        <input type="file" name="siswa" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>

            </div>
        </div>
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List Siswa</h6>
            </div>
            <div class="card-body">
                <table id="siswa" class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NISN</th>
                            <th>Kelas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataSiswa as $siswa)
                            <tr>
                                <td>
                                    {{$siswa->name}}
                                </td>
                                <td>
                                    {{$siswa->nisn}}
                                </td>
                                <td>
                                    {{$siswa->kelas}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@push('script')
    <script>
        $(()=>{
            $('#siswa').DataTable({
                responsive: true
            });
        })
    </script>
@endpush
@endsection


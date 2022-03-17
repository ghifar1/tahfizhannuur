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
                            <th>Aksi</th>
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
                                <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" onclick="editClick({{$siswa->id}})" data-target="#exampleModal">
                                        Edit
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{url('/datasiswa/edit')}}" method="post">
                <div class="modal-body">

                        @csrf
                        <input id="id-hidden" type="hidden" name="id">
                        <div class="form-group">
                            <label>ID</label>
                            <input type="text" class="form-control" id="id-siswa" disabled>
                        </div>
                        <div class="form-group">
                            <label>NISN</label>
                            <input type="text" name="nisn" class="form-control" id="nisn">
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control" id="nama">
                        </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <input type="text" name="kelas" class="form-control" id="kelas">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            let base_url = "{{url('/api')}}"
            function editClick(id)
            {
                $.ajax({
                    url: base_url + `/getSiswa/${id}`,
                    success: (data)=>{
                        console.log(data)
                        $("#id-hidden").val(data.id)
                        $("#id-siswa").val(data.id)
                        $("#nisn").val(data.nisn)
                        $("#nama").val(data.name)
                        $("#kelas").val(data.kelas)
                    }
                })
                console.log(id)
            }
        </script>
    <script>
        $(()=>{
            $('#siswa').DataTable({
                responsive: true
            });
        })
    </script>
@endpush
@endsection


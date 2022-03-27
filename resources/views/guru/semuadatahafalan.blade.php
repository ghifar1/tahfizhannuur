@extends('layouts.sbadmin')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Siswa</h6>
        </div>
        <div class="card-body">
            <table id="siswa" class="table">
                <thead>
                <tr>
                    <th>Nama</th>
                    <th>Surat</th>
                    <th>Ayat</th>
                    <th>Lanjut</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
                @if(count($hafalan) !== 0)
                    @foreach($hafalan as $siswa)
                        <tr>
                            <td>
                                {{\App\Models\User::where('id', $siswa->user_id)->first()->name}}
                            </td>
                            <td>
                                {{$siswa->surat}}
                            </td>
                            <td>
                                {{$siswa->ayat}}
                            </td>
                            <td>
                                {{$siswa->isLanjut == 1 ? "Lanjut" : "Mengulang"}}
                            </td>
                            <td>
                                {{$siswa->status}}
                            </td>
                            <td>
                                {{$siswa->tanggal}}
                            </td>
                            <td>
                                <div class="d-flex flex-wrap">
                                    <button class="btn btn-warning m-2" data-toggle="modal" onclick="buttonClick(
                                        '{{$siswa->id}}', '{{\App\Models\User::where('id', $siswa->user_id)->first()->name}}','{{$siswa->surat}}', '{{$siswa->ayat}}', '{{$siswa->isLanjut}}', '{{$siswa->status}}'
                                        )"  data-target="#exampleModal">Edit</button>
                                    <form class="m-2" action="{{url('/hafalan/hapus')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="hafalan_id" value="{{$siswa->id}}">
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>

        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Hafalan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{url('hafalan/edit')}}" method="post">
                    @csrf
                    <input type="hidden" id="hafalan_id" name="hafalan_id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" aria-describedby="emailHelp" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Surat</label>
                            <select name="surat" id="surat" class="form-control" required>
                                @foreach($surat as $sr)
                                    <option value="{{$sr['asma']}}">{{$sr['asma']}} ({{$sr['nama']}})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ayat">Ayat</label>
                            <input type="text" name="ayat" id="ayat" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="lanjut">Lanjut</label>
                            <select class="form-control" name="islanjut" id="lanjut">
                                <option value="1">Lanjut</option>
                                <option value="0">Mengulang</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="murojaah">Status</label>
                            <select class="form-control" name="status" id="murojaah">
                                <option value="murojaah">Murojaah</option>
                                <option value="hafalan baru">Hafalan Baru</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('script')
        <script>
            function buttonClick(id_hafalan, nama, surat, ayat, lanjut, status)
            {
                $("#hafalan_id").val(id_hafalan)
                $("#nama").val(nama)
                $("#surat").val(surat)
                $("#ayat").val(ayat)
                $("#lanjut").val(lanjut).change();
                $("#murojaah").val(status).change();
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

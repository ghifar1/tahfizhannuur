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
                </tr>
                </thead>
                <tbody>
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
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
    @push('script')
        <script>
            $(()=>{
                $('#siswa').DataTable();
            })
        </script>
    @endpush
@endsection

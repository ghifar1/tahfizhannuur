@extends('layouts.sbadmin')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Ujian</h6>
        </div>
        <div class="card-body">
            <table id="siswa" class="table">
                <thead>
                <tr>
                    <th>Nama</th>
                    <th>Juz</th>
                    <th>Status</th>
                    <th>Penguji</th>
                    <th>Tanggal</th>
                </tr>
                </thead>
                <tbody>
                @if(count($ujian) !== 0)
                    @foreach($ujian  as $uji)
                        <tr>
                            <td>
                                {{\App\Models\User::where('id', $uji->user_id)->first()->name}}
                            </td>
                            <td>
                                {{$uji->juz}}
                            </td>
                            <td>
                                {{$uji->isLulus ? "Lulus" : "Tidak Lulus"}}
                            </td>
                            <td>
                                {{$uji->penguji}}
                            </td>
                            <td>
                                {{$uji->tanggal}}
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>

        </div>
    </div>
    @push('script')
        <script>
            $(()=>{
                $('#siswa').DataTable({
                    responsive: true
                    order: [[4, "desc"]]
                });
            })
        </script>
    @endpush
@endsection

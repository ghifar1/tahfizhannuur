@extends('layouts.sbadmin')

@section('content')
    <div>
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Ujian</h6>
            </div>
            <div class="card-body">
                <form method="post">
                    @csrf
                    <div class="form-group">
                        <label>Siswa</label>
                        <select name="siswa_id" class="form-control" required>
                            @foreach($dataSiswa as $data)
                                <option value="{{$data->id}}">{{$data->name}} ({{$data->nisn}})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Juz</label>
                        <select name="juz" class="form-control" required>
                            @foreach($juz['data'] as $jz)
                                <option value="{{$jz['index']}}">Juz {{$jz['index']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tanggal</label>
                        <input name="tanggal" type="date" class="form-control" id="exampleInputPassword1" required>
                    </div>
                    <div class="form-group">
                        <label>Status ujian</label>
                        <select name="isLulus" class="form-control" required>
                            <option value="1">Lulus</option>
                            <option value="0">Gagal</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Penguji</label>
                        <input name="penguji" type="text" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>

                </form>
            </div>
        </div>
    </div>

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
                });
            })
        </script>
    @endpush
@endsection

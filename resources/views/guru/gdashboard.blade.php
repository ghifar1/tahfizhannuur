@extends('layouts.sbadmin')

@section('content')
    <div>
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Harian Hafalan</h6>
            </div>
            <div class="card-body">
                <form method="post">
                    @csrf
                    <div class="form-group">
                        <label>Siswa</label>
                        <select name="siswa_id" class="form-control">
                            @foreach($dataSiswa as $data)
                                <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Surat</label>
                        <select name="surat" class="form-control">
                            @foreach($surat as $sr)
                                <option value="{{$sr['asma']}}">{{$sr['asma']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Ayat</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="ayat"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tanggal</label>
                        <input name="tanggal" type="date" class="form-control" id="exampleInputPassword1">
                    </div>
                    <select name="isLanjut" class="form-control">
                        <option value="1">Lanjut</option>
                        <option value="0">Mengulang</option>
                    </select>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="murojaah">Murojaah</option>
                            <option value="hafalan baru">Hafalan baru</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>

@endsection


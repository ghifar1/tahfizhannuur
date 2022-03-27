@extends('layouts.sbadmin')

@section('content')
    <div>
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="accordion" id="accordionExample">
                @foreach($hafalan as $kelas=>$hafal)
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{$kelas}}" aria-expanded="true" aria-controls="collapseOne">
                                    Kelas {{$kelas}}
                                </button>
                            </h2>
                        </div>

                        <div id="collapse{{$kelas}}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Surat</th>
                                        <th scope="col">Ayat</th>
                                        <th scope="col">Tanggal</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($hafal as $hfl)
                                        <tr>
                                            <th scope="row">{{$loop->index + 1}}</th>
                                            <td>{{$hfl->surat}}</td>
                                            <td>{{$hfl->ayat}}</td>
                                            <td>{{$hfl->tanggal}} {!! \Carbon\Carbon::now()->lessThan(\Carbon\Carbon::make($hfl->tanggal)->addDays(2)) ? '<span class="badge badge-success">Baru</span>': '' !!} </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

@endsection


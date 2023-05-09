@extends('../layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Peringatan Dini Bencana</div>

                    <div class="card-body text-center">
                        <a class="btn btn-white m-1" href="#" style="min-width: 130px;"><img src="{{ asset('asset/icon/anginkencang.png') }}" width="50px"><br>Angin Kencang</a>
                        <a class="btn btn-white m-1" href="peringatandini/banjir" style="min-width: 130px;"><img src="{{ asset('asset/icon/banjir.png') }}" width="50px"><br>Banjir</a>
                        <a class="btn btn-white m-1" href="#" style="min-width: 130px;"><img src="{{ asset('asset/icon/cuacaekstim.png') }}" width="50px"><br>Cuaca Ekstrim</a>
                        <a class="btn btn-white m-1" href="#" style="min-width: 130px;"><img src="{{ asset('asset/icon/gelombangtinggi.png') }}" width="50px"><br>Gelombang Tinggi</a>
                        <a class="btn btn-white m-1" href="#" style="min-width: 130px;"><img src="{{ asset('asset/icon/kekeringan.png') }}" width="50px"><br>Kekeringan</a>
                        <a class="btn btn-white m-1" href="#" style="min-width: 130px;"><img src="{{ asset('asset/icon/longsor.png') }}" width="50px"><br>Longsor</a>
                        <a class="btn btn-white m-1" href="#" style="min-width: 130px;"><img src="{{ asset('asset/icon/tsunami.png') }}" width="50px"><br>Tsunami</a>

                        <table class="table table-striped" style="margin-top: 1rem;">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Ancaman Bencana</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($peringatan_dini as $peringatan)
                                <tr>
                                    <th scope="row">{{ $peringatan->id }}</th>
                                    <td>{{ $peringatan->ancaman }}</td>
                                    <td>
                                        @if($peringatan->status == '1')
                                        <span class="badge badge-danger">Aktif</span>
                                        @else
                                        <span class="badge badge-success">Tidak Aktif</span>
                                        @endif
                                    </td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
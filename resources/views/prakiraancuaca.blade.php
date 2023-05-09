@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
			<div class="alert alert-primary" role="alert">Prakiraan cuaca BMKG untuk Kota Bima dalam rentan waktu 3 hari</div>
		</div>
		
		<div class="col-md-2">
            <a class="btn btn-primary btn-block" href="{{ url('prakiraancuaca/refresh') }}" role="button" style="margin-bottom: 1rem;">Perbaharui Data</a>
		</div>
		
		<div class="col-md-12">
			<div class="card-group">
				<div class="card card-weather">
					<img class="card-img-top" src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1557323760/weather.svg" alt="Card image cap">
					<div class="card-body" style="background-color: #fff;">
                        @foreach ($day_one as $dayone)
                        @once
						<h6 class="card-title" style="font-size: 13px;">Prakiraan Cuaca Tanggal : {{ date('d/m/Y', strtotime($dayone->date_time)) }}</h6>
                        @endonce
                        @endforeach
						<table class="table table-borderless table-condensed">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">Waktu</th>
                                    <th scope="col">Cuaca</th>
                                    <th class="text-center" scope="col">Temperatur</th>
                                    <th class="text-center" scope="col">Kelembaban</th>
                                </tr>
                            </thead>
                            <tbody>       
                            @foreach ($day_one as $dayone)
                                <tr>
                                    <th class="text-center" scope="row">{{ date('H:i', strtotime($dayone->date_time)) }}</th>
                                    <td>{{ $dayone->weather }}</td>
                                    <td class="text-center">{{ $dayone->temperature }}<span class="symbol">°</span></td>
                                    <td class="text-center">{{ $dayone->humidity }}%</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>      
					</div>
					<div class="card-footer text-center" style="background-color: #fff;">
                        @foreach ($day_one as $dayone)
                        @once
						<small class="text-muted">Last Update : {{ date('d-m-Y (H:i:s)', strtotime($dayone->created_at)) }}</small>
                        @endonce
                        @endforeach
					</div>
				</div>

                <div class="card card-weather">
					<img class="card-img-top" src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1557323760/weather.svg" alt="Card image cap">
					<div class="card-body" style="background-color: #fff;">
                        @foreach ($day_two as $daytwo)
                        @once
						<h6 class="card-title" style="font-size: 13px;">Prakiraan Cuaca Tanggal : {{ date('d/m/Y', strtotime($daytwo->date_time)) }}</h6>
                        @endonce
                        @endforeach
						<table class="table table-borderless table-condensed">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">Waktu</th>
                                    <th scope="col">Cuaca</th>
                                    <th class="text-center" scope="col">Temperatur</th>
                                    <th class="text-center" scope="col">Kelembaban</th>
                                </tr>
                            </thead>
                            <tbody>       
                            @foreach ($day_two as $daytwo)
                                <tr>
                                    <th class="text-center" scope="row">{{ date('H:i', strtotime($daytwo->date_time)) }}</th>
                                    <td>{{ $daytwo->weather }}</td>
                                    <td class="text-center">{{ $daytwo->temperature }}<span class="symbol">°</span></td>
                                    <td class="text-center">{{ $daytwo->humidity }}%</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>      
					</div>
					<div class="card-footer text-center" style="background-color: #fff;">
                        @foreach ($day_two as $daytwo)
                        @once
						<small class="text-muted">Last Update : {{ date('d-m-Y (H:i:s)', strtotime($daytwo->created_at)) }}</small>
                        @endonce
                        @endforeach
					</div>
				</div>

                <div class="card card-weather">
					<img class="card-img-top" src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1557323760/weather.svg" alt="Card image cap">
					<div class="card-body" style="background-color: #fff;">
                        @foreach ($day_three as $daythree)
                        @once
						<h6 class="card-title" style="font-size: 13px;">Prakiraan Cuaca Tanggal : {{ date('d/m/Y', strtotime($daythree->date_time)) }}</h6>
                        @endonce
                        @endforeach
						<table class="table table-borderless table-condensed">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">Waktu</th>
                                    <th scope="col">Cuaca</th>
                                    <th class="text-center" scope="col">Temperatur</th>
                                    <th class="text-center" scope="col">Kelembaban</th>
                                </tr>
                            </thead>
                            <tbody>       
                            @foreach ($day_three as $daythree)
                                <tr>
                                    <th class="text-center" scope="row">{{ date('H:i', strtotime($daythree->date_time)) }}</th>
                                    <td>{{ $daythree->weather }}</td>
                                    <td class="text-center">{{ $daythree->temperature }}<span class="symbol">°</span></td>
                                    <td class="text-center">{{ $daythree->humidity }}%</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>      
					</div>
					<div class="card-footer text-center" style="background-color: #fff;">
                        @foreach ($day_three as $daythree)
                        @once
						<small class="text-muted">Last Update : {{ date('d-m-Y (H:i:s)', strtotime($daythree->created_at)) }}</small>
                        @endonce
                        @endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

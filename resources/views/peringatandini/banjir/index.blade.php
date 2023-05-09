@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="alert alert-primary" role="alert">
                    Status peringatan dini bencana banjir : <strong>@if($banjir->status == '1') Aktif @else Tidak Aktif @endif</strong>
                </div>

                <div class="card-deck">
                    <div class="card">
                        <div class="card-body">
                            <form action="banjir/update" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $banjir->id }}">
                                <label class="form-check-label">Status Peringatan Dini :</label>
                                <div class="form-group">
                                    <div class="form-check-inline">
                                        <label class="form-check-label" for="radio1">
                                            <input type="radio" class="form-check-input" name="status" value="1" {{ ($banjir->status == "1")? "checked" : "" }}>Aktif
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label" for="radio2">
                                            <input type="radio" class="form-check-input" name="status" value="0" {{ ($banjir->status == "0")? "checked" : "" }}>Tidak Aktif
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="comment">Pesan :</label>
                                    <textarea class="form-control" name="pesan" rows="5" id="pesan">{{ $banjir->pesan }}</textarea>
                                </div>
                                <input type="submit" class="btn btn-primary btn-block" Value="Submit">
                                
                            </form>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Sistem Informasi Peringatan Dini</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
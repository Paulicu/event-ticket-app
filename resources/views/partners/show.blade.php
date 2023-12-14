@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            View Partner
        </div>
        <div class="panel-body">
            <div class="pull-right">
                <a class="btn btn-default" href="{{ route('partners.index') }}">Inapoi</a>
            </div>

            <div class="form-group">
                <strong>Nume: </strong> {{ $partener->nume }}
            </div>
        </div>
    </div>
@endsection
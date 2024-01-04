@extends('layouts.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            View Booking
        </div>
        <div class="panel-body">
            <div class="pull-right">
                <a class="btn btn-default" href="{{ route('bookings.index') }}">Inapoi</a>
            </div>

            <div class="form-group">
                <strong>Speaker: </strong> {{ $booking->speaker->nume }}
            </div>

            <div class="form-group">
                <strong>Eveniment: </strong> {{ $booking->event->titlu }}
            </div>
        </div>
    </div>
@endsection
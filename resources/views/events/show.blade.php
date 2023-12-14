@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            View Event
        </div>
        <div class="panel-body">
            <div class="pull-right">
                <a class="btn btn-default" href="{{ route('events.index') }}">Inapoi</a>
            </div>

            <div class="form-group">
                <strong>Titlu: </strong> {{ $event->titlu }}
            </div>

            <div class="form-group">
                <strong>Descriere: </strong> {{ $event->descriere }}
            </div>

            <div class="form-group">
                <strong>Data: </strong> {{ $event->date }}
            </div>

            <div class="form-group">
                <strong>Contact: </strong> {{ $event->contact }}
            </div>

            <div class="form-group">
                <label for="ID_PARTENER">Partener:</label>
                <span>{{ $event->partener->nume }}</span>
            </div>

            <div class="form-group">
                <label for="ID_SPONSOR">Sponsor:</label>
                <span>{{ $event->sponsor->nume }}</span>
            </div>

            <div class="form-group">
                <strong>Locatie: </strong> {{ $event->locatie }}
            </div>
        </div>
    </div>
@endsection
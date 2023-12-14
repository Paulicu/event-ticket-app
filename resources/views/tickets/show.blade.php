@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            View Ticket
        </div>
        <div class="panel-body">
            <div class="pull-right">
                <a class="btn btn-default" href="{{ route('tickets.index') }}">Inapoi</a>
            </div>

            <div class="form-group">
                <strong>Pret: </strong> {{ $ticket->price }}
            </div>

            <div class="form-group">
                <strong>Status: </strong> {{ $ticket->status }}
            </div>

            <div class="form-group">
                <label for="ID_EVENT">Eveniment:</label>
                <span>{{ $ticket->event->titlu }}</span>
            </div>

            <div class="form-group">
                <strong>Nume: </strong> {{ $ticket->name }}
            </div>

            <div class="form-group">
                <strong>Cantitate: </strong> {{ $ticket->quantity }}
            </div>

            <div class="form-group">
                <strong>Cod: </strong> {{ $ticket->code }}
            </div>
        </div>
    </div>
@endsection
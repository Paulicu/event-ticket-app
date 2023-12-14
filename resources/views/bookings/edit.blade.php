@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"> Modificare informatii Booking</div>
        <div class="panel-body">
            <!-- Exista inregistrari in tabelul task -->
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Eroare:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- Populez campurile formularului cu datele aferente din tabela task -->
            {!! Form::model($booking, ['method' => 'PATCH','route' => ['bookings.update', $booking->id]]) !!}
                <div class="form-group">
                    <label for="ID_SPEAKER">Speaker</label>
                    <select name="ID_SPEAKER" class="form-control">
                        @foreach($speakeri as $speaker)
                            <option value="{{ $speaker->id }}" {{ ($booking->ID_SPEAKER == $speaker->id) ? 'selected' : '' }}>{{ $speaker->nume }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="ID_EVENT">Eveniment</label>
                    <select name="ID_EVENT" class="form-control">
                        @foreach($evenimente as $event)
                            <option value="{{ $event->id }}" {{ ($booking->ID_EVENT == $event->id) ? 'selected' : '' }}>{{ $event->titlu }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <input type="submit" value="Salvare Modificari" class="btn btn-info">
                    <a href="{{route('bookings.index') }}" class="btn btn-default">Anulează</a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
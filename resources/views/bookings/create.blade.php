@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Adaugă Booking nou</div>
        <div class="panel-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Errors:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{ Form::open(array('route' => 'bookings.store','method'=>'POST')) }}
                <div class="form-group">
                    <label for="ID_SPEAKER">Speaker:</label>
                    <select name="ID_SPEAKER" class="form-control">
                        @foreach($speakeri as $speaker)
                            <option value="{{ $speaker->id }}" {{ (old('ID_SPEAKER') == $speaker->id) ? 'selected' : '' }}>{{ $speaker->nume }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="ID_EVENT">Eveniment:</label>
                    <select name="ID_EVENT" class="form-control">
                        @foreach($evenimente as $event)
                            <option value="{{ $event->id }}" {{ (old('ID_EVENT') == $event->id) ? 'selected' : '' }}>{{ $event->titlu }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <input type="submit" value="Adaugă Booking" class="btn btn-info">
                    <a href="{{ route('bookings.index') }}" class="btn btndefault">Anulează</a>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection

@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"> Modificare informatii Eveniment</div>
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
            {!! Form::model($event, ['method' => 'PATCH','route' => ['events.update', $event->id]]) !!}
                <div class="form-group">
                    <label for="titlu">Titlu</label>
                    <input type="text" name="titlu" class="form-control" value="{{$event->titlu }}">
                </div>

                <div class="form-group">
                    <label for="descriere">Descriere</label>
                    <textarea name="descriere" class="form-control" rows="3">{{ $event->descriere }}</textarea>
                </div>

                <div class="form-group">
                    <label for="date">Data</label>
                    <input type="datetime-local" name="date" class="form-control" value="{{ $event->date }}">
                </div>

                <div class="form-group">
                    <label for="contact">Contact</label>
                    <input type="text" name="contact" class="form-control" value="{{ $event->contact }}">
                </div>

                <div class="form-group">
                    <label for="ID_PARTENER">Partener</label>
                    <select name="ID_PARTENER" class="form-control">
                        @foreach($parteneri as $partener)
                            <option value="{{ $partener->id }}" {{ ($event->ID_PARTENER == $partener->id) ? 'selected' : '' }}>{{ $partener->nume }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="ID_SPONSOR">Sponsor</label>
                    <select name="ID_SPONSOR" class="form-control">
                        @foreach($sponsori as $sponsor)
                            <option value="{{ $sponsor->id }}" {{ ($event->ID_SPONSOR == $sponsor->id) ? 'selected' : '' }}>{{ $sponsor->nume }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="locatie">Locatie</label>
                    <input type="text" name="locatie" class="form-control" value="{{ $event->locatie }}">
                </div>

                <div class="form-group">
                    <input type="submit" value="Salvare Modificari" class="btn btn-info">
                    <a href="{{route('events.index') }}" class="btn btn-default">Anulează</a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
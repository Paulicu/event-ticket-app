@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"> Modificare informatii speaker</div>
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
            {!! Form::model($speaker, ['method' => 'PATCH','route' => ['speakers.update', $speaker->id]]) !!}
                <div class="form-group">
                    <label for="nume">Nume</label>
                    <input type="text" name="nume" class="form-control" value="{{$speaker->nume }}">
                </div>

                <div class="form-group">
                    <label for="prenume">Prenume</label>
                    <input type="text" name="prenume" class="form-control" value="{{$speaker->prenume }}">
                </div>  

                <div class="form-group">
                    <label for="descriere">Descriere</label>
                    <textarea name="descriere" class="form-control" rows="3">{{ $speaker->descriere }}</textarea>
                </div>

                <div class="form-group">
                    <input type="submit" value="Salvare Modificari" class="btn btn-info">
                    <a href="{{route('speakers.index') }}" class="btn btn-default">Anulează</a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
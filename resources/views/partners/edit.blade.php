@extends('layouts.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"> Modificare informatii Partener</div>
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
            {!! Form::model($partener, ['method' => 'PATCH','route' => ['partners.update', $partener->id]]) !!}
                <div class="form-group">
                    <label for="nume">Nume</label>
                    <input type="text" name="nume" class="form-control" value="{{$partener->nume }}">
                </div>

                <div class="form-group">
                    <input type="submit" value="Salvare Modificari" class="btn btn-info">
                    <a href="{{route('partners.index') }}" class="btn btn-default">Anulează</a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
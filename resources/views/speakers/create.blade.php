@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Adaugă Speaker nou</div>
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

            {{ Form::open(array('route' => 'speakers.store','method'=>'POST')) }}
                <div class="form-group">
                    <label for="nume">Nume</label>
                    <input type="text" name="nume" class="form-control" value="{{ old('nume') }}">
                </div>

                <div class="form-group">
                    <label for="prenume">Prenume</label>
                    <input type="text" name="prenume" class="form-control" value="{{ old('prenume') }}">
                </div>

                <div class="form-group">
                    <label for="descriere">Descriere</label>
                    <textarea name="descriere" class="form-control" rows="3">{{ old('descriere') }}</textarea>
                </div>
                
                <div class="form-group">
                    <input type="submit" value="Adaugă Speaker" class="btn btn-info">
                    <a href="{{ route('speakers.index') }}" class="btn btndefault">Anulează</a>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection

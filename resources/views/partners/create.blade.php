@extends('layouts.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Adaugă Partener nou</div>
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

            {{ Form::open(array('route' => 'partners.store','method'=>'POST')) }}
                <div class="form-group">
                    <label for="nume">Nume</label>
                    <input type="text" name="nume" class="form-control" value="{{ old('nume') }}">
                </div>
                
                <div class="form-group">
                    <input type="submit" value="Adaugă Partener" class="btn btn-info">
                    <a href="{{ route('partners.index') }}" class="btn btndefault">Anulează</a>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection

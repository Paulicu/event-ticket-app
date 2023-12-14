@extends('layouts.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Adaugă Bilet nou</div>
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

            {{ Form::open(array('route' => 'tickets.store','method'=>'POST')) }}
                <div class="form-group">
                    <label for="price">Pret</label>
                    <input type="number" name="price" step="0.01" min="0" class="form-control" value="{{ old('price') }}">
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" name="status" class="form-control" value="{{ old('status') }}">
                </div>

                <div class="form-group">
                    <label for="ID_EVENT">Eveniment</label>
                    <select name="ID_EVENT" class="form-control">
                        @foreach($evenimente as $event)
                            <option value="{{ $event->id }}" {{ (old('ID_EVENT') == $event->id) ? 'selected' : '' }}>{{ $event->titlu }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="name">Nume</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label for="quantity">Cantitate</label>
                    <input type="text" name="quantity" class="form-control" value="{{ old('quantity') }}">
                </div>

                <div class="form-group">
                    <label for="code">Cod</label>
                    <input type="text" name="code" class="form-control" value="{{ old('code') }}">
                </div>

                <div class="form-group">
                    <input type="submit" value="Adaugă Bilet" class="btn btn-info">
                    <a href="{{ route('tickets.index') }}" class="btn btndefault">Anulează</a>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection

@extends('layouts.master')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">
            Lista Speakers
        </div>

        <div class="panel-body">
            <div class="form-group">
                <div class="pull-right">
                    <a href="/speakers/create" class="btn btn-default">
                        Adăugare Speaker Nou
                    </a>
                </div>
            </div>

            <table class="table table-bordered table-stripped">
                <tr>
                    <th width="20">No</th>
                    <th>Nume</th>
                    <th>Prenume</th>
                    <th>Descriere</th>
                    <th width="300">Actiune</th>
                </tr>

                @if (count($speakers) > 0)
                    @foreach ($speakers as $key => $speaker)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $speaker->nume }}</td>
                            <td>{{ $speaker->prenume }}</td>
                            <td>{{ $speaker->descriere }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ route('speakers.show',$speaker->id) }}">Vizualizare</a>
                                <a class="btn btn-primary" href="{{ route('speakers.edit',$speaker->id) }}">Modificare</a>
                                {{ Form::open(['method' => 'DELETE','route' => ['speakers.destroy', $speaker->id],'style'=>'display:inline']) }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="9">Nu există speakers!</td>
                    </tr>
                @endif
            </table>

            <!-- Introduce nr pagina -->
            {{$speakers->render()}}
        </div>
    </div>
@endsection




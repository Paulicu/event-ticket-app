@extends('layouts.app')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">
            Lista Evenimentelor
        </div>

        <div class="panel-body">
            <div class="form-group">
                <div class="pull-right">
                    <a href="/events/create" class="btn btn-default">
                        Adăugare Eveniment Nou
                    </a>
                </div>
            </div>

            <table class="table table-bordered table-stripped">
                <tr>
                    <th width="20">No</th>
                    <th>Titlu</th>
                    <th>Descriere</th>
                    <th>Data</th>
                    <th>Contact</th>
                    <th>Partener</th>
                    <th>Sponsor</th>
                    <th>Locatie</th>
                    <th width="300">Actiune</th>
                </tr>

                @if (count($events) > 0)
                    @foreach ($events as $key => $event)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $event->titlu }}</td>
                            <td>{{ $event->descriere }}</td>
                            <td>{{ $event->date }}</td>
                            <td>{{ $event->contact }}</td>
                            <td>{{ $event->partener->nume }}</td>
                            <td>{{ $event->sponsor->nume }}</td>
                            <td>{{ $event->locatie }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ route('events.show',$event->id) }}">Vizualizare</a>
                                <a class="btn btn-primary" href="{{ route('events.edit',$event->id) }}">Modificare</a>
                                {{ Form::open(['method' => 'DELETE','route' => ['events.destroy', $event->id],'style'=>'display:inline']) }}
                                {{ Form::submit('Ștergere', ['class' => 'btn btn-danger']) }}
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="9">Nu există evenimente!</td>
                    </tr>
                @endif
            </table>

            <!-- Introduce nr pagina -->
            {{$events->render()}}
        </div>
    </div>
@endsection




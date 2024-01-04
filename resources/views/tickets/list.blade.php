@extends('layouts.app')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">
            Lista Biletelor
        </div>

        <div class="panel-body">
            <div class="form-group">
                <div class="pull-right">
                    <a href="/tickets/create" class="btn btn-default">
                        Adăugare Bilet Nou
                    </a>
                </div>
            </div>

            <table class="table table-bordered table-stripped">
                <tr>
                    <th width="20">No</th>
                    <th>Pret</th>
                    <th>Status</th>
                    <th>Eveniment</th>
                    <th>Nume</th>
                    <th>Cantitate</th>
                    <th>Cod</th>
                    <th width="300">Actiune</th>
                </tr>

                @if (count($tickets) > 0)
                    @foreach ($tickets as $key => $ticket)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $ticket->price }}</td>
                            <td>{{ $ticket->status }}</td>
                            <td>{{ $ticket->event->titlu }}</td>
                            <td>{{ $ticket->name }}</td>
                            <td>{{ $ticket->quantity }}</td>
                            <td>{{ $ticket->code }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ route('tickets.show',$ticket->id) }}">Vizualizare</a>
                                <a class="btn btn-primary" href="{{ route('tickets.edit',$ticket->id) }}">Modificare</a>
                                {{ Form::open(['method' => 'DELETE','route' => ['tickets.destroy', $ticket->id],'style'=>'display:inline']) }}
                                {{ Form::submit('Ștergere', ['class' => 'btn btn-danger']) }}
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="9">Nu există bilete!</td>
                    </tr>
                @endif
            </table>

            <!-- Introduce nr pagina -->
            {{$tickets->render()}}
        </div>
    </div>
@endsection




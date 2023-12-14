@extends('layouts.master')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">
            Lista Bookings
        </div>

        <div class="panel-body">
            <div class="form-group">
                <div class="pull-right">
                    <a href="/bookings/create" class="btn btn-default">
                        Adăugare Booking Nou
                    </a>
                </div>
            </div>

            <table class="table table-bordered table-stripped">
                <tr>
                    <th width="20">No</th>
                    <th>Speaker</th>
                    <th>Eveniment</th>
                    <th width="300">Actiune</th>
                </tr>

                @if (count($bookings) > 0)
                    @foreach ($bookings as $key => $booking)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $booking->speaker->nume }}</td>
                            <td>{{ $booking->event->titlu }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ route('bookings.show',$booking->id) }}">Vizualizare</a>
                                <a class="btn btn-primary" href="{{ route('bookings.edit',$booking->id) }}">Modificare</a>
                                {{ Form::open(['method' => 'DELETE','route' => ['bookings.destroy', $booking->id],'style'=>'display:inline']) }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="9">Nu există bookings!</td>
                    </tr>
                @endif
            </table>

            <!-- Introduce nr pagina -->
            {{$bookings->render()}}
        </div>
    </div>
@endsection




@extends('layouts.app')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">
            Lista sponsorslor
        </div>

        <div class="panel-body">
            <div class="form-group">
                <div class="pull-right">
                    <a href="/sponsors/create" class="btn btn-default">
                        Adăugare Sponsor Nou
                    </a>
                </div>
            </div>

            <table class="table table-bordered table-stripped">
                <tr>
                    <th width="20">No</th>
                    <th>Nume</th>
                    <th width="300">Actiune</th>
                </tr>

                @if (count($sponsors) > 0)
                    @foreach ($sponsors as $key => $sponsor)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $sponsor->nume }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ route('sponsors.show',$sponsor->id) }}">Vizualizare</a>
                                <a class="btn btn-primary" href="{{ route('sponsors.edit',$sponsor->id) }}">Modificare</a>
                                {{ Form::open(['method' => 'DELETE','route' => ['sponsors.destroy', $sponsor->id],'style'=>'display:inline']) }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="9">Nu există sponsori!</td>
                    </tr>
                @endif
            </table>

            <!-- Introduce nr pagina -->
            {{$sponsors->render()}}
        </div>
    </div>
@endsection




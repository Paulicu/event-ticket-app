@extends('layouts.app')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">
            Lista Partenerilor
        </div>

        <div class="panel-body">
            <div class="form-group">
                <div class="pull-right">
                    <a href="/partners/create" class="btn btn-default">
                        Adăugare Partener Nou
                    </a>
                </div>
            </div>

            <table class="table table-bordered table-stripped">
                <tr>
                    <th width="20">No</th>
                    <th>Nume</th>
                    <th width="300">Actiune</th>
                </tr>

                @if (count($partners) > 0)
                    @foreach ($partners as $key => $partener)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $partener->nume }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ route('partners.show',$partener->id) }}">Vizualizare</a>
                                <a class="btn btn-primary" href="{{ route('partners.edit',$partener->id) }}">Modificare</a>
                                {{ Form::open(['method' => 'DELETE','route' => ['partners.destroy', $partener->id],'style'=>'display:inline']) }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="9">Nu există parteneri!</td>
                    </tr>
                @endif
            </table>

            <!-- Introduce nr pagina -->
            {{$partners->render()}}
        </div>
    </div>
@endsection




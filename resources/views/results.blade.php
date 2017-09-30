@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">

                    <table class="table table-condensed table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Nombre</th>
                                <th>Profesor</th>
                                <th>Inscriptos</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($talleres as $taller)
                                <tr>
                                    <td>
                                        {{ $taller->id }}
                                    </td>
                                    <td>
                                        {{ $taller->name }}
                                    </td>
                                    <td>
                                        {{ $taller->professor }}
                                    </td>
                                    <td>
                                        {{ count($taller->users) }} / {{ $taller->cupo }}
                                    </td>
                                    <td>
                                        <span class="btn btn-info btn-xs">
                                            <a href="/results/{{ $taller->id }}/view">ver inscriptos</a>
                                        </span>
                                        <span class="btn btn-info btn-xs">
                                            <a href="/results/{{ $taller->id }}/view">descargar csv</a>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
@endsection

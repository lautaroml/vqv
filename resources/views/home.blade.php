@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Elegí de entre los siguientes talleres:</h3>

                    <table class="table table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Profesor</th>
                                <th>Sabado</th>
                                <th>Domingo</th>
                                <th>Lunes</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($talleres as $taller)
                                <tr>
                                    <td>
                                        {{ $taller->name }}
                                    </td>
                                    <td>
                                        {{ $taller->professor }}
                                    </td>
                                    <td style="border-left: 1px solid">
                                        @if($taller->day_one)
                                            X
                                        @endif
                                    </td>
                                    <td style="border-left: 1px solid">
                                        @if($taller->day_two)
                                            X
                                        @endif
                                    </td>
                                    <td style="border-left: 1px solid">
                                        @if($taller->day_three)
                                            X
                                        @endif
                                    </td>
                                    <td style="border-left: 1px solid">
                                        <span class="btn btn-primary btn-xs">
                                            <a href="/foo">Inscribirme</a>
                                        </span>
                                        <span class="btn btn-primary btn-xs">
                                            <a href="foo">Eliminar inscripción</a>
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
    <script>

    </script>
@endsection

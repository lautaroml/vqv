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
                                    <td>
                                        @if(in_array($taller->day_one, [6,7,8]))
                                            X
                                        @endif
                                    </td>
                                    <td>
                                        @if(in_array($taller->day_two, [6,7,8]))
                                            X
                                        @endif
                                    </td>
                                    <td>
                                        @if(in_array($taller->day_three, [6,7,8]))
                                            X
                                        @endif
                                    </td>
                                    <td>
                                        Inscribirse
                                        <br>
                                        Eliminar inscripción
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

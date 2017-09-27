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

                    @if(Session::has('message_success'))
                        <div class="alert alert-success alert-border-left alert-close alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>¡Éxito!</strong> {!! Session::get('message_success') !!}
                        </div>
                    @endif
                    @if(Session::has('message_error'))
                        <div class="alert alert-danger alert-border-left alert-close alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>¡Atención!</strong> {!! Session::get('message_error') !!}
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
                                        <a class="btn btn-primary btn-xs" href="inscripcion/subscribe/{{  $taller->id }}">Inscribirme</a>
                                        <a class="btn btn-primary btn-xs" href="inscripcion/remove/{{ $taller->id }}">Eliminar inscripción</a>
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

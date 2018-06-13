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

                    <h3 class="text-center">Elegí de entre los siguientes talleres:</h3>

                    <table class="table table-condensed table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Nombre</th>
                                <th>Profesor</th>
                                <th>Sáb 9 a 14</th>
                                <th>Sáb 14 a 16</th>
                                <th>Dom 9 a 14</th>
                                <th>Compatible con:</th>
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
                                        {{ implode(',', $taller->compatibilities->pluck('external_taller_id')->toArray()) }}
                                    </td>
                                    <td style="border-left: 1px solid">

                                        @if(auth()->user()->has($taller->id))
                                            <a class="btn btn-danger btn-xs" href="inscripcion/remove/{{ $taller->id }}">Eliminar inscripción</a>
                                        @else
                                            @if(! $taller->isFull())
                                                <a class="btn btn-primary btn-xs" href="inscripcion/subscribe/{{  $taller->id }}">Inscribirme</a>
                                            @else
                                                <span class="badge badge-secondary">Taller sin cupo.</span>
                                            @endif
                                        @endif


                                        {{--@if(! $taller->isFull())

                                        @else
                                            <span class="badge badge-secondary">Taller sin cupo.</span>
                                        @endif--}}
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
        $('.btn').click( function(){
            $('.btn').addClass( "disabled" );
        })
    </script>
@endsection

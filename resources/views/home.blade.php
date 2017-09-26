@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Panel</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Elegí de entre los siguientes talleres:</h3>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Profesor</th>
                                <th>Sabado</th>
                                <th>Domingo</th>
                                <th>Lunes</th>
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
                                        {{ $taller->day_one }}
                                    </td>
                                    <td>
                                        {{ $taller->day_two }}
                                    </td>
                                    <td>
                                        {{ $taller->day_three }}
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

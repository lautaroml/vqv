@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">

                    <h3 class="text-center">{{ $taller->name }}</h3>
                    <h5 class="text-center">{{ $taller->professor }}</h5>

                    <table class="table table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Documento</th>
                                <th>Email</th>
                                <th>Edad</th>
                                <th>Nacimiento</th>
                                <th>País</th>
                                <th>Provincia</th>
                                <th>Elenco</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($taller->users as $user)
                                <tr>
                                    <td>{{$user->first_name}}</td>
                                    <td>{{$user->last_name}}</td>
                                    <td>{{$user->document}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{explode($user->age)[2]}} / {{explode($user->age)[1]}} / {{explode($user->age)[0]}}</td>
                                    <td>{{$user->birthday}}</td>
                                    <td>{{$user->country_id}}</td>
                                    <td>{{$user->state_id}}</td>
                                    <td>{{$user->elenco}}</td>
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

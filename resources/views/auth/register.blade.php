@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registro de usuario</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="col-md-6">


                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <label for="first_name" class="col-md-4 control-label">Nombre</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <label for="last_name" class="col-md-4 control-label">Apellido</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required>

                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('document') ? ' has-error' : '' }}">
                                <label for="document" class="col-md-4 control-label">Documento</label>

                                <div class="col-md-6">
                                    <input id="document" type="text" class="form-control" name="document" value="{{ old('document') }}" required>

                                    @if ($errors->has('document'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('document') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }}">
                                <label for="age" class="col-md-4 control-label">Edad</label>

                                <div class="col-md-6">
                                    <input id="age" type="number" class="form-control" name="age" value="{{ old('age') }}" required>

                                    @if ($errors->has('age'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('age') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                                <label for="birthday" class="col-md-4 control-label">Fecha de nacimiento</label>

                                <div class="col-md-6">
                                    <input id="birthday" value="{{ old('birthday') }}" type="text" class="form-control" name="birthday" placeholder="dd/mm/aaaa" required pattern="\d{1,2}/\d{1,2}/\d{4}">

                                    @if ($errors->has('birthday'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                        </div>




                        <div class="col-md-6">


                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Contraseña</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Confirmar contraseña</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                                <label for="country" class="col-md-4 control-label">País </label>

                                <div class="col-md-6">
                                    <select name="country" id="country" class="form-control">
                                        <option value="">Elija una opción</option>
                                        @foreach($countries as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                                <label for="country" class="col-md-4 control-label">Provincia </label>

                                <div class="col-md-6">
                                    <select name="country" id="country" class="form-control" value="{{ old('country') }}">
                                        <option value="">Elija una opción</option>
                                        @foreach($states as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                            <option value="other">Otro</option>
                                    </select>
                                </div>
                            </div>





                            <div class="form-group{{ $errors->has('other') ? ' has-error' : '' }}" style="display: none">
                                <label for="other" class="col-md-4 control-label">Provincia</label>

                                <div class="col-md-6">
                                    <input id="other" value="{{ old('other') }}" type="text" class="form-control" name="other" value="{{ old('other') }}" >

                                    @if ($errors->has('other'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('other') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>




                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

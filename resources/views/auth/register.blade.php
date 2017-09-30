@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registro de usuario</div>

                <div class="panel-body">
                    <div class="row">
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





                                {{--<div class="form-group{{ $errors->has('elenco_bool') ? ' has-error' : '' }}">
                                    <label for="elenco_bool" class="col-md-4 control-label">¿Pertenece a un elenco que forma parte de este 9na Edición de VQV? </label>
                                    <div class="col-md-6">
                                        <select required name="elenco_bool" id="elenco_bool" class="form-control" value="{{ old('elenco_bool') }}">
                                            <option value="">Elija una opción</option>
                                            <option value="1">Si</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>--}}


                                <div id="elenco_container" class="form-group{{ $errors->has('elenco') ? ' has-error' : '' }}" {{--style="display: none;"--}}>
                                    <label for="elenco" class="col-md-4 control-label">¿Pertenece a un elenco que forma parte de este 9na Edición de VQV?</label>
                                    <div class="col-md-6">
                                        <select required name="elenco" id="elenco" class="form-control" value="{{ old('elenco') }}">
                                            <option value="">Elija una opción</option>
                                            <option value="0">No</option>
                                                <optgroup label="Si. ¿Cuál?">
                                                    @foreach($elencos as $id => $name)
                                                        <option value="{{ $id }}">{{ $name }}</option>
                                                    @endforeach
                                                </optgroup>
                                        </select>
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
                                        <select required name="country" id="country" class="form-control">
                                            <option value="">Elija una opción</option>
                                            @foreach($countries as $id => $name)
                                                <option value="{{ $id }}">{{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                                    <label for="state" class="col-md-4 control-label">Provincia </label>

                                    <div class="col-md-6">
                                        <select required name="state" id="state" class="form-control" value="{{ old('state') }}">
                                            <option value="">Elija una opción</option>
                                            @foreach($states as $id => $name)
                                                <option value="{{ $id }}">{{ $name }}</option>
                                            @endforeach
                                            <option value="other">Otro</option>
                                        </select>
                                    </div>
                                </div>


                                <div id="other_container" class="form-group{{ $errors->has('other') ? ' has-error' : '' }}" style="display: none">
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

                        </form>
                    </div>

                    <div class="form-group pull-right">
                        <div>
                            <button type="submit" class="btn btn-primary">
                                Confirmar
                            </button>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
    <script>
        $("#state").change(function(){
            if ($(this).val() == 'other') {
                $("#other_container").show();
            } else {
                $("#other_container").hide();
            }
        });

        /*$("#elenco_bool").change(function(){
            if ($(this).val() == 1) {
                $("#elenco_container").show();
            } else {
                $("#elenco_container").hide();
            }
        })*/
    </script>
@endsection

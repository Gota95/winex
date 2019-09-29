@extends('layouts.app')

@section('content')
    
        <div class="container-login100" style="background-color: #ECEFF1;">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54" style="padding-top: 20px;">
                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <div class="row justify-content-center" style="margin-top: 0;">
                        <div class="col-4 ofsset-4">
                            <img src="{{ asset('img/logo.png') }}" alt="logo" style="display:block; margin:auto; width: 100%;">
                        </div>
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Email requerido">
                        <span class="label-input100">Email</span>
                        <input class="input100" placeholder="Escriba su email" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Contraseña requerida">
                        <span class="label-input100">Contraseña</span>
                        <input class="input100" placeholder="Escriba su contraseña" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                    <div class="container-login100-form-btn" style="margin-top: 20px;">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" type="submit">
                                Iniciar Sesión
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    
    <div id="dropDownSelect1"></div>
@endsection
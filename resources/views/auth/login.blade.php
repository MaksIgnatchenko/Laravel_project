@extends('layouts.app')

@section('content')

    <div class="col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2 loginpage-wrapper">
        <div class="page-header">
            <h1>Login</h1>
        </div>

        <div class="row">
            <div class="col-sm-6 col-login-email">
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input class="form-control" type="email" name="email" placeholder="Email" value="" required>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </label>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary btn-lg" type="submit" style="min-width: 100px;">
                            Войти
                        </button>
                    </div>
                    <input type='hidden' name='csrfmiddlewaretoken' value='nWvVfQWhK1LeUef98KhlcYRhxgPS4nIPGS2z26NSg3LvNhvmbEfiOJYGjY8dgqSk' />
                </form>
            </div>

            <div class="col-sm-6 col-social-login">
                <form method="post">
                    <p><a class="btn btn-primary" href="#"><i class="icon-social-login icon-social-login__github">
                            </i>Войти через GitHub</a></p>
                    <p><a class="btn btn-primary" href="{!! URL::route('auth/google') !!}"><i class="icon-social-login icon-social-login__google">
                            </i>Войти через Google</a></p>
                    <p><a class="btn btn-primary" href="#"><i class="icon-social-login icon-social-login__facebook">
                            </i>Войти через Facebook</a></p>
                    <input type='hidden' name='csrfmiddlewaretoken' value='nWvVfQWhK1LeUef98KhlcYRhxgPS4nIPGS2z26NSg3LvNhvmbEfiOJYGjY8dgqSk' />
                </form>
            </div>
        </div>

        <br><br>

        <p><a href="{{ route('password.request') }}">Забыли пароль?</a></p>
        <p>Нет аккаунта? Войдите через соцсеть или <a href="{{ route('register') }}">зарегистрируйтесь</a>.</p>
    </div>


    {{--<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

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
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                                <a class="btn btn-primary" href="{!! URL::route('auth/google') !!}">
                                    Google
                                </a>
                                <a class="btn btn-link" href="{{ route('password.request') }}">Forgot Your Password?</a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>--}}

@endsection

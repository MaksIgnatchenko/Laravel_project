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
                        <div class="checkbox ">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> <p>Remember Me</p>
                        </div>
                    </div>
                    <div>
                        <button class="litel1" type="submit" style="min-width: 100px;">
                            <p>Войти</p>
                        </button>
                    </div>
                    <input type='hidden' name='csrfmiddlewaretoken' value='nWvVfQWhK1LeUef98KhlcYRhxgPS4nIPGS2z26NSg3LvNhvmbEfiOJYGjY8dgqSk' />
                </form>
            </div>

            <div class="col-sm-6 col-social-login">
                <form method="post">
                    <p class="litel1"><a href="#">Войти через Github<i class="fa fa-github" aria-hidden="true"></i></a></p>
                    <p class="litel1"><a href="{!! URL::route('auth/google') !!}">Войти через Google<i class="fa fa-google " aria-hidden="true"></i></a></p>
                    <p class="litel1"><a href="#">Войти через Facebook<i class="fa fa-facebook " aria-hidden="true"></i></a></p>
                    <input type='hidden' name='csrfmiddlewaretoken' value='nWvVfQWhK1LeUef98KhlcYRhxgPS4nIPGS2z26NSg3LvNhvmbEfiOJYGjY8dgqSk' />
                </form>
            </div>
        </div>

        <br><br>

        <p><a href="{{ route('password.request') }}">Забыли пароль?</a></p>
        <p>Нет аккаунта? Войдите через соцсеть или <a href="{{ route('register') }}">зарегистрируйтесь</a>.</p>
    </div>
@endsection

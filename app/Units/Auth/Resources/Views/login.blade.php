@extends('core::layout')

@section('content')
    <div class="container-fluid" id="login-form">
        <div class="row">

            <div class="col-md-6">
                <h3><i class="icon-user"></i> Entrar</h3>
            </div>

        </div>
        <hr>
        <div class="row">

            <div class="col-md-4 col-md-offset-2 text-right" style="padding-top: 30px">
                <h4>Para agilizar, você pode fazer login usando o serviço que desejar.</h4>
                <h4>Mas fique tranquilo, se desejar, você poderá alterar seus dados mais tarde.</h4>
            </div>
            <div class="col-md-4" style="border-left: 1px solid #ecf0f1">

                <a href="{{ route('auth.social.login', ['github']) }}" class="btn btn-block btn-social btn-github">
                    <span class="fa fa-github"></span> Login com Github
                </a>
                <a href="{{ route('auth.social.login', ['facebook']) }}" class="btn btn-block btn-social btn-facebook">
                    <span class="fa fa-facebook"></span> Login com Facebook
                </a>
                <a href="{{ route('auth.social.login', ['google']) }}" class="btn btn-block btn-social btn-google">
                    <span class="fa fa-google"></span> Login com Google
                </a>

            </div>

        </div>

    </div>
@endsection

<!DOCTYPE html>
<html lang="{{ app()->getLocale() or 'en' }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="CODECASTS">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

    <link rel="apple-touch-icon" sizes="57x57" href="/img/icons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/img/icons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/img/icons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/img/icons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/img/icons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/img/icons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/img/icons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/img/icons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/img/icons/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="/img/icons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/img/icons/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="/img/icons/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="/img/icons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/img/icons/manifest.json">
    <meta name="apple-mobile-web-app-title" content="CODECASTS">
    <meta name="application-name" content="CODECASTS">
    <meta name="msapplication-TileColor" content="#00aba9">
    <meta name="msapplication-TileImage" content="/img/icons/mstile-144x144.png">
    <meta name="theme-color" content="#ffffff">

    {!! app('seotools')->generate() !!}

    <!-- Token for JS -->
    <script>
        window.Laravel = {!!   json_encode([
                'csrfToken' => csrf_token(),
            ])
        !!}
    </script>

    <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
</head>
<body>
@include('core::_header.header')
<div class="container" style="min-height: 500px">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                @if(Session::has('_success'))
                    <div class="alert alert-success">
                        {{ Session::get('_success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="errors">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                @endif
            </div>
        </div>
        <div class="col-md-12">
            @yield('content')
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <hr>
            </div>

            <div class="col-md-12" style="margin-bottom:20px">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="footer-links">

                                    <li><a href="{{ route('support') }}"><i class="icon-support"></i> Suporte</a></li>
                                    <li><a href="{{ route('statistics') }}"><i class="icon-plane"></i> Estatísticas</a></li>
                                    @if($user && $user->admin)
                                        <li><a href="{{ route('panel.dashboard') }}"><i class="icon-lock"></i> Administração</a></li>
                                    @endif
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="footer-links">
                                    <li><a href="#"><i class="icon-question"></i> Perguntas Frequentes</a></li>
                                    <li><a href="{{ route('policy') }}"><i class="icon-doc"></i> Política de Uso</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-2 text-center">
                        &nbsp;
                    </div>
                    <div class="col-m4 text-right">
                        &nbsp;&nbsp;
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<script src="{{ elixir('js/vendor.js') }}"></script>
<script src="{{ elixir('js/app.js') }}"></script>
@include('core::_sentry')
@include('core::_analytics')
@include('core::_crisp')
</body>
</html>

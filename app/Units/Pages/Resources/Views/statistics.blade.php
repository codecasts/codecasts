@extends('core::layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <h3><i class="icon-speedometer"></i> Estatísticas</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <hr>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">Número de Aulas</div>
                            <div class="panel-body text-center">
                                <h1>{{ $lessons_count }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">Aulas Publicas em Horas</div>
                            <div class="panel-body text-center">
                                <h1>{{ $lessons_time }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">Séries Publicadas</div>
                            <div class="panel-body text-center">
                                <h1>{{ $series }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">Versão da Plataforma</div>
                            <div class="panel-body text-center">
                                <h1>{{ $app_version }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">Versão do Laravel</div>
                            <div class="panel-body text-center">
                                <h1>{{ $laravel_version }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">Versão do PHP</div>
                            <div class="panel-body text-center">
                                <h1>{{ $php_version }}</h1>
                            </div>
                        </div>
                    </div>
                </div>



            </div>

        </div>
    </div>
@endsection

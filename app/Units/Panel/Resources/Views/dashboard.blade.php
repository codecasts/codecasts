@extends('panel::layout')

@section('panel-title')
    <h3><i class="icon-speedometer"></i> Dashboard</h3>
@endsection

@section('panel-actions')

@endsection

@section('panel-content')
    <div class="row">
        <div class="col-md-3">

            <div class="panel panel-default">
                <div class="panel-heading">Usuários</div>
                <div class="panel-body text-center">
                    <h1>{{ $users }}</h1>
                </div>
            </div>

        </div>
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Aulas</div>
                <div class="panel-body text-center">
                    <h1>{{ $lessons_count }}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Aulas em Horas</div>
                <div class="panel-body text-center">
                    <h1>{{ $lessons_time }}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Séries</div>
                <div class="panel-body text-center">
                    <h1>{{ $series }}</h1>
                </div>
            </div>
        </div>


    </div>
@endsection


@section('panel-pagination')

@endsection


@extends('panel::layout')

@section('panel-title')
    <h3><i class="icon-control-play"></i> Nova Aula</h3>
@endsection


@section('panel-content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            {!! app()->form->open(['url'=>route('panel.lesson.store'), 'method'=>'POST']) !!}

            @include('panel::lesson.form')

            <div class="form-group row">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check fa-fw"></i> Cadastrar</button>
                    <a href="{{ route('panel.lesson.index') }}" class="btn btn-default"><i class="fa fa-arrow-left fa-fw"></i> Cancelar</a>
                </div>
            </div>

            {!! app()->form->close() !!}
        </div>
    </div>


@endsection

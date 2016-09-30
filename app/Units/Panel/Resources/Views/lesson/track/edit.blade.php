@extends('panel::layout')

@section('panel-title')
    <h3><i class="icon-layers"></i> Editar Série</h3>
@endsection


@section('panel-content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            {!! app()->form->model($track, ['url'=>route('panel.lesson.track.update', $track->id), 'method'=>'PUT']) !!}

            @include('panel::lesson.track.form')

            <div class="form-group row">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check fa-fw"></i> Atualizar</button>
                    <a href="{{ route('panel.lesson.track.index') }}" class="btn btn-default"><i class="fa fa-arrow-left fa-fw"></i> Cancelar</a>
                </div>
            </div>

            {!! app()->form->close() !!}
        </div>
    </div>


@endsection

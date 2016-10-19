@extends('panel::layout')

@section('panel-title')
    <h3><i class="icon-layers"></i> Séries</h3>
@endsection

@section('panel-actions')
    <a href="{{ route('panel.lesson.serie.create') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Nova Série</a>
@endsection

@section('panel-content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Série</th>
                <th>Visível</th>
                <th>Aulas</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($series as $serie)
                <tr>
                    <td>{{ $serie->id }}</td>
                    <td>{{ $serie->title }}</td>
                    <td>{{ $serie->visible ? 'Sim':'Não' }}</td>
                    <td>{{ $serie->lessonCount() }}</td>
                    <td class="text-right">
                        <form role="form" class="form-sm form-horizontal" method="post" action="{{ route('panel.lesson.serie.destroy', [$serie->id]) }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="DELETE">
                            <a href="{{ route('panel.lesson.serie.edit', [$serie->id]) }}" class="btn btn-xs btn-primary">Editar</a>
                            <button class="btn btn-danger btn-xs" type="submit">Remover</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection


@section('panel-pagination')
    {!! $series->render() !!}
@endsection


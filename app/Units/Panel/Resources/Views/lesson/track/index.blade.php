@extends('panel::layout')

@section('panel-title')
    <h3><i class="icon-layers"></i> Séries</h3>
@endsection

@section('panel-actions')
    <a href="{{ route('panel.lesson.track.create') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Nova Série</a>
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
            @foreach($tracks as $track)
                <tr>
                    <td>{{ $track->id }}</td>
                    <td>{{ $track->title }}</td>
                    <td>{{ $track->visible ? 'Sim':'Não' }}</td>
                    <td>{{ $track->lessonCount() }}</td>
                    <td class="text-right">
                        <form role="form" class="form-sm form-horizontal" method="post" action="{{ route('panel.lesson.track.destroy', [$track->id]) }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="DELETE">
                            <a href="{{ route('panel.lesson.track.edit', [$track->id]) }}" class="btn btn-xs btn-primary">Editar</a>
                            <button class="btn btn-danger btn-xs" type="submit">Remover</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection


@section('panel-pagination')
    {!! $tracks->render() !!}
@endsection


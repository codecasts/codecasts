@extends('panel::layout')

@section('panel-title')
    <h3><i class="icon-control-play"></i> Aulas</h3>
@endsection

@section('panel-actions')
    <a href="{{ route('panel.lesson.create') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i>  Nova Aula</a>
@endsection

@section('panel-content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Aula</th>
                <th>Author</th>
                <th>Visivel</th>
                <th>Publicada</th>
                <th>Paga</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lessons as $lesson)
                <tr>
                    <td>{{ $lesson->id }}</td>
                    <td>
                        <strong>{{ $lesson->title }}</strong>
                        @if($lesson->serie)
                            <div class="small">{{ $lesson->serie->title }}</div>
                        @endif
                    </td>
                    <td>{{ "@".$lesson->author->username }}</td>
                    <td>{{ $lesson->published ? 'Sim' : 'Não' }}</td>
                    <td>{{ $lesson->visible ? 'Sim' : 'Não' }}</td>
                    <td>{{ $lesson->paid ? 'Sim' : 'Não' }}</td>
                    <td class="text-right">
                        <form role="form" class="form-sm form-horizontal" method="post" action="{{ route('panel.lesson.destroy', [$lesson->id]) }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="DELETE">
                            <a href="{{ route('panel.lesson.edit', [$lesson->id]) }}" class="btn btn-xs btn-primary">Editar</a>
                            <button class="btn btn-danger btn-xs" type="submit">Remover</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection


@section('panel-pagination')
    {!! $lessons->render() !!}
@endsection


@extends('core::layout')

@section('content')
    <div class="container-fluid" id="suggestion-index">
        <div class="row">
            @if($user)
            <div class="col-md-6">
                <h3><i class="icon-directions"></i> Sugestões</h3>
            </div>
            <div class="col-md-6 text-right" style="padding-top: 15px">
                <a href="javascript:;" class="btn btn-sm btn-success btn-add-suggestion">
                    <i class="fa fa-plus"></i> Enviar Sugestão
                </a>
            </div>

            <div class="col-md-12 form-suggestion" style="display: none;" >

                <hr>
                <h4>Sugerir screencast:</h4>


                <form role="form" class="form" method="post" action="{{ route('suggestion.index') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <input name="suggestion" class="form-control" placeholder="Sua Sugestão...">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Enviar</button>
                        <a href="javascript:;" class="btn btn-sm btn-danger btn-cancel-suggestion"><i class="fa fa-close"></i> Cancelar</a>
                    </div>

                </form>
            </div>
            @else
                <div class="col-md-12">
                    <h3><i class="icon-directions"></i> Sugestões</h3>
                </div>
            @endif
            </div>
                <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive pull-left" style="width: 100%;">
                    @if($user)
                    <div class="load-votes text-info" style="display: none;" data-url="{{ route('suggestion.votes.user') }}">
                        <i class="icon-refresh spin"></i> Carregando seus votos...
                        <!-- /.icon-refresh -->
                    </div>
                    <!-- /.load-votes -->
                    @endif
                    <table class="table table-hover">
                        <thead>
                        <tr>

                            <th>SUGESTÃO</th>
                            <th class="text-center">
                                <i class="icon-user"></i>
                            </th>
                            <th class="">
                                CODECASTER
                            </th>
                            <th style="width: 40px;">VOTOS</th>
                            <th style="width: 150px;" class="text-right">STATUS</th>
                        </tr>
                        </thead>
                        <tbody style="">
                        @foreach($suggestions as $suggestion)
                            <tr class="unread {{ ($user) ? 'suggestion-row' : null }} suggestion-{{ $suggestion->id }}" data-id="{{ $suggestion->id }}">

                                <td style="vertical-align: middle;">
                                    {{ $suggestion->title}}
                                </td>
                                <td style="width: 26px;">
                                <span class="avatar">
                                    <img src="{{ $suggestion->user->getAvatarUrl(30) }}"
                                         style="width:30px;" class="img-circle"
                                         alt="{{ $suggestion->user->username }}"
                                         title="{{ $suggestion->user->username }}">
                                </span>

                                </td>
                                <td style="vertical-align: middle;">
                                    {{ '@'.$suggestion->user->username }}
                                </td>
                                <td style="vertical-align: middle;" class="suggestion-votes-count" data-url="{{ route('suggestion.sync', $suggestion->id) }}">
                                    <i class="_iconVote icon-like"></i> <span>{{ $suggestion->votes()->count() }}</span>
                                </td>
                                <td class="text-right" style="vertical-align: middle;">
                                    @if($suggestion->released)
                                        <label class="label label-success">ATENDIDA</label>
                                    @elseif($suggestion->accepted)
                                        <label class="label label-warning">PRODUÇÃO</label>
                                    @else
                                        <label class="label label-default">EM ANÁLISE</label>
                                    @endif
                                </td>


                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-right">

                {!! $suggestions->render() !!}


            </div>


        </div>

    </div>

    @if($user)
    <style>
        .suggestion-votes-count{ cursor: pointer; }
    </style>
    @endif
@endsection

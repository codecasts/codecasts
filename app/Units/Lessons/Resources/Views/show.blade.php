@extends('core::layout')

@section('content')

<div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <h3><i class="icon-control-play"></i> {{ $lesson->title }}</h3>
                    </div>
                    <div class="col-md-6 text-right">
                        @if($lesson->serie)
                            <h3><i class="icon-layers"></i> {{ $lesson->serie->title }}</h3>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <hr>
            </div>



            <div class="col-md-9">

                @if($user && $user->subscribed())
                    @include('lessons::player.default')
                @elseif($user && !$user->subscribed() && !$lesson->paid)
                    @include('lessons::player.default')
                @elseif($user && !$user->subscribed() && $lesson->paid)
                    @include('lessons::player.inactive')
                @else
                    @include('lessons::player.guest')
                @endif

                    <div class="panel panel-default text-justify">
                        <div class="panel-body">
                            {{ $lesson->description}}
                            {{--
                            @if(count($lesson->tags))
                                @foreach($lesson->tags as $tag)
                                    <div class="label-group nerd-stat">
                                        <span class="label label-primary"><i class="fa fa-tag"></i></span><span class="label label-primary">{{ $tag->tag }}</span>
                                    </div>
                                @endforeach
                            @endif
                            --}}

                        </div>
                    </div>

            </div>

            <div class="col-md-3 text-justify">
                    <div class="row">
                        <div class="col-md-12">
                            @if($user && ($user->subscribed() || !$lesson->paid))
                                <a href="{{ $lesson->download_url }}" target="_blank" class="btn btn-primary btn-block"><b><i style="font-weight: 700" class="icon-cloud-download"></i> Download</b></a>
                            @else
                                <a class="btn btn-primary btn-block"><b><i style="font-weight: 700" class="icon-cloud-download"></i> Download</b></a>
                            @endif
                        </div>

                    </div>

                    <div class="panel panel-default" style="padding-left: 0px; padding-right: 0px; margin-top: 15px;">
                        <div class="panel-body text-center">
                            <button class="btn btn-sm btn-social-icon btn-facebook" data-share data-share-facebook data-share-facebook-url="{{ Request::url() }}">
                                <i class="fa fa-facebook"></i>
                            </button>
                            <button class="btn btn-sm btn-social-icon btn-twitter" data-share data-share-twitter data-share-twitter-title="{{ $lesson->title }}" data-share-twitter-via="code_casts" data-share-twitter-url="{{ Request::url() }}">
                                <i class="fa fa-twitter"></i>
                            </button>
                            <button class="btn btn-sm btn-social-icon btn-google" data-share data-share-google data-share-google-url="{{ Request::url() }}">
                                <i class="fa fa-google-plus"></i>
                            </button>
                        </div>

                    </div>

                    <div class="panel panel-default" style="padding-left: 0px; padding-right: 0px">

                        <table class="table">
                            <tbody>
                            <tr>
                                <td style="width: 20px;"><i class="fa fa-clock-o"></i></td>
                                <td class="text-right">{{ $lesson->present()->length }}</td>
                            </tr>
                            <tr>
                                <td><i class="icon-puzzle"></i></td>
                                <td class="text-right">{{ $lesson->present()->level }}</td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-calendar"></i></td>
                                <td class="text-right">{{ $lesson->published_at->format('d/m/Y') }}</td>
                            </tr>
                            </tbody>

                        </table>
                    </div>
                    @if($lesson->author)
                    <div class="panel panel-default text-center">
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <h5>CODECASTER</h5>
                                    <a href="{{$lesson->author->url}}" target="_blank">
                                        <img src="{{$lesson->author->avatar}}" style="width: 50px; border-radius: 25px;">
                                        <h4 style="vertical-align: middle">
                                            <i class="fa fa-github"></i> {{ $lesson->author->username }}
                                        </h4>
                                    </a>
                                </div>

                            </div>


                        </div>
                    </div>
                    @endif

                </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                &nbsp;
            </div>
        </div>
        @if($lesson->serie)
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4><strong><i class="icon-layers"></i> {{ $lesson->serie->title }}</strong></h4>
                        <table class="table">

                            <tbody>
                            @foreach($lesson->serie->lessons()->where('published', true)->orderBy('published_at')->get() as $serie_lesson)
                                <tr>
                                    <td>
                                        <a href="{{ route('lesson.show', [$serie_lesson->slug]) }}">
                                            @if($lesson->id == $serie_lesson->id)
                                                <strong>
                                                    <i class="icon-control-play"></i> [{{ mb_strtoupper(trans('lesson::lesson.current')) }}] {{ $serie_lesson->title }}
                                                    @if(!$serie_lesson->paid)
                                                        <small class="label label-success lesson-paid">FREE</small>
                                                    @endif
                                                </strong>
                                            @else
                                                <i class="icon-control-play"></i> {{ $serie_lesson->title }}
                                                @if(!$serie_lesson->paid)
                                                    <small class="label label-success lesson-paid">FREE</small>
                                                @endif
                                            @endif
                                        </a>
                                    </td>
                                    <td class="text-right">
                                        <small>{{ $serie_lesson->present()->length() }} <i class="fa fa-clock-o"></i></small>
                                        </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {!! \Codecasts\Support\Comments\Disqus::display('l'.$lesson->id, $lesson->title) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@extends('core::layout')

@section('content')

<div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <h3><i class="icon-playlist"></i> {{ $podcast->title }}</h3>
                    </div>
                    <div class="col-md-6 text-right">

                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <hr>
            </div>



            <div class="col-md-9">


                @if($user)
                    @include('podcasts::player.default')
                @else
                    @include('podcasts::player.guest')
                @endif

                    <div class="panel panel-default text-justify">
                        <div class="panel-body">
                            {{ $podcast->description }}

                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Participantes
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                @foreach($podcast->authors() as $author)
                                    <div class="col-md-2">
                                        <div class="row text-center">
                                            <div class="col-md-12">
                                                <a href="{{$author->url}}" target="_blank">
                                                    <img src="{{$author->avatar}}" style="width: 50px; border-radius: 25px;">

                                                </a>
                                            </div>
                                            <div class="col-md-12">
                                                <a href="{{$author->url}}" target="_blank">

                                                    <i class="fa fa-github"></i> {{ $author->username }}

                                                </a>
                                            </div>
                                        </div>

                                    </div>

                                @endforeach
                            </div>





                        </div>
                    </div>

            </div>

            <div class="col-md-3 text-justify">
                    <div class="row">
                        <div class="col-md-12">
                            @if($user)
                                <a href="{{ $podcast->download_url }}" target="_blank" class="btn btn-primary btn-block"><b><i style="font-weight: 700" class="icon-cloud-download"></i> Download</b></a>
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
                            <button class="btn btn-sm btn-social-icon btn-twitter" data-share data-share-twitter data-share-twitter-title="Podcast: {{ $podcast->title }}" data-share-twitter-via="code_casts" data-share-twitter-url="{{ Request::url() }}">
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
                                <td class="text-right">{{ $podcast->present()->length }}</td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-calendar"></i></td>
                                <td class="text-right">{{ $podcast->published_at->format('d/m/Y') }}</td>
                            </tr>
                            </tbody>

                        </table>
                    </div>


                </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                &nbsp;
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {!! \Codecasts\Support\Comments\Disqus::display('p_'.$podcast->id, $podcast->title) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

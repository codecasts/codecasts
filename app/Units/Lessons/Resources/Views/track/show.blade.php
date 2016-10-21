@extends('core::layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h3><i class="icon-layers"></i> {{ $track->title }}</h3>
            </div>
            <div class="col-md-4 text-right" style="padding-top: 20px;">

                    <button class="btn btn-sm btn-social-icon btn-facebook" data-share data-share-facebook data-share-facebook-url="{{ Request::url() }}">
                        <i class="fa fa-facebook"></i>
                    </button>
                    <button class="btn btn-sm btn-social-icon btn-twitter" data-share data-share-twitter data-share-twitter-title="{{ 'Série ' . $track->title }} - CODECASTS" data-share-twitter-via="code_casts" data-share-twitter-url="{{ Request::url() }}">
                        <i class="fa fa-twitter"></i>
                    </button>
                    <button class="btn btn-sm btn-social-icon btn-google" data-share data-share-google data-share-google-url="{{ Request::url() }}">
                        <i class="fa fa-google-plus"></i>
                    </button>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="well">
                    {{ $track->description }}
                </div>

            </div>
            <div class="col-md-12">
                <table class="table">

                    <tbody>
                    @foreach($track->lessons()->orderBy('published_at')->get() as $lesson)
                        <tr>
                            <td>
                                <a href="{{ route('lesson.show', [$lesson->slug]) }}">

                                    <i class="icon-control-play"></i> <strong>{{ $lesson->title }}</strong>

                                </a>
                            </td>
                            <td style="text-align: right">
                                @if(!$lesson->paid)
                                    <small class="label label-success lesson-paid">FREE</small>
                                @endif
                            </td>
                            <td class="text-right">
                                <small>{{ $lesson->present()->length() }} <i class="fa fa-clock-o"></i></small>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection

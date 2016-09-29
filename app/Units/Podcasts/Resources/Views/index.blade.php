@extends('core::layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <h3><i class="icon-playlist"></i> Podcasts</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th><i class="icon-playlist"></i></th>
                    <th><i class="icon-clock"></i></th>
                    <th class="text-right"><i class="icon-calendar"></i></th>
                </tr>
                </thead>
                @foreach($podcasts as $podcast)
                    <tr>
                        <td style="font-weight: bold;">
                            <a href="{{ route('podcast.show', [$podcast->slug]) }}">{{ $podcast->title }}</a>
                        </td>
                        <td>{{ $podcast->present()->length() }}</td>
                        <td class="text-right">{{ $podcast->published_at->diffForHumans() }}</td>
                    </tr>
                @endforeach
            </table>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12 text-right">
            {!! $podcasts->render() !!}
        </div>
    </div>
</div>

@endsection

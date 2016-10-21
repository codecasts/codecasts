@extends('core::layout')

@section('content')
    <div class="container-fluid" id="track-index">
        <div class="row">
            <div class="col-md-6">
                <h3><i class="icon-layers"></i> Séries</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <hr>
            </div>
        </div>
        <div class="row">
            @foreach($tracks as $track)
                @if($track->lessons()->count())
                    <div class="col-md-4 col-sm-6">
                        @include('lessons::track.box')
                    </div>
                @endif
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12 text-right">
                {!! $tracks->render() !!}
            </div>
        </div>
    </div>
@endsection

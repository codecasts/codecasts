@extends('core::layout')

@section('content')
    <div class="container-fluid" id="serie-index">
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
            @foreach($series as $serie)
                @if($serie->lessons()->count())
                    <div class="col-md-4 col-sm-6">
                        @include('lessons::serie.box')
                    </div>
                @endif
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12 text-right">
                {!! $series->render() !!}
            </div>
        </div>
    </div>
@endsection

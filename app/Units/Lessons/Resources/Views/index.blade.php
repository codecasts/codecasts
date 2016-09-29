@extends('core::layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <h3><i class="icon-control-play"></i> Aulas</h3>
        </div>
        <div class="col-md-8">
          <lessons-search base-url="{{ url('') }}" src="{{ route('lesson.search') }}"></lessons-search>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <hr>
        </div>
    </div>
    <div class="row">
        @foreach($lessons as $lesson)
            <div class="col-md-4 col-sm-6">
                @include('lessons::lesson.box')
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-md-12 text-right">
            {!! $lessons->render() !!}
        </div>
    </div>
</div>

@endsection

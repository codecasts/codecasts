@extends('core::layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            @yield('panel-title')
        </div>
        <div class="col-md-6 text-right" style="padding-top: 15px;">
            @yield('panel-actions')
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="{{ Request::is('panel/dashboard*') ? 'active':'' }}">
                            <a href="{{ route('panel.dashboard') }}"><i class="icon-speedometer"></i> Dashboard</a>
                        </li>
                        <li class="{{ Request::is('panel/lesson/track*') ? 'active':'' }}">
                            <a href="{{ route('panel.lesson.track.index') }}"><i class="icon-layers"></i> Séries</a>
                        </li>
                        <li class="{{ (!Request::is('panel/lesson/track*') and Request::is('panel/lesson*')) ? 'active':'' }}">
                            <a href="{{ route('panel.lesson.index') }}"><i class="icon-control-play"></i> Aulas</a>
                        </li>
                        <li class="{{ Request::is('panel/suggestion*') ? 'active':'' }}">
                            <a href="#"><i class="icon-directions"></i> Sugestões</a>
                        </li>
                        <li class="{{ Request::is('panel/cache-clear*') ? 'active':'' }}">
                            <a href="{{ route('panel.cache.clear') }}"><i class="icon-grid"></i> Limpar Cache</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-10">
                    @yield('panel-content')
                </div>
            </div>

        </div>

    </div>
    <div class="row">
        <div class="col-md-12 text-right">
            @yield('panel-pagination')
        </div>
    </div>
</div>

@endsection

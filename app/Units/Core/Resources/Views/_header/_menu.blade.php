<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">

        <li class="{{ (!Request::is('lesson/track*') and Request::is('lesson*')) ? 'active':'' }}">
            <a href="{{ route('lesson.index') }}"><i class="icon-control-play"></i> {{ ucfirst(trans('core::menu.lessons')) }}</a>
        </li>
        <li class="{{ Request::is('series*') ? 'active':'' }}">
            <a href="{{ route('lesson.track.index') }}"><i class="icon-layers"></i> {{ ucfirst(trans('core::menu.track')) }}</a>
        </li>
        <li class="{{ Request::is('podcast*') ? 'active':'' }}">
            <a href="{{ route('podcast.index') }}"><i class="icon-playlist"></i> {{ ucfirst(trans('core::menu.podcast')) }}</a>
        </li>
        <li class="{{ Request::is('suggestion*') ? 'active':'' }}">
            <a href="{{ route('suggestion.index') }}"><i class="icon-directions"></i> {{ ucfirst(trans('core::menu.suggestions')) }}</a>
        </li>
        <li class="">
            <a href="https://forum.codecasts.com.br" target="_blank"><i class="icon-bubbles"></i> {{ ucfirst(trans('core::menu.forum')) }}</a>
        </li>

        @if($user)

        <li class="{{ Request::is('settings/subscription*') ? 'active':'' }}">
            <a href="{{ route('subscription.index') }}"><i class="icon-credit-card"></i> {{ ucfirst(trans('core::menu.subscription')) }}</a>
        </li>

        @endif

    </ul>
    <ul class="nav navbar-nav navbar-right">

        @if($user)
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                <img src="{{ $user->getAvatarUrl(30) }}" class="profile-image" alt="">{{ $user->username }}<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li>
                    <a href="{{ route('profile.edit') }}">
                        <i class="fa fa-user"></i>
                        Perfil
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="/auth/logout">
                        <i class="fa fa-sign-out"></i>
                        &nbsp;&nbsp;{{ ucfirst(trans('core::menu.logout')) }}
                    </a>
                </li>
            </ul>
        </li>
        @else
            <li>
                <a href="{{ route('auth.login') }}">
                    <i class="icon-user"></i>
                    <span >&nbsp;{{ ucfirst(trans('core::menu.login')) }}</span>
                </a>
            </li>
        @endif

    </ul>
</div>

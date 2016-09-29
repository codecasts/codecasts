<a class="lesson-box" href="{{ route('podcast.show', $podcast->slug)}}">
    <header>
        <h2><i class="icon-control-play"></i> {{ $podcast->title }} </h2>
        <div class="lesson-desc">{{ str_limit($podcast->description, 300) }}</div>
    </header>
    <footer>
        <div class="lesson-post-title">
            <small class="lesson-length"><i class="fa fa-clock-o"></i> {{ $podcast->present()->length() }}</small>
            <small class="lesson-date">{{ $podcast->created_at->diffForHumans() }} <i class="fa fa-calendar"></i></small>
        </div>
    </footer>
</a>
<!-- /.lesson-box -->

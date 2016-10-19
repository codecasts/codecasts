<a class="lesson-box" href="{{ route('lesson.show', $lesson->slug)}}">
    <header>
        <h2><i class="icon-control-play"></i> {{ $lesson->title }} </h2>

        <div class="lesson-pre-title">

            <small class="label label-default lesson-level">{{ $lesson->present()->level() }}</small>
            @if(!$lesson->paid)
                <small class="label label-success lesson-paid">FREE</small>
            @endif
        </div>
        <div class="lesson-desc">{{ str_limit($lesson->description, 100) }}</div>
        @if($lesson->serie)
            <div class="lesson-serie text-right"><i class="icon-layers"></i> {{ $lesson->serie->title }}</div>
        @endif
    </header>
    <footer>
        <div class="lesson-post-title">
            <small class="lesson-length"><i class="fa fa-clock-o"></i> {{ $lesson->present()->length() }}</small>
            <small class="lesson-date">{{ $lesson->created_at->diffForHumans() }} <i class="fa fa-calendar"></i></small>
        </div>
    </footer>
</a>
<!-- /.lesson-box -->

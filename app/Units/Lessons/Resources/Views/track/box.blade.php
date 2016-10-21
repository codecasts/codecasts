<a class="lesson-box" href="{{ route('track.show', $track->slug ) }}">
    <header>
        <h2 class="track-title"><i class="icon-layers"></i> {{ $track->title }} </h2>
        <div class="lesson-desc">{{ $track->description }}</div>
    </header>
    <footer>
        <div class="lesson-post-title">
            <small class="lesson-length"><i class="fa fa-clock-o"></i> {{ $track->present()->length() }} em {{ $track->lessonCount() }} Lições</small>
            <small class="lesson-date">{{ $track->lastLessonPublished() }} <i class="fa fa-calendar"></i></small>
        </div>
    </footer>
</a>
<a class="lesson-box" href="{{ route('serie.show', $serie->slug ) }}">
    <header>
        <h2 class="serie-title"><i class="icon-layers"></i> {{ $serie->title }} </h2>
        <div class="lesson-desc">{{ $serie->description }}</div>
    </header>
    <footer>
        <div class="lesson-post-title">
            <small class="lesson-length"><i class="fa fa-clock-o"></i> {{ $serie->present()->length() }} em {{ $serie->lessonCount() }} Lições</small>
            <small class="lesson-date">{{ $serie->lastLessonPublished() }} <i class="fa fa-calendar"></i></small>
        </div>
    </footer>
</a>
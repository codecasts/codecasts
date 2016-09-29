<div class="panel panel-default">
    <div class="panel-heading">
        <a href="{{ route('lesson.show', $lesson->slug)}}">
            @if(!$lesson->paid)
                <small class="label label-success">FREE</small>
            @endif
            <h2>{{ $lesson->title }}</h2>
        </a>
    </div>

    <div class="panel-body text-justify">
        {{ $lesson->description }}
    </div>

    <div class="panel-footer">
        <div class="row">
            <div class="col-md-4 text-left">
                <i class="fa fa-calendar"></i>
                <small> {{ $lesson->created_at->format('d/m/y') }}</small>
            </div>
            <div class="col-md-4 text-center">
                <small class="lesson-level" style="border-bottom-color: {{ $lesson->level_color}}">
                    {{ $lesson->level}}
                </small>
            </div>
            <div class="col-md-4 text-right">
                <i class="fa fa-clock-o"></i>
                <small> {{ $lesson->length }}</small>
            </div>
        </div>
    </div>
</div>
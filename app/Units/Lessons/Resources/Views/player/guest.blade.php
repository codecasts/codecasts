<div class="videocontent  embed-responsive embed-responsive-16by9">
    <figure>
        <img src="{{ asset('/img/app/bg-video.jpg') }}" class="img-responsive"/>
        @if($lesson->paid)
            <figcaption class="alert-danger">
                Você precisa estar logado.
            </figcaption>
        @else
            <figcaption class="alert-danger">
                Para ter acesso, faça login.
            </figcaption>
        @endif
    </figure>
</div>
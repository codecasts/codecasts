<div class="form-group @hasErrorClass('title')">
    {!! app()->form->label('title', 'Nome') !!}
    {!! app()->form->text('title', null, ['class' => 'form-control', 'placeholder' => 'Nome da aula...']) !!}
    @errorBlock('title')
</div>

<div class="form-group @hasErrorClass('serie_id')">
    {!! app()->form->label('serie_id', 'Série') !!}
    {!! app()->form->select('serie_id', $series->pluck('title', 'id'), (isset($lesson) && $lesson) ? $lesson->serie_id: null, ['class' => 'form-control']) !!}
    @errorBlock('serie_id')
</div>

<div class="form-group @hasErrorClass('author_id')">
    {!! app()->form->label('author_id', 'Autor') !!}
    {!! app()->form->select('author_id', $users->pluck('username', 'id'), (isset($lesson) && $lesson) ? $lesson->author_id: null, ['class' => 'form-control']) !!}
    @errorBlock('author_id')
</div>

<div class="form-group @hasErrorClass('slug')">
    {!! app()->form->label('slug', 'Slug (Auto se em branco)') !!}
    {!! app()->form->text('slug', null, ['class' => 'form-control', 'placeholder' => 'nome-da-aula..']) !!}
    @errorBlock('slug')
</div>

<div class="form-group @hasErrorClass('description')">
    {!! app()->form->label('description', 'Descrição') !!}
    {!! app()->form->text('description', null, ['class' => 'form-control', 'placeholder' => 'Descrição curta...']) !!}
    @errorBlock('description')
</div>

<div class="form-group @hasErrorClass('video')">
    {!! app()->form->label('video', 'Video') !!}
    {!! app()->form->text('video', null, ['class' => 'form-control', 'placeholder' => 'Vimeo ID...']) !!}
    @errorBlock('video')
</div>

<div class="form-group @hasErrorClass('length')">
    {!! app()->form->label('length', 'Duração (segundos)') !!}
    {!! app()->form->text('length', null, ['class' => 'form-control', 'placeholder' => '738']) !!}
    @errorBlock('length')
</div>

<div class="form-group @hasErrorClass('visible')">
    {!! app()->form->label('visible', 'Visivel') !!}
    {!! app()->form->select('visible', [0 => 'Não', 1 => 'Sim'], (isset($lesson) && $lesson && $lesson->visible), ['class' => 'form-control']) !!}
    @errorBlock('visible')
</div>

<div class="form-group @hasErrorClass('paid')">
    {!! app()->form->label('paid', 'Paga') !!}
    {!! app()->form->select('paid', [0 => 'Não', 1 => 'Sim'], (isset($lesson) && $lesson && $lesson->paid), ['class' => 'form-control']) !!}
    @errorBlock('paid')
</div>

<div class="form-group @hasErrorClass('published')">
    {!! app()->form->label('published', 'Publicada') !!}
    {!! app()->form->select('published', [0 => 'Não', 1 => 'Sim'], (isset($lesson) && $lesson && $lesson->published), ['class' => 'form-control']) !!}
    @errorBlock('published')
</div>

<div class="form-group @hasErrorClass('level')">
    {!! app()->form->label('level', 'Nível') !!}
    {!! app()->form->select('level', ['b' => 'Básico', 'i' => 'Intermediário', 'a' => 'Avançado'], (isset($lesson) && $lesson) ? $lesson->level: null, ['class' => 'form-control']) !!}
    @errorBlock('level')
</div>

<div class="form-group @hasErrorClass('published_at')">
    {!! app()->form->label('published_at', 'Publicado em (agora caso em branco)') !!}
    {!! app()->form->text('published_at', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
    @errorBlock('published_at')
</div>


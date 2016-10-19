<div class="form-group @hasErrorClass('title')">
    {!! app()->form->label('title', 'Nome') !!}
    {!! app()->form->text('title', null, ['class' => 'form-control', 'placeholder' => 'Nome da série...']) !!}
    @errorBlock('title')
</div>

<div class="form-group @hasErrorClass('slug')">
    {!! app()->form->label('slug', 'Slug (Auto se em branco)') !!}
    {!! app()->form->text('slug', null, ['class' => 'form-control', 'placeholder' => 'nome-da-serie..']) !!}
    @errorBlock('slug')
</div>

<div class="form-group @hasErrorClass('description')">
    {!! app()->form->label('description', 'Descrição') !!}
    {!! app()->form->text('description', null, ['class' => 'form-control', 'placeholder' => 'Descrição curta...']) !!}
    @errorBlock('description')
</div>

<div class="form-group @hasErrorClass('visible')">
    {!! app()->form->label('visible', 'Visivel') !!}

    {!! app()->form->select('visible', [0 => 'Não', 1 => 'Sim'], (isset($serie) && $serie && $serie->visible), ['class' => 'form-control']) !!}
    @errorBlock('visible')
</div>
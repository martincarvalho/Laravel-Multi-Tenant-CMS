<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="title">Título</label>
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">

        <div class="form-group">
            <label for="has_title">Título</label>
            {!! Form::checkbox('has_title', 1, Form::old('has_title', true), ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <label for="has_subtitle">Sub-Título</label>
            {!! Form::checkbox('has_subtitle', 1, Form::old('has_subtitle', true), ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <label for="has_link">Link</label>
            {!! Form::checkbox('has_link', 1, Form::old('has_link', true), ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <label for="has_tag">Tag</label>
            {!! Form::checkbox('has_tag', 1, Form::old('has_tag', true), ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <label for="has_image">Imagem</label>
            {!! Form::checkbox('has_image', 1, Form::old('has_image', true), ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-6">


        <div class="form-group">
            <label for="has_body">Texto</label>
            {!! Form::checkbox('has_body', 1, Form::old('has_body', true), ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <label for="has_extra_1">Campo Extra 1</label>
            {!! Form::checkbox('has_extra_1', 1, Form::old('has_extra_1', true), ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <label for="has_extra_2">Campo Extra 2</label>
            {!! Form::checkbox('has_extra_2', 1, Form::old('has_extra_2', true), ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <label for="has_extra_3">Campo Extra 3</label>
            {!! Form::checkbox('has_extra_3', 1, Form::old('has_extra_3', true), ['class' => 'form-control']) !!}
        </div>

    </div>
</div>
<input class="btn btn-primary" type="submit" value="Enviar">
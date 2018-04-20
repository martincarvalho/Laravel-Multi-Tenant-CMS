<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="title">Título</label>
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <label for="subtitle">Sub Título</label>
            <small>(opcional)</small>
            {!! Form::text('subtitle', null, ['class' => 'form-control']) !!}
        </div>
        @if(Auth::user()->isAdmin())
            <div class="form-group">
                <label for="tag">Tag</label>
                <small>(opcional)</small>
                {!! Form::text('tag', null, ['class' => 'form-control']) !!}
            </div>
        @endif

    </div>
    <div class="col-md-6">
        <label for="Image">Imagem
            <small>(opcional)</small>
        </label>
        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
            <div class="form-control" data-trigger="fileinput">
                <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span>
            </div>
            <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Escolher</span><span
                        class="fileinput-exists">Trocar</span>
  <input type="file" name="image">
  </span>
            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remover</a>
        </div>
        <div class="form-group">
            <label for="link">Link</label>
            <small>(opcional)</small>
            {!! Form::text('link', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">

        <div class="form-group">
            <label for="body">Texto</label>
            {!! Form::textarea('body', null, ['class' => 'form-control summernote']) !!}
        </div>
    </div>
</div>
<input class="btn btn-primary" type="submit" value="Enviar">
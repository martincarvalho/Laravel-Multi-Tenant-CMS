<div class="row">
    <div class="col-md-6">

        <div class="form-group">
            <label for="description_title">Título Descritivo</label>
            {!! Form::text('description_title', null, ['class' => 'form-control']) !!}
        </div>

        @if($area->has_title == 1)
            <div class="form-group">
                <label for="title">Título</label>
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>
        @endif

        @if($area->has_subtitle == 1)
            <div class="form-group">
                <label for="subtitle">Sub Título</label>
                {!! Form::text('subtitle', null, ['class' => 'form-control']) !!}
            </div>
        @endif


    </div>
    <div class="col-md-6">
        @if($area->has_link == 1)
            <div class="form-group">
                <label for="link">Link</label>
                {!! Form::text('link', null, ['class' => 'form-control']) !!}
            </div>
        @endif

        @if($area->has_tag == 1)
            <div class="form-group">
                <label for="tag">Tag</label>
                {!! Form::text('tag', null, ['class' => 'form-control']) !!}
            </div>
        @endif

        @if($area->has_image == 1)
            <label for="Image">Imagem
                <small>(opcional)</small>
            </label>
            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                <div class="form-control" data-trigger="fileinput">
                    <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span>
                </div>
                <span class="input-group-addon btn btn-default btn-file"><span
                            class="fileinput-new">Escolher</span><span
                            class="fileinput-exists">Trocar</span>
  <input type="file" name="image">
  </span>
                <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                   data-dismiss="fileinput">Remover</a>
            </div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        @if($area->has_body == 1)
            <div class="form-group">
                <label for="body">Texto</label>
                {!! Form::textarea('body', null, ['class' => 'form-control summernote']) !!}
            </div>
        @endif

        @if($area->has_extra_1 == 1)
            <div class="form-group">
                <label for="extra_1">Texto</label>
                {!! Form::textarea('extra_1', null, ['class' => 'form-control summernote']) !!}
            </div>
        @endif

        @if($area->has_extra_2 == 1)
            <div class="form-group">
                <label for="extra_2">Texto</label>
                {!! Form::textarea('extra_2', null, ['class' => 'form-control summernote']) !!}
            </div>
        @endif

        @if($area->has_extra_3 == 1)
            <div class="form-group">
                <label for="extra_3">Texto</label>
                {!! Form::textarea('extra_3', null, ['class' => 'form-control summernote']) !!}
            </div>
        @endif
    </div>
</div>
<input class="btn btn-primary" type="submit" value="Enviar">
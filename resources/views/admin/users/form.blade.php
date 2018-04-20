<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Nome</label>
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            <p><strong>Tipo</strong></p>
            {!! Form::select('role', $roles, ['class' => 'form-control']) !!}
        </div>
        @if(count($sites))
            <p><strong>Sites</strong></p>
            @foreach($sites as $user_id => $user_name)

                <div class="form-group">
                    <label for="sites">{{ $user_name }}</label>
                    {!! Form::checkbox('sites[]', $user_id, Form::old('sites[]', true), ['class' => 'form-control']) !!}
                </div>

            @endforeach
        @endif
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="password">Senha</label>
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="password">Confirme a Senha</label>
            {!! Form::password('confirm_password', ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
<input class="btn btn-primary" type="submit" value="Enviar">

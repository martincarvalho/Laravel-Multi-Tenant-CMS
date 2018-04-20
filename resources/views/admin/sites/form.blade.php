<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="title">Título</label>
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <label for="address_1">Endereço 1</label>
            {!! Form::text('address_1', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <label for="address_2">Endereço 2</label>
            {!! Form::text('address_2', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <label for="address_3">Endereço 3</label>
            {!! Form::text('address_3', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <label for="contact_email">Email de Contato</label>
            {!! Form::text('contact_email', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <label for="secondary_email">Email Secundário</label>
            {!! Form::text('secondary_email', null, ['class' => 'form-control']) !!}
        </div>


    </div>

    <div class="col-md-6">

        <div class="form-group">
            <label for="folder">Pasta</label>
            {!! Form::text('folder', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <label for="description">Descrição</label>
            {!! Form::text('description', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <label for="phone_1">Telefone 1</label>
            {!! Form::text('phone_1', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <label for="phone_2">Telefone 2</label>
            {!! Form::text('phone_2', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <label for="phone_3">Telefone 3</label>
            {!! Form::text('phone_3', null, ['class' => 'form-control']) !!}
        </div>

    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <p><strong>Usuários Associados</strong></p>
        @foreach($users as $user_id => $user_name)
            <div class="form-group">
                <label for="users">{{ $user_name }}</label>
                {!! Form::checkbox('users[]', $user_id, Form::old('users[]', true), ['class' => 'form-control']) !!}
            </div>
        @endforeach

    </div>
</div>
<input class="btn btn-primary" type="submit" value="Enviar">

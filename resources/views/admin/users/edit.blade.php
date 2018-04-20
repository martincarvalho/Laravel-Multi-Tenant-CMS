@extends('admin.layout')
@section('content')
@include('admin._partials.contentheader', ['page_title' => '<strong>Editar</strong> Usuário'])
<div class="row">
    <div class="col-lg-12">
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-12">

                        {!! Form::model($user, ['action' => ['Admin\UsersController@update', $user->id], 'method' => 'patch']) !!}

                        @include('admin.users.form')

                        {!! Form::close() !!}

                        @foreach($errors->all() as $msg)
                            {{ $msg }}
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
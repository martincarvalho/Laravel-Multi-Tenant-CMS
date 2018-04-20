@extends('admin.layout')
@section('content')
@include('admin._partials.contentheader', ['page_title' => '<strong>Criar</strong> Usuário'])
<div class="row">
    <div class="col-lg-12">
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-12">

                        {!! Form::open(['action' => 'Admin\UsersController@store']) !!}

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
@extends('admin.layout')
@section('content')
@include('admin._partials.contentheader', ['page_title' => '<strong>Usuários</strong>'])
<div class="row">
    <div class="col-lg-12">
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-12">


                        <a href="/users/create" class="btn btn-primary"><i class="fa fa-plus"></i> Novo Usuário</a>
                        @if(count($users))
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Tipo</th>
                                    <th>Sites</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>
                                            @foreach($user->sites as $site)
                                                {{ $site->title }};
                                            @endforeach
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ action('Admin\UsersController@edit', ['user_id' => $user]) }}" class="btn btn-sm btn-default"><i class="icon-note"></i></a>
                                            {!! Form::open(['action' => ['Admin\UsersController@destroy', $user->id], 'method' => 'delete', 'class' => 'delete']) !!}<button type="submit" class="btn btn-sm btn-danger"><i class="icons-office-52"></i></button>{!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>Não há usuários cadastrados</p>
                        @endif



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
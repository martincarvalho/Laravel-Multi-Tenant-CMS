@extends('admin.layout')
@section('content')
@include('admin._partials.contentheader', ['page_title' => '<strong>Sites</strong>'])
<div class="row">
    <div class="col-lg-12">
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-12">
                            <a href="/sites/create" class="btn btn-primary"><i class="fa fa-plus"></i> Novo Site</a>
                        @if(count($sites))
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Pasta</th>
                                        <th>Usuários</th>
                                        <th>Ações</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sites as $site)
                                        <tr>
                                            <td>
                                                <a href="/sites/{{ $site->id }}"> {{ $site->title }}</a>

                                                </td>
                                            <td>{{ $site->folder }}</td>
                                            <td>
                                                @foreach($site->users as $user)
                                                    {{ $user->name }};
                                                @endforeach
                                            </td>
                                            <td class="text-right">
                                                @include('admin._components.buttons.edit', ['action' => 'Admin\SitesController@edit', 'site_id' => $site->id, 'id' => $site->id])
                                                @include('admin._components.buttons.delete', ['controller' => 'Admin\SitesController','site_id' => $site->id , 'id' => $site->id])</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                        @else
                            <p>Não há sites cadastrados</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
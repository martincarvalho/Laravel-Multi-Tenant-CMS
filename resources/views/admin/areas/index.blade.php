@extends('admin.layout')
@section('content')
@include('admin._partials.contentheader', ['page_title' => '<strong>Áreas</strong>'])
<div class="row">
    <div class="col-lg-12">
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-12">
                            <a href="/sites/{{ $site->id }}/areas/create" class="btn btn-primary"><i class="fa fa-plus"></i> Nova Área</a>
                        @if(count($site->areas))
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($site->areas as $area)
                                    <tr>
                                        <td>
                                            {{ $area->title }}
                                        </td>
                                        <td class="text-right">
                                            @include('admin._components.buttons.edit', ['action' => 'Admin\AreasController@edit', 'site_id' => $area->site->id, 'id' => $area->id])
                                            @include('admin._components.buttons.delete', ['controller' => 'Admin\AreasController','site_id' => $area->site->id , 'id' => $area->id])</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="c-red">Não há áreas cadastradas nesse site</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
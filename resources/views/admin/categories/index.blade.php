@extends('admin.layout')
@section('content')
@include('admin._partials.contentheader', ['page_title' => '<strong>Categorias</strong>'])
<div class="row">
    <div class="col-lg-12">
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-12">
                            <a href="/sites/{{ $site->id }}/categories/create" class="btn btn-primary"><i class="fa fa-plus"></i> Nova Categoria</a>
                        @if(count($site->categories))
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Posts</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($site->categories as $category)
                                    <tr>
                                        <td>
                                            {{ $category->title }}
                                        </td>
                                        <td>
                                            {{ $category->posts->count() }}
                                        </td>
                                        <td class="text-right">
                                            @include('admin._components.buttons.edit', ['action' => 'Admin\CategoriesController@edit', 'site_id' => $category->site->id, 'id' => $category->id])
                                            @include('admin._components.buttons.delete', ['controller' => 'Admin\CategoriesController','site_id' => $category->site->id , 'id' => $category->id])</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="c-red">Não há categorias cadastradas nesse site</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
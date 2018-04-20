@extends('admin.layout')
@section('content')
@include('admin._partials.contentheader', ['page_title' => '<strong>'.$area->title.' - </strong>Páginas'])
<div class="row">
    <div class="col-lg-12">
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-12">
                            <a href="/sites/{{ $site->id }}/pages/create" class="btn btn-primary"><i class="fa fa-plus"></i> Nova Página</a>
                        @if(count($area->customPages))
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Título</th>
                                    <th>Tag</th>
                                    <th>Imagem</th>
                                    <th>Texto</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($area->customPages as $page)
                                    <tr>
                                        <td>
                                            <a href="{{ action('Admin\PagesController@show', ['site_id' => $site->id, 'id' => $page->id]) }}">{{ strip_tags($page->title) }}</a>
                                        </td>
                                        <td>{{ $page->tag }}</td>
                                        <td>
                                            @if ($page->image != '')
                                                <img class="thumb" src="/{{$page->area->site->folder}}/images/customPages/{{$page->image}}">
                                            @endif
                                        </td>
                                        <td>{{ str_limit(strip_tags($page->body),250) }}</td>
                                        <td class="text-right">
                                            @include('admin._components.buttons.edit', ['action' => 'Admin\PagesController@edit', 'site_id' => $page->area->site->id, 'id' => $page->id])
                                            @include('admin._components.buttons.delete', ['controller' => 'Admin\PagesController','site_id' => $page->area->site->id , 'id' => $page->id])</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="c-red">Não há páginas cadastradas nesse site</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
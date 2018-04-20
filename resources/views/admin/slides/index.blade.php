@extends('admin.layout')
@section('content')
@include('admin._partials.contentheader', ['page_title' => '<strong>Slides</strong>'])
<div class="row">
    <div class="col-lg-12">
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-12">
                            <a href="/sites/{{ $site->id }}/slides/create" class="btn btn-primary"><i class="fa fa-plus"></i> Novo Slide</a>
                        @if(count($site->slides))
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Título</th>
                                    <th>Imagem</th>
                                    <th>Link</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($site->slides as $slide)
                                    <tr>
                                        <td>
                                            <a href="{{ action('Admin\SlidesController@show', ['site_id' => $site->id, 'id' => $slide->id]) }}">{{ strip_tags($slide->title) }}</a>
                                        </td>
                                        <td>@if ($slide->image !== '')
                                                <img class="thumb" src="/{{$slide->site->folder}}/images/slides/{{$slide->image}}">
                                            @endif</td>
                                        <td>{{ $slide->link }}</td>
                                        <td class="text-right">
                                            @include('admin._components.buttons.edit', ['action' => 'Admin\SlidesController@edit', 'site_id' => $slide->site->id, 'id' => $slide->id])
                                            @include('admin._components.buttons.delete', ['controller' => 'Admin\SlidesController','site_id' => $slide->site->id , 'id' => $slide->id])</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="c-red">Não há slides cadastrados nesse site</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
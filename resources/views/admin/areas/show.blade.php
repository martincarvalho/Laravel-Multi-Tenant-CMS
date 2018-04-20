@extends('admin.layout')
@section('content')
@include('admin._partials.contentheader', ['page_title' => '<strong>'.$area->title.'</strong> Cadastrados(as)'])
<div class="row">
    <div class="col-lg-12">
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-12">
                            <a href="/sites/{{ $site->id }}/areas/{{ $area->id }}/customPages/create" class="btn btn-primary"><i class="fa fa-plus"></i> Cadastrar Nova</a>
                        <a href="{{ action('Admin\AreasController@edit', [$site, $area]) }}" class="btn btn-sm btn-default">Editar Área <i class="icon-note"></i></a>
                        @if(count($area->customPages))
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Descrição</th>
                                    @if($area->has_title == 1)
                                            <th>Título <small>(html)</small></th>
                                    @endif
                                    @if($area->has_image == 1)
                                        <th>Imagem</th>
                                    @endif
                                    @if($area->has_link == 1)
                                        <th>Link</th>
                                    @endif
                                    @if($area->has_tag == 1)
                                        <th>Tag</th>
                                    @endif
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($area->customPages as $page)
                                    <tr>
                                        <td>{{ $page->description_title }}</td>
                                        @if($area->has_title == 1)
                                            <td>
                                                <a href="{{ action('Admin\CustomPagesController@show', [$site, $area, $page]) }}">{{ strip_tags($page->title) }}</a>
                                        @endif
                                        @if($area->has_image == 1)
                                            <td>
                                                @if ($page->image != '')
                                                    <img class="thumb" src="/{{$page->area->site->folder}}/images/customPages/{{$page->image}}">
                                                @endif
                                            </td>
                                        @endif
                                        @if($area->has_link == 1)
                                            <td>{{ $page->link }}</td>
                                        @endif
                                        @if($area->has_tag == 1)
                                            <td>{{ $page->tag }}</td>
                                        @endif

                                        </td>
                                        <td class="text-right">

                                            <a href="{{ action('Admin\CustomPagesController@edit', [$site, $area, $page]) }}" class="btn btn-sm btn-default"><i class="icon-note"></i></a>

                                        {!! Form::open(['action' => ['Admin\CustomPagesController@destroy', $site, $area, $page], 'method' => 'delete', 'class' => 'delete']) !!}<button type="submit" class="btn btn-sm btn-danger"><i class="icons-office-52"></i></button>{!! Form::close() !!}
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
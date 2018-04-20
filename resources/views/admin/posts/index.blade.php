@extends('admin.layout')
@section('content')
@include('admin._partials.contentheader', ['page_title' => '<strong>Posts</strong>'])
<div class="row">
    <div class="col-lg-12">
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-12">

                            <a href="/sites/{{ $site->id }}/posts/create" class="btn btn-primary"><i class="fa fa-plus"></i> Novo Post</a>
                        @if(count($site->posts))
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Título</th>
                                    <th>Subtítulo</th>
                                    <th>Imagem</th>
                                    <th>Categoria</th>
                                    <th>Texto</th>
                                    <th>Publicado</th>
                                    <th>Destaque</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($site->posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>
                                            <a href="{{ action('Admin\PostsController@show', ['site_id' => $site->id, 'id' => $post->id]) }}">{{ $post->title }}</a>
                                        </td>
                                        <td>{{ str_limit($post->excerpt,250) }}</td>
                                        <td>
                                            @if ($post->image != '')
                                                <img class="thumb" src="/{{$post->site->folder}}/images/posts/{{$post->image}}">
                                            @endif
                                        </td>
                                        <td>{{ $post->category->title }}</td>
                                        <td>{{ str_limit(strip_tags($post->body),250) }}</td>
                                        <td>{{ $post->published }}</td>
                                        <td>{{ $post->featured }}</td>
                                        <td class="text-right">
                                            @include('admin._components.buttons.edit', ['action' => 'Admin\PostsController@edit', 'site_id' => $post->site->id, 'id' => $post->id])
                                            @include('admin._components.buttons.delete', ['controller' => 'Admin\PostsController','site_id' => $post->site->id , 'id' => $post->id])</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="c-red">Não há posts cadastradas nesse site</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
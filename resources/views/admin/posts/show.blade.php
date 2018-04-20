@extends('admin.layout')
@section('content')
@include('admin._partials.contentheader', ['page_title' => '<strong>'.$post->title.'</strong>'])
<div class="row">
    <div class="col-lg-12">
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-6">
                        @if ($post->image != '')
                            <img src="/{{$post->site->folder}}/images/posts/{{$post->image}}">
                            <br>

                            <br>
                            @include('admin._components.buttons.delete', ['controller' => 'Admin\PostsController','site_id' => $post->site->id , 'id' => $post->id])
                            @include('admin._components.buttons.edit', ['action' => 'Admin\PostsController@edit', 'site_id' => $post->site->id, 'id' => $post->id])
                        @endif

                        </div>
                    <div class="col-md-6">
                        <h1>{{ $post->title }}</h1>
                        <hr>
                        {{ $post->excerpt }}

                        {!!  $post->body  !!}
                        <p>Publicada: </p>{{ $post->published }}
                        <p>Destaque: </p>{{ $post->featured }}
                        <p>Categoria: </p>{{ $post->category->title }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
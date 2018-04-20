@extends('admin.layout')
@section('content')
@include('admin._partials.contentheader')
<div class="row">
    <div class="col-lg-12">
        <div class="panel">
            <div class="panel-content">
                <div class="row">

                    <div class="col-md-6">
                    @if ($slide->image !== '')
                            <img src="/{{$slide->site->folder}}/images/slides/{{$slide->image}}">
                            <br>
                        @endif

                        <br>
                        <br>
                        @include('admin._components.buttons.edit', ['action' => 'Admin\SlidesController@edit', 'site_id' => $slide->site->id, 'id' => $slide->id])
                        @include('admin._components.buttons.delete', ['controller' => 'Admin\SlidesController','site_id' => $slide->site->id , 'id' => $slide->id])

                    </div>
                    <div class="col-md-6">
                        <h1>{{ strip_tags($slide->title) }}</h1>
                        <hr>
                        <p>Link: {!!  $slide->link  !!}</p>
                        <p>Texto: </p>{{ $slide->body }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
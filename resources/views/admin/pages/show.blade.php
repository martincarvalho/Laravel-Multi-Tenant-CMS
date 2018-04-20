@extends('admin.layout')
@section('content')
@include('admin._partials.contentheader', ['page_title' => '<strong>'.$page->title.'</strong>'])
<div class="row">
    <div class="col-lg-12">
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-6">
                        @if ($page->image != '')
                            <img src="/{{$page->site->folder}}/images/pages/{{$page->image}}">
                            <br>
                            <br>
                        @endif

                        @include('admin._components.buttons.edit', ['action' => 'Admin\PagesController@edit', 'site_id' => $page->site->id, 'id' => $page->id])
                        @include('admin._components.buttons.delete', ['controller' => 'Admin\PagesController','site_id' => $page->site->id , 'id' => $page->id])

                    </div>
                    <div class="col-md-6">
                        <h1>{{ strip_tags($page->title) }}</h1>
                        <h4>{{ $page->subtitle }}</h4>
                        <hr>
                        {!!  $page->body  !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
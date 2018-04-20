@extends('admin.layout')
@section('content')
@include('admin._partials.contentheader', ['page_title' => '<strong>Criar</strong> Post'])
<div class="row">
    <div class="col-lg-12">
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::open(['action' => ['Admin\PostsController@store', $site->id], 'files' => true]) !!}

                        @include('admin.posts.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
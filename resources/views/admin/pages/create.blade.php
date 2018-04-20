@extends('admin.layout')
@section('content')
@include('admin._partials.contentheader', ['page_title' => '<strong>Criar</strong> Página'])
<div class="row">
    <div class="col-lg-12">
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::open(['action' => ['Admin\PagesController@store', $id], 'files' => true]) !!}

                        @include('admin.pages.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
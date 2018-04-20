@extends('admin.layout')
@section('content')
@include('admin._partials.contentheader', ['page_title' => '<strong>Editar</strong> Site'])
<div class="row">
    <div class="col-lg-12">
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-12">

                        {!! Form::model($site, ['action' => ['Admin\SitesController@update', $site->id], 'method' => 'PATCH']) !!}

                        @include('admin.sites.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
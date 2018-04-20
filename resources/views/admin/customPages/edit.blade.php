@extends('admin.layout')
@section('content')
@include('admin._partials.contentheader', ['customPage_title' => '<strong>Editar</strong> Página Customizada'])
<div class="row">
    <div class="col-lg-12">
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-12">

                        {!! Form::model($customPage, ['action' => ['Admin\CustomPagesController@update', $site, $area, $customPage], 'method' => 'PATCH', 'files' => true]) !!}

                        @include('admin.customPages.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
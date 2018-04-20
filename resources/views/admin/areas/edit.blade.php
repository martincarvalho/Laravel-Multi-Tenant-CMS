@extends('admin.layout')
@section('content')
@include('admin._partials.contentheader', ['page_title' => '<strong>Editar</strong> Área'])
<div class="row">
    <div class="col-lg-12">
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-12">

                        {!! Form::model($area, ['action' => ['Admin\AreasController@update', $area->site->id, $area->id], 'method' => 'PATCH']) !!}

                        @include('admin.areas.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
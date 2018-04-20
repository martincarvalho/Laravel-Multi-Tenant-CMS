@extends('admin.layout')
@section('content')
@include('admin._partials.contentheader', ['page_title' => '<strong>Criar</strong> '. $area->title ])
<div class="row">
    <div class="col-lg-12">
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::open(['action' => ['Admin\CustomPagesController@store', $site, $area], 'files' => true]) !!}

                        @include('admin.customPages.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
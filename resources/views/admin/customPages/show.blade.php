@extends('admin.layout')
@section('content')
@include('admin._partials.contentheader', ['page_title' => '<strong>'.$customPage->title.'</strong>'])
<div class="row">
    <div class="col-lg-12">
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-6">
                        @if ($customPage->image != '')
                            <img src="/{{$site->folder}}/images/customPages/{{$customPage->image}}">
                            <br>
                            <br>
                            <a href="{{ action('Admin\CustomPagesController@edit', [$site, $customPage->area, $customPage]) }}" class="btn btn-sm btn-default"><i class="icon-note"></i></a>
                            {!! Form::open(['action' => ['Admin\CustomPagesController@destroy', $site, $customPage->area, $customPage], 'method' => 'delete', 'class' => 'delete']) !!}<button type="submit" class="btn btn-sm btn-danger"><i class="icons-office-52"></i></button>{!! Form::close() !!}
                        @endif
                        </div>
                    <div class="col-md-6">
                        <h1><strong>{{ $customPage->title }}</strong></h1>
                        <hr>
                        <h4>{{ $customPage->subtitle }}</h4>

                        {!!  $customPage->body  !!}



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
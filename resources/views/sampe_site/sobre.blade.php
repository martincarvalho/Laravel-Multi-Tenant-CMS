@extends('sample_site.sample_site')

@section('slider')
    <section id="page-title" class="page-title-parallax" style="background-image: url('images/customPages/{{ $header->image }}'); padding: 120px 0;" data-stellar-background-ratio="0.3">

        <div class="container clearfix center">
            <h2 class="yellow">{!! $header->title !!}</h2>
            @if(!empty($header->link))
                <a href="{{ $header->link }}"
                   class="tlight button button-large yellow-bg button-rounded">{!! $header->subtitle !!}</a>
            @endif
        </div>

    </section>
    <!-- Content
    ============================================= -->
    {{--<div class="sobre-video center">--}}
        {{--<iframe width="560" height="315" src="{{ $video->link }}" frameborder="0" allowfullscreen></iframe>--}}
        {{--<img src="assets/images/video-shadow.png" width="560px" alt="">--}}
    {{--</div>--}}
@stop
@section('wrap-padding')
    nopadding
@stop
@section('content')

    <div class="row clearfix common-height">

        <div class="col-md-6 center col-padding" style="background: url('images/pages/{{ $sobre->image }}') top center no-repeat; background-size: cover;">
            <div>&nbsp;</div>
        </div>

        <div class="col-md-6 col-padding" style="background-color: #F5F5F5;">
            <div>
                <div class="heading-block">
                    <span class="tlight">{!! $sobre->subtitle !!}</span>
                    <h1>{!! $sobre->title !!}</h1>
                </div>
                <p class="nobottommargin" style="color:#717171">{!! $sobre->body !!}</p>
            </div>
        </div>

    </div>

@stop
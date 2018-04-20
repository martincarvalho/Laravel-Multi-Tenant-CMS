@extends('sample_site.sample_site')

@section('slider')
    <section id="page-title" class="page-title-parallax" style="background-image: url('images/customPages/{{ $header->image }}'); padding: 120px 0;" data-stellar-background-ratio="0.3">

        <div class="container clearfix center">
            <div class="col-md-offset-7">
                <h2 class="yellow">{!! $header->title !!}<br>
                </h2>
                @if(!empty($header->link))
                    <a href="{{ $header->link }}"
                       class="tlight button button-large yellow-bg button-rounded">{!! $header->subtitle !!}</a>
                @endif
            </div>
        </div>

    </section>
@stop
@section('wrap-padding')
    nobottompadding
@stop
@section('content')

    <div class="container clearfix">
        <h1 class="blue center t900">VANTAGENS</h1>
        @foreach ($vantagens->customPages->chunk(3) as $chunk)
            <div class="row clearfix">
                @foreach ($chunk as $vantagem)
                    <div class="col-sm-4 center">
                        <div class="vantagem">
                            <div class="content">
                                <img src="images/customPages/{{ $vantagem->image }}" alt="{{ $vantagem->title }}">
                                <p class="blue t900">{!! $vantagem->title !!}</p>
                                <p>{!! $vantagem->body !!}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
    {{--<div class="testimonial center hidden-sm">--}}
        {{--<div class="col-sm-3 col-sm-offset-1">--}}

            {{--<img src="images/customPages/{{ $depoimento->image }}" alt="{{ $depoimento->title }}">--}}
        {{--</div>--}}
        {{--<div class="col-sm-6 tleft"><blockquote class="quote">--}}
                {{--<p>{!! $depoimento->body !!}</p>--}}
                {{--<footer>{!! $depoimento->title !!}</footer>--}}
            {{--</blockquote></div>--}}
    {{--</div>--}}

@stop
@extends('sample_site.sample_site')

@section('slider')
    @if (count($site->slides) > 0)
        <section id="slider" class="slider-parallax swiper_wrapper full-screen clearfix">
            <div class="slider-parallax-inner">

                <div class="swiper-container swiper-parent">
                    <div class="swiper-wrapper">

                        @foreach($site->slides as $slide)
                            <div class="swiper-slide dark"
                                 style="background-image: url('images/slides/{{ $slide->image }}');">
                                <div class="container clearfix">
                                    <div class="slider-caption slider-caption-center">
                                        <h2 data-caption-animate="fadeInUp">{!! $slide->title !!}</h2>
                                        <p data-caption-animate="fadeInUp"
                                           data-caption-delay="200">{!! $slide->body !!}</p>
                                        <a href="{{ $site->link }}"
                                           class="button button-large button-rounded button-border"><span>saiba mais</span></a>
                                        <a href="/peca-o-seu"
                                           class="button button-large button-rounded yellow-bg"><span>peça o seu</span></a>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                    </div>
                    <div id="slider-arrow-left"><i class="icon-angle-left"></i></div>
                    <div id="slider-arrow-right"><i class="icon-angle-right"></i></div>
                </div>

                <a href="#" data-scrollto="#content" data-offset="100" class="dark one-page-arrow"><i
                            class="icon-angle-down infinite animated fadeInDown"></i></a>
            </div>
        </section>
    @endif
@stop
@section('wrap-padding')
    nobottompadding
@stop
@section('content')
    <div class="container clearfix">
        <div class="row clearfix">

            <div class="col-lg-3">
                <span class="tlight">{!! $box1->subtitle !!}</span>
                <h1>{!! $box1->title !!}</h1>
                <p><strong>{!! $box1->body !!}</strong></p>
                <a href="{!! $box1->link !!}" class="button button-large yellow-bg button-rounded">SAIBA MAIS</a>
            </div>

            <div class="col-lg-3 clearfix">
                <img src="images/customPages/{{ $box2->image }}" alt="{{ $box2->title }}">
                <span class="bullet-title">{!! $box2->title !!}</span>
                <p>{!! $box2->body !!}</p>
            </div>

            <div class="col-lg-3 clearfix">
                <img src="images/customPages/{{ $box3->image }}" alt="{{ $box3->title }}">
                <span class="bullet-title">{!! $box3->title !!}</span>
                <p>{!! $box3->body !!}</p>
            </div>

            <div class="col-lg-3 clearfix">
                <img src="images/customPages/{{ $box4->image }}" alt="{{ $box4->title }}">
                <span class="bullet-title">{!! $box4->title !!}</span>
                <p>{!! $box4->body !!}</p>
            </div>
        </div>
    </div>
    <div class="row clearfix common-height">

        <div class="col-md-6 center col-padding"
             style="background: url('images/pages/{{ $home->image }}') center center no-repeat; background-size: cover;">
            <div>&nbsp;</div>
        </div>

        <div class="col-md-6 col-padding" style="background-color: #F5F5F5;">
            <div>
                <div class="heading-block">
                    <span class="tlight">{!! $home->subtitle !!}</span>
                    <h1>{!! $home->title !!}</h1>
                </div>
                <p class="nobottommargin" style="color:#717171">{!! $home->body !!}</p>
            </div>
        </div>

    </div>
@stop
@extends('sample_site.sample_site')

@section('slider')
    <section id="page-title" class="page-title-parallax"
             style="background-image: url('images/customPages/{{ $header->image }}'); padding: 120px 0;"
             data-stellar-background-ratio="0.3">

        <div class="container clearfix center">
            <h2 class="yellow">{!! $header->title !!}<br>
            </h2>
            @if(!empty($header->link))
                <a href="{{ $header->link }}"
                   class="tlight button button-large yellow-bg button-rounded">{!! $header->subtitle !!}</a>
            @endif
        </div>

    </section>
@stop

@section('wrap-padding')
nobottompadding
@stop

@section('content')


    <div class="container clearfix">
        <h1 class="blue center t900">COMO FUNCIONA</h1>
        @foreach ($como_funciona->customPages->chunk(3) as $chunk)
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

    @if($perguntas_frequentes->count() > 0)
        <div class="faq">
            <div class="container clearfix">
                <h1 class="blue center t900"><span class="tlight">PERGUNTAS</span> FREQUENTES</h1>
                <div class="accordion clearfix">

                    @foreach($perguntas_frequentes->customPages as $pergunta)
                        <div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i
                                    class="acc-open icon-remove-circle"></i>{!! $pergunta->title !!}
                        </div>
                        <div class="acc_content clearfix">{!! $pergunta->body !!}</div>
                    @endforeach


                </div>
            </div>
        </div>
    @endif

@stop
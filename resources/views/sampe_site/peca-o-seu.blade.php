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
nopadding
@stop

@section('content')

    <div class="contato">
        <div class="container clearfix center col-padding">
            <h1 class="blue center t900"><span class="tlight">PEÇA O</span> SEU</h1>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif

            <form action="/peca-o-seu" method="POST">
                {{ csrf_field() }}
                <div class="col-md-4 col-md-offset-2">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Nome">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" name="phone" class="form-control" placeholder="Telefone">
                    </div>
                </div>
                <div class="col-md-8 col-md-offset-2">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <button type="submit" class="btn btn-default blue-bg topmargin-sm">enviar</button>
                </div>

            </form>

        </div>
    </div>

@stop
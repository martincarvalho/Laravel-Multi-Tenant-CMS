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

    @if (session('error'))
        <div class="modal-on-load" data-target="#myModal1"></div>

        <!-- Modal -->
        <div class="modal1 mfp-hide" id="myModal1">
            <div class="block divcenter" style="background-color: #FFF; max-width: 500px;">
                <div class="center" style="padding: 50px;">
                    <h3>Ops!</h3>
                    <p class="nobottommargin">{{ session('error') }}</p>
                </div>
                <div class="section center nomargin" style="padding: 30px;">
                    <a href="#" class="button" onClick="$.magnificPopup.close();return false;">Fechar janela</a>
                </div>
            </div>
        </div>
    @endif

    @if (session('credenciados'))
        <div class="modal-on-load" data-target="#myModal1"></div>

        <!-- Modal -->
        <div class="modal1 mfp-hide" id="myModal1">
            <div class="block divcenter" style="background-color: #FFF; max-width: 500px;">
                <div class="center" style="padding: 50px;">
                    <h3>Credenciados</h3>
                    <p class="nobottommargin">Lista Credenciados - <strong>{{ session('termo') }}</strong></p>
                </div>
                <div class="container clearfix">
                    <div class="accordion clearfix" data-state="closed">

                        @foreach (session('credenciados')->Credenciado as $credenciado)
                            <div class="acctitle noborder"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>{!! $credenciado->nome!!}
                            </div>
                            <div class="acc_content clearfix">
                                {!! $credenciado->logradouro!!}<br>
                                {!! $credenciado->bairro!!}<br>
                                {!! $credenciado->cidade!!} - {!! $credenciado->uf!!}<br>
                                {!! $credenciado->fone!!}
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="section center nomargin" style="padding: 30px;">
                    <a href="#" class="button" onClick="$.magnificPopup.close();return false;">Fechar janela</a>
                </div>
            </div>
        </div>
    @endif

    @if (session('saldo'))
        <div class="modal-on-load" data-target="#myModal2"></div>

        <!-- Modal -->
        <div class="modal1 mfp-hide" id="myModal2">
            <div class="block divcenter" style="background-color: #FFF; max-width: 500px;">
                @if (session('saldo')->resultado == true)
                    <div class="center" style="padding: 50px;">
                        <h3>{{ session('saldo')->nome }}</h3>
                        <p class="nobottommargin">Seu saldo é de:</p>{{ session('saldo')->valor }}
                    </div>
                @else
                    <div class="center" style="padding: 50px;">
                        <h3>{{ session('saldo')->nome }}</h3>
                    </div>
                @endif
                <div class="section center nomargin" style="padding: 30px;">
                    <a href="#" class="button" onClick="$.magnificPopup.close();return false;">Fechar janela</a>
                </div>
            </div>
        </div>
    @endif

    <div class="row clearfix common-height">

        <div class="col-md-6 area-do-cliente center clearfix">
            <div class="col-md-8 col-md-offset-2">
                <h1 class="yellow center t900"><span class="tlight">ÁREA DO</span> CLIENTE</h1>

                <a href="http://jhtl.facilinformatica.com.br" class="btn btn-default yellow-bg" target="_blank">Clique
                    Aqui</a>
            </div>
        </div>
        <div class="col-md-6 rede center clearfix">
            <div class="col-md-8 col-md-offset-2">
                <h1 class="blue center t900"><span class="tlight">REDE DE </span>ATENDIMENTO</h1>

                <form action="/credenciados" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <select class="form-control" name="especialidade">
                            <option selected="selected" value="0">Especialidade</option>
                            @foreach($especialidades as $especialidade)
                                <option value="{{ $especialidade->descricao }}">{{ $especialidade->descricao }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="termo" class="form-control" placeholder="Pesquisa">
                    </div>
                    <button type="submit" class="btn btn-default blue-bg">buscar</button>
                </form>
            </div>
        </div>
    </div>
    <div class="saldo clearfix">
        <div class="col-md-4 col-md-offset-2 tright">
            <form action="/saldo" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" name="numCartao" class="form-control" placeholder="Nº do cartão">
                </div>
                <div class="form-group">
                    <input type="text" name="codSeguranca" class="form-control" placeholder="Cód. de segurança">
                </div>
                <button type="submit" class="btn btn-default blue-bg">consulte seu saldo</button>
            </form>
        </div>
        <div class="col-md-4 col-md-offset-1">
            <img src="assets/images/cartao-karto.png" alt="Sample Site">
        </div>

    </div>


@stop
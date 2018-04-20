@extends('admin.layout')
@section('content')
@include('admin._partials.contentheader')
<div class="row">
    @if(count(Auth::user()->sites))
        @foreach(Auth::user()->sites as $site)
                <div class="col-sm-6">
                    <div class="panel">
                        <div class="panel-header bg-primary ui-sortable-handle">
                            <h3>{{ $site->title }}</h3>
                        </div>
                        <div class="panel-content t-center">
                            @if(Auth::user()->isAdmin())
                                <a class="btn btn-success" href="/sites/{{ $site->id }}">Cadastrar Conteúdo</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p>Não há sites cadastrados.</p>
            <li><a href="/sites/create"> Cadastrar Site</a></li>
        @endif
</div>
@endsection
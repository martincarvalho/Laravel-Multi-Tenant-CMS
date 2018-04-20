<div class="sidebar">
    <div class="logopanel">
        <h1>
            <a href="/"></a>
        </h1>
    </div>
    <div class="sidebar-inner">
        <ul class="nav nav-sidebar">
            <li><a href="/"><i class="icon-home"></i><span>Painel de Controle</span></a></li>
            @if(count(Auth::user()->sites))
                @foreach(Auth::user()->sites as $site)
                    <li class="nav-parent">
                        <a href=""><i class="fa fa-desktop"></i><span>{{ $site->title }}</span><span
                                    class="fa arrow"></span></a>
                        <ul class="children collapse">
                            @if($site->slides()->count() > 0)
                                <li><a href="/sites/{{ $site->id }}/slides"> Slides</a></li>
                            @endif
                            @if($site->pages()->count() > 0)
                                <li><a href="/sites/{{ $site->id }}/pages"> Páginas</a></li>
                            @endif
                            @if($site->posts()->count() > 0)
                                <li><a href="/sites/{{ $site->id }}/posts"> Posts</a></li>
                            @endif
                            @if($site->categories()->count() > 0)
                                <li><a href="/sites/{{ $site->id }}/categories"> Categorias</a></li>
                            @endif
                                @if($site->areas()->count() > 0)
                                    @foreach($site->areas as $area)
                                    <li><a href="/sites/{{ $site->id }}/areas/{{ $area->id }}"> {{ $area->title }}</a></li>
                                    @endforeach
                                @endif
                                @if(Auth::user()->isAdmin())
                            <li><a href="/sites/{{ $site->id }}"> Cadastrar Conteúdo</a></li>
                                @endif
                        </ul>
                    </li>
                @endforeach
            @else
                <p class="t-center">Nenhum site cadastrado.</p>
            @endif
        </ul>
        @if(Auth::user()->isAdmin())
            <div class="sidebar-widgets">
                <p class="menu-title widget-title">
                    Sistema
                </p>
                <ul>
                    <li><a href="/users"><i class="fa fa-users"></i>Usuários</a></li>
                    <li><a href="/sites"><i class="fa fa-files-o"></i>Sites</a></li>
                </ul>
            </div>
        @endif
    </div>
</div>

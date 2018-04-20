@extends('admin.layout')
@section('content')
    @include('admin._partials.contentheader', ['page_title' => '<strong>'.$site->title.'</strong>'])
    <a href="/sites/{{ $site->id }}/areas/create" class="btn btn-primary"><i class="fa fa-plus"></i> Nova Área</a>
    <div class="row">
        <div class="row sortable ui-sortable">
            <div class="col-sm-3">
                <div class="panel">
                    <div class="panel-header bg-primary ui-sortable-handle">
                        <h3>Slides</h3>
                    </div>
                    <div class="panel-content">
                        @if($site->slides()->count() > 0)
                            <h4><strong>{{ $site->slides()->count() }}</strong> slides cadastrados</h4>
                            <a href="/sites/{{ $site->id }}/slides">Ver Slides</a>
                        @else
                            <p>Não há slides para este site.</p>
                        @endif
                    </div>
                    <div class="panel-footer">

                        <a class="btn btn-success btn-lg btn-block" href="/sites/{{ $site->id }}/slides/create">Cadastrar
                            Slide</a>

                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="panel">
                    <div class="panel-header bg-primary ui-sortable-handle">
                        <h3>Páginas</h3>
                    </div>
                    <div class="panel-content">
                        @if($site->pages()->count() > 0)
                            <h4><strong>{{ $site->pages()->count() }} página(s)</strong> cadastradas</h4>
                            <a class="tcenter" href="/sites/{{ $site->id }}/pages">Ver Páginas</a>
                        @else
                            <p>Não há páginas para este site.</p>
                        @endif
                    </div>
                    <div class="panel-footer">

                        <a class="btn btn-success btn-lg btn-block" href="/sites/{{ $site->id }}/pages/create">Cadastrar
                            Página</a>

                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="panel">
                    <div class="panel-header bg-primary ui-sortable-handle">
                        <h3>Posts</h3>
                    </div>
                    <div class="panel-content">
                        @if($site->posts()->count() > 0)
                            <h4><strong>{{ $site->posts()->count() }} post(s)</strong> cadastradas</h4>
                            <a class="tcenter" href="/sites/{{ $site->id }}/posts">Ver Posts</a>
                        @else
                            <p>Não há posts para este site.</p>
                        @endif
                    </div>
                    <div class="panel-footer">

                        <a class="btn btn-success btn-lg btn-block" href="/sites/{{ $site->id }}/posts/create">Cadastrar
                            Post</a>

                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="panel">
                    <div class="panel-header bg-primary ui-sortable-handle">
                        <h3>Categorias</h3>
                    </div>
                    <div class="panel-content">
                        @if($site->categories()->count() > 0)
                            <h4><strong>{{ $site->categories()->count() }} categoria(s)</strong> cadastradas</h4>
                            <a class="tcenter" href="/sites/{{ $site->id }}/categories">Ver Categorias</a>
                        @else
                            <p>Não há categorias para este site.</p>
                        @endif
                    </div>
                    <div class="panel-footer">

                        <a class="btn btn-success btn-lg btn-block" href="/sites/{{ $site->id }}/categories/create">Cadastrar
                            Categoria</a>

                    </div>
                </div>
            </div>

        </div>
        @if($site->areas->count() > 0)
            @foreach ($site->areas->chunk(4) as $chunk)
                <div class="row sortable ui-sortable">
                    @foreach($chunk as $area)
                        <div class="col-sm-3">
                            <div class="panel">
                                <div class="panel-header bg-primary ui-sortable-handle">
                                    <h3>{{ $area->title }}</h3>
                                </div>
                                <div class="panel-content">
                                    @if($area->customPages->count() > 0)
                                        <h4><strong>{{ $area->customPages->count() }}</strong> {{$area->title}}
                                            cadastrados(as)</h4>
                                        <a href="/sites/{{ $site->id }}/areas/{{ str_slug($area->id) }}">Ver {{$area->title}}</a>
                                    @else
                                        <p>Não há {{$area->title}} cadastrados(as)</p>
                                    @endif
                                </div>
                                <div class="panel-footer">

                                    <a class="btn btn-success btn-lg btn-block"
                                       href="/sites/{{ $site->id }}/areas/{{ $area->id }}/customPages/create">Cadastrar
                                        {{$area->title}}</a>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        @endif
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-4">
                            <h4><strong>Título - </strong>{{ $site->title or 'Não cadastrado'}}</h4>
                            <h4><strong>Pasta - </strong>{{ $site->folder or 'Não cadastrado'}}</h4>
                            <h4><strong>Descrição - </strong>{{ $site->description or 'Não cadastrado'}}</h4>
                            <h4><strong>Usuários associados: </strong></h4>
                            @foreach($site->users as $user)
                                <p>{{ $user->name }}</p>
                            @endforeach
                        </div>
                        <div class="col-md-4">
                            <h4><strong>Telefone 1 - </strong>{{ $site->phone_1 or 'Não cadastrado'}}</h4>
                            <h4><strong>Telefone 2 - </strong>{{ $site->phone_2 or 'Não cadastrado'}}</h4>
                            <h4><strong>Telefone 3 - </strong>{{ $site->phone_3 or 'Não cadastrado'}}</h4>
                            <h4><strong>E-mail de Contato - </strong>{{ $site->contact_email or 'Não cadastrado'}}</h4>
                        </div>
                        <div class="col-md-4">
                            <h4><strong>Endereço 1 - </strong>{{ $site->address_1 or 'Não cadastrado'}}</h4>
                            <h4><strong>Endereço 2 - </strong>{{ $site->address_2 or 'Não cadastrado'}}</h4>
                            <h4><strong>Endereço 3 - </strong>{{ $site->address_3 or 'Não cadastrado'}}</h4>
                            <h4><strong>E-mail Secundário - </strong>{{ $site->secondary_email or 'Não cadastrado'}}
                            </h4>

                        </div>

                    </div>
                    @include('admin._components.buttons.edit', ['action' => 'Admin\SitesController@edit', 'site_id' => $site->id, 'id' => $site->id])
                    @include('admin._components.buttons.delete', ['controller' => 'Admin\SitesController','site_id' => $site->id , 'id' => $site->id])
                </div>
            </div>
        </div>
    </div>
@endsection
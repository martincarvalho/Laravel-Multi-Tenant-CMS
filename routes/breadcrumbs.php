<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('home'));
});

// Home > Sites
Breadcrumbs::register('sites.index', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Sites', route('sites.index'));
});

// Home > Sites > [Site]
Breadcrumbs::register('sites.show', function($breadcrumbs, $site)
{
    $breadcrumbs->parent('sites.index');
    $breadcrumbs->push(strip_tags($site->title), route('sites.show', $site->id));
});

// Home > Sites > [Site] > Edit
Breadcrumbs::register('sites.edit', function($breadcrumbs, $site)
{
    $breadcrumbs->parent('sites.index');
    $breadcrumbs->push(strip_tags($site->title), route('sites.edit', $site->id));
});

// Home > Sites > Create
Breadcrumbs::register('sites.create', function($breadcrumbs)
{
    $breadcrumbs->parent('sites.index');
    $breadcrumbs->push('Criar Site', route('sites.create'));
});

// Home > Users
Breadcrumbs::register('users.index', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Usuários', route('users.index'));
});

// Home > Users > [User] > Edit
Breadcrumbs::register('users.edit', function($breadcrumbs, $user)
{
    $breadcrumbs->parent('users.index');
    $breadcrumbs->push($user->name, route('users.edit', $user->id));
});

// Home > Users > Create
Breadcrumbs::register('users.create', function($breadcrumbs)
{
    $breadcrumbs->parent('users.index');
    $breadcrumbs->push('Criar Usuário', route('users.create'));
});

// Home > [Site] > Categories
Breadcrumbs::register('sites.categories.index', function($breadcrumbs, $site)
{
    $breadcrumbs->parent('sites.show', $site);
    $breadcrumbs->push('Categorias', route('sites.categories.index', $site->id));
});

// Home > [Site] > Categories > [Category] > Edit
Breadcrumbs::register('sites.categories.edit', function($breadcrumbs, $site, $category)
{
    $breadcrumbs->parent('sites.categories.index', $site);
    $breadcrumbs->push(strip_tags($category->title), route('sites.categories.edit', [$site->id, $category->id]));
});

// Home > [Site] > Categories > Create
Breadcrumbs::register('sites.categories.create', function($breadcrumbs, $site)
{
    $breadcrumbs->parent('sites.categories.index', $site);
    $breadcrumbs->push('Criar Categoria', route('sites.categories.create', $site->id));
});

// Home > [Site] > Posts
Breadcrumbs::register('sites.posts.index', function($breadcrumbs, $site)
{
    $breadcrumbs->parent('sites.show', $site);
    $breadcrumbs->push('Posts', route('sites.posts.index', $site->id));
});

// Home > [Site] > Posts > [Category] > Edit
Breadcrumbs::register('sites.posts.edit', function($breadcrumbs, $site, $post)
{
    $breadcrumbs->parent('sites.posts.index', $site);
    $breadcrumbs->push(strip_tags($post->title), route('sites.posts.edit', [$site->id, $post->id]));
});

// Home > [Site] > Posts > Create
Breadcrumbs::register('sites.posts.create', function($breadcrumbs, $site)
{
    $breadcrumbs->parent('sites.posts.index', $site);
    $breadcrumbs->push('Criar Post', route('sites.posts.create', $site->id));
});

// Home > [Site] > Posts > [Post]
Breadcrumbs::register('sites.posts.show', function($breadcrumbs, $site, $post)
{
    $breadcrumbs->parent('sites.posts.index', $site);
    $breadcrumbs->push(strip_tags($post->title), route('sites.posts.show', [$site->id, $post->id]));
});

// Home > [Site] > Pages
Breadcrumbs::register('sites.pages.index', function($breadcrumbs, $site)
{
    $breadcrumbs->parent('sites.show', $site);
    $breadcrumbs->push('Páginas', route('sites.pages.index', $site->id));
});

// Home > [Site] > Pages > [Category] > Edit
Breadcrumbs::register('sites.pages.edit', function($breadcrumbs, $site, $page)
{
    $breadcrumbs->parent('sites.pages.index', $site);
    $breadcrumbs->push(strip_tags($page->title), route('sites.pages.edit', [$site->id, $page->id]));
});

// Home > [Site] > Pages > Create
Breadcrumbs::register('sites.pages.create', function($breadcrumbs, $site)
{
    $breadcrumbs->parent('sites.pages.index', $site);
    $breadcrumbs->push('Criar Página', route('sites.pages.create', $site->id));
});

// Home > [Site] > Pages > [Page]
Breadcrumbs::register('sites.pages.show', function($breadcrumbs, $site, $page)
{
    $breadcrumbs->parent('sites.pages.index', $site);
    $breadcrumbs->push(strip_tags($page->title), route('sites.pages.show', [$site->id, $page->id]));
});

// Home > [Site] > Slides
Breadcrumbs::register('sites.slides.index', function($breadcrumbs, $site)
{
    $breadcrumbs->parent('sites.show', $site);
    $breadcrumbs->push('Slides', route('sites.slides.index', $site->id));
});

// Home > [Site] > Slides > [Category] > Edit
Breadcrumbs::register('sites.slides.edit', function($breadcrumbs, $site, $slide)
{
    $breadcrumbs->parent('sites.slides.index', $site);
    $breadcrumbs->push(strip_tags($slide->title), route('sites.slides.edit', [$site->id, $slide->id]));
});

// Home > [Site] > Slides > Create
Breadcrumbs::register('sites.slides.create', function($breadcrumbs, $site)
{
    $breadcrumbs->parent('sites.slides.index', $site);
    $breadcrumbs->push('Criar Slide', route('sites.slides.create', $site->id));
});

// Home > [Site] > Slides > [Slide]
Breadcrumbs::register('sites.slides.show', function($breadcrumbs, $site, $slide)
{
    $breadcrumbs->parent('sites.slides.index', $site);
    $breadcrumbs->push(strip_tags($slide->title), route('sites.slides.show', [$site->id, $slide->id]));
});

// Home > [Site] > Areas
Breadcrumbs::register('sites.areas.index', function($breadcrumbs, $site)
{
    $breadcrumbs->parent('sites.show', $site);
    $breadcrumbs->push('Áreas', route('sites.areas.index', $site->id));
});

// Home > [Site] > Areas > Create
Breadcrumbs::register('sites.areas.create', function($breadcrumbs, $site)
{
    $breadcrumbs->parent('sites.areas.index', $site);
    $breadcrumbs->push('Criar Área', route('sites.areas.create', $site->id));
});

// Home > [Site] > [Area] > Edit
Breadcrumbs::register('sites.areas.edit', function($breadcrumbs, $site, $slide)
{
    $breadcrumbs->parent('sites.areas.index', $site);
    $breadcrumbs->push(strip_tags($slide->title), route('sites.areas.edit', [$site->id, $slide->id]));
});

// Home > [Site] > [Area]
Breadcrumbs::register('sites.areas.show', function($breadcrumbs, $site, $area)
{
    $breadcrumbs->parent('sites.areas.index', $site);
    $breadcrumbs->push(strip_tags($area->title), route('sites.areas.show', [$site->id, $area->id]));
});

// Home > [Site] > [Area] > [Custom Page] > Edit
Breadcrumbs::register('sites.areas.customPages.edit', function($breadcrumbs, $site, $area, $customPage)
{
    $breadcrumbs->parent('sites.areas.show', $site, $area);
    $breadcrumbs->push('Editar Página', route('sites.areas.customPages.edit', [$site->id, $area->id, $customPage->id]));
});

// Home > [Site] > [Area] > [Custom Page] > Create
Breadcrumbs::register('sites.areas.customPages.create', function($breadcrumbs, $site, $area)
{
    $breadcrumbs->parent('sites.areas.show', $site, $area);
    $breadcrumbs->push('Criar Página', route('sites.areas.customPages.create', [$site->id, $area->id]));
});

// Home > [Site] > [Area] > [Custom Page]
Breadcrumbs::register('sites.areas.customPages.show', function($breadcrumbs, $site, $area, $customPage)
{
    $breadcrumbs->parent('sites.areas.show', $site, $area);
    $breadcrumbs->push(strip_tags($customPage->title), route('sites.areas.customPages.show', [$site->id, $area->id, $customPage->id]));
});



?>

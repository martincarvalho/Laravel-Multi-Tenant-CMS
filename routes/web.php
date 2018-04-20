<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Versão para produção:
// Route::group(['domain' => 'admin.sample_site.com.br', 'middleware' => 'auth', 'namespace' => 'Admin'], function () {

Route::group(['domain' => 'www.cmsadmin.dev', 'middleware' => 'auth', 'namespace' => 'Admin'], function () {

    Route::get('/', function () {
        $sites = App\Site::all();
        return view('admin.painel', compact('sites'));
    })->name('home');

    Route::model('slide', 'App\Slide');
    Route::resource('sites.slides', 'SlidesController');

    Route::model('page', 'App\Page');
    Route::resource('sites.pages', 'PagesController');

    Route::model('post', 'App\Post');
    Route::resource('sites.posts', 'PostsController');

    Route::model('category', 'App\Category');
    Route::resource('sites.categories', 'CategoriesController');

    Route::model('area', 'App\Area');
    Route::resource('sites.areas', 'AreasController');

    Route::model('customPage', 'App\CustomPage');
    Route::resource('sites.areas.customPages', 'CustomPagesController');

    Route::model('site', 'App\Site');
    Route::resource('sites', 'SitesController');

    Route::model('user', 'App\User');
    Route::resource('users', 'UsersController');

    Route::get('{site_slug}/images/{postOrPage}/{filename}', 'FilesController@serveImage');


});
Route::auth();

// Versão para produção
// Route::group(['domain' => 'www.{siteurl}.com.br', 'namespace' => 'Sites'], function ($siteurl) {

Route::group(['domain' => 'www.{siteurl}.dev', 'namespace' => 'Sites'], function ($siteurl) {

    Route::get('/', 'sample_siteController@home', $siteurl);

    Route::get('/sobre', 'sample_siteController@sobre', $siteurl);

    Route::get('/vantagens', 'sample_siteController@vantagens', $siteurl);

    Route::get('/como-funciona', 'sample_siteController@comoFunciona', $siteurl);

    Route::get('/area-do-cliente', 'sample_siteController@areaDoCliente', $siteurl);

    Route::get('/contato', 'sample_siteController@contato', $siteurl);

    Route::get('/peca-o-seu', 'sample_siteController@pecaOSeu', $siteurl);

    Route::post('/peca-o-seu', '\App\Http\Controllers\Admin\FormsController@sendPecaOSeuMail', $siteurl)->name('peca-o-seu');

    Route::post('/contato', '\App\Http\Controllers\Admin\FormsController@sendContactMail', $siteurl)->name('contact');

    Route::post('/saldo', 'sample_siteController@retrieveSaldo')->name('retrieveSaldo');

    Route::post('/credenciados', 'sample_siteController@retrieveCredenciados')->name('retrieveCredenciados');
});




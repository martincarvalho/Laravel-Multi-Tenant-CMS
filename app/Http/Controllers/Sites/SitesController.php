<?php

namespace App\Http\Controllers\Sites;

use App\Site;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class SitesController extends Controller
{
    public function home($siteurl)
    {
        $site = Site::with(['pages', 'slides'])->whereFolder($siteurl)->firstOrFail();
        $box1 = $site->pages()->whereTag('home_box1')->firstOrFail();
        $box2 = $site->pages()->whereTag('home_box2')->firstOrFail();
        $box3 = $site->pages()->whereTag('home_box3')->firstOrFail();
        $box4 = $site->pages()->whereTag('home_box4')->firstOrFail();
        $boxprincipal = $site->pages()->whereTag('home_principal')->firstOrFail();
        return view($siteurl . '.home', compact('site', 'box1', 'box2', 'box3', 'box4', 'boxprincipal'));
    }

    public function showSobre($siteurl)
    {
        $site = Site::with(['pages'])->whereFolder($siteurl)->firstOrFail();
        $sobre_principal = $site->pages()->whereTag('sobre_principal')->firstOrFail();
        $sobre_title = $site->pages()->whereTag('sobre_title')->firstOrFail();
        $sobre_video = $site->pages()->whereTag('sobre_video')->firstOrFail();
        return view($siteurl . '.sobre', compact('site', 'sobre_principal', 'sobre_video', 'sobre_title'));
    }

    public function showVantagens($siteurl)
    {
        $site = Site::with(['pages', 'products'])->whereFolder($siteurl)->firstOrFail();
        $vantagens_title = $site->pages()->whereTag('vantagens_title')->firstOrFail();
        $vantagens_depoimento = $site->pages()->whereTag('vantagens_depoimento')->firstOrFail();
        return view($siteurl . '.vantagens', compact('site', 'vantagens_title', 'vantagens_depoimento'));
    }

    public function showComoFunciona($siteurl)
    {
        $site = Site::with(['pages', 'services'])->whereFolder($siteurl)->firstOrFail();
        $como_funciona_title = $site->pages()->whereTag('como_funciona_title')->firstOrFail();
        return view($siteurl . '.como_funciona', compact('site', 'como_funciona_title', 'como_funciona_depoimento'));
    }

}

<?php

namespace App\Http\Controllers\Sites;

use App\Area;
use App\CustomPage;
use App\Page;
use App\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;

class sample_siteController extends Controller
{
    protected $soapUrl = "http://webservice.sample_site.com.br:8088/kswebservice.asmx?WSDL";

    public function __construct()
    {
        ini_set("soap.wsdl_cache_enabled", "0");
    }

    public function home($siteurl)
    {

        $site = Site::with(['slides'])->whereFolder($siteurl)->firstOrFail();
        $box1 = CustomPage::whereTag('home_box1')->firstOrFail();
        $box2 = CustomPage::whereTag('home_box2')->firstOrFail();
        $box3 = CustomPage::whereTag('home_box3')->firstOrFail();
        $box4 = CustomPage::whereTag('home_box4')->firstOrFail();
        $home = Page::whereTag('home')->firstOrFail();
        return view($siteurl . '.home', compact('home', 'site', 'box1', 'box2', 'box3', 'box4'));
    }

    public function sobre($siteurl)
    {
        $site = Site::whereFolder($siteurl)->firstOrFail();
        $header = CustomPage::whereTag('header_sobre')->firstOrFail();
        $video = CustomPage::whereTag('sobre_video')->firstOrFail();
        $sobre = Page::whereTag('sobre')->firstOrFail();
        return view($siteurl . '.sobre', compact('sobre', 'site', 'header', 'video'));
    }

    public function vantagens($siteurl)
    {
        $site = Site::whereFolder($siteurl)->firstOrFail();
        $header = CustomPage::whereTag('header_vantagens')->firstOrFail();
        $vantagens = Area::whereTitle('vantagens')->firstOrFail();
        $depoimento = CustomPage::whereTag('vantagens_depoimento')->firstOrFail();
        return view($siteurl . '.vantagens', compact('vantagens', 'site', 'header', 'depoimento'));
    }

    public function comoFunciona($siteurl)
    {
        $site = Site::whereFolder($siteurl)->firstOrFail();
        $header = CustomPage::whereTag('header_como_funciona')->firstOrFail();
        $como_funciona = Area::whereTitle('Como Funciona')->firstOrFail();
        $perguntas_frequentes = Area::whereTitle('Perguntas Frequentes')->firstOrFail();
        return view($siteurl . '.como-funciona', compact('como_funciona', 'site', 'header', 'perguntas_frequentes'));
    }

    public function areaDoCliente($siteurl)
    {
        $site = Site::whereFolder($siteurl)->firstOrFail();
        $header = CustomPage::whereTag('header_area_do_cliente')->firstOrFail();
        $soap = $this->instantiateSoapClient();
        $especialidades = $soap->GetEspecialidades();
        $especialidades = $especialidades->xml->especialidades->Especialidade;
//        dd($especialidades);
        return view($siteurl . '.area-do-cliente', compact('site', 'header','especialidades'));
    }

    public function contato($siteurl)
    {
        $site = Site::whereFolder($siteurl)->firstOrFail();
        $header = CustomPage::whereTag('header_contato')->firstOrFail();
        return view($siteurl . '.contato', compact('site', 'header'));
    }

    public function pecaOSeu($siteurl)
    {
        $site = Site::whereFolder($siteurl)->firstOrFail();
        $header = CustomPage::whereTag('header_peca_o_seu')->firstOrFail();
        return view($siteurl . '.peca-o-seu', compact('site', 'header'));
    }

    public function retrieveSaldo(Request $request)
    {
        $soap = $this->instantiateSoapClient();

        $options = ['NumeroCartao' => $request->numCartao, 'CVV' => $request->codSeguranca];
        $saldo = $soap->GetSaldo($options);
        if(!$saldo->xml->saldo->resultado){
            return redirect('/area-do-cliente')->with('error', 'Não foi possível realizar a consulta. Por favor verifique os dados inseridos.');
        }
        return redirect('/area-do-cliente')->with('saldo', $saldo->xml->saldo);
    }

    public function retrieveCredenciados(Request $request)
    {
        $soap = $this->instantiateSoapClient();
        ($request->especialidade != '0' ? $termo = $request->especialidade : $termo = htmlentities($request->termo));
        $result = $soap->GetCredenciados(['termobusca' => $termo]);
        $credenciados = $result->xml->credenciados;

        if(!isset($credenciados->Credenciado)) {
            return redirect('/area-do-cliente')->with('error', 'Não há nenhum credenciado com o termo pesquisado.');
        }

        // Check if the result is an array of objects and if it´s not, make one so that the view can perform a foreach
        if(!is_array($result->xml->credenciados->Credenciado)){
            $credenciados->Credenciado = [ 0 => $result->xml->credenciados->Credenciado ];
        }
        return redirect('/area-do-cliente')->with(['credenciados' => $credenciados, 'termo' => $termo]);
    }

    public function instantiateSoapClient()
    {
        return new \SoapClient($this->soapUrl);
    }
}

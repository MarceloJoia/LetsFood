<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $plans = Plan::with('details')->orderBy('price', 'ASC')->get();

        return view('site.pages.home.index', [
            'plans' => $plans,
        ]);
    }

    /**
     * Cria uma sessão para cadastro de um tenant
     */
    public function plan($url)
    {
        if(!$plan = Plan::where('url', $url)->first()){
            return redirect()->back();
        }

        // Criar uma sessão com esse plano
        session()->put('plan', $plan); //Coloca o objeto inteiro de Plano.

        return redirect()->route('register');//Redireciona para a rota registro.
    }
}

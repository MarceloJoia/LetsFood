<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateDatailPlan;
use App\Models\DetailPlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class DetailPlanController extends Controller
{
    protected $repository, $plan;

    public function __construct(DetailPlan $detailPlan, Plan $plan )
    {
        $this->repository = $detailPlan;
        $this->plan = $plan;

        $this->middleware('can:plans');
    }

    public function index($urlPlan)
    {
        if (!$plan = $this->plan->where('url', $urlPlan)->first()){
            return redirect()->back();
        }

        $details = $plan->details()->paginate();

        return view('admin.pages.plans.details.index', [
            'plan' => $plan,
            'details' => $details,
        ]);
    }

    /**
     * Criar um novo detalhe de plano
     */
    public function create($urlPlan)
    {
        if (!$plan = $this->plan->where('url', $urlPlan)->first()){
            return redirect()->back();
        }

        return view('admin.pages.plans.details.create', [
            'plan' => $plan,
        ]);
    }

    public function store(StoreUpdateDatailPlan $request, $urlPlan)
    {
        if(!$plan = $this->plan->where('url',  $urlPlan)->first()){
            return redirect()->back();
        }

        $plan->details()->create($request->all());

        return redirect()->route('plans.details.index', $plan->url);
    }


    /**
     * Mostrar os detalhes de plano
     */
    public function show($urlPlan, $idDetail)
    {
        $plan = $this->plan->where('url', $urlPlan)->first();

        $detail = $this->repository->find($idDetail);


        if (!$plan || !$detail){
            return redirect()->back();
        }

        return view('admin.pages.plans.details.show', [
            'plan' => $plan,
            'detail' => $detail,
        ]);
    }

    /**
     * Edit detalhes
     */
    public function edit($urlPlan, $idDetail)
    {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find($idDetail);

        if(!$plan || !$detail){
            return redirect()->back();
        }

        return view('admin.pages.plans.details.edit', [
            'plan' => $plan,
            'detail' => $detail,
        ]);
    }

    public function update(StoreUpdateDatailPlan $request,  $urlPlan, $idDetail)
    {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find($idDetail);

        if(!$plan || !$detail){
            return redirect()->back();
        }

        $detail->update($request->all());

        return redirect()->route('plans.details.index', $plan->url);
    }

    /**
     * Delete details Plan
     */
    public function destroy($urlPlan, $idDetail)
    {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find($idDetail);

        if(!$plan || !$detail){
            return redirect()->back();
        }

        $detail->delete();

        return redirect()
                    ->route('plans.details.index', $plan->url)
                    ->with('message','Registro deletado com sucesso!');
    }
}

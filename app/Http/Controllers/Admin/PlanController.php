<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    private $repository;
    public function __construct(Plan $plan)
    {
        $this->repository = $plan;

        $this->middleware('can:plans');
    }

    public function index()
    {
        $plans = $this->repository->latest()->paginate(10);

        return view('admin.pages.plans.index', [
            'plans' => $plans,
        ]);
    }

    public function create()
    {
        return view('admin.pages.plans.create');
    }

    public function store(StoreUpdatePlan $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('plans.index');
    }

    public function show($url)
    {
        if(!$plan = $this->repository->where('url', $url)->first()){
            return redirect()->back();
        }

        return view('admin.pages.plans.show', compact('plan'));
    }


    public function edit($url)
    {
        if(!$plan = $this->repository->where('url', $url)->first()){
            return redirect()->back();
        }

        return view('admin.pages.plans.edit', [
            'plan' => $plan,
        ]);
    }

    public function update(StoreUpdatePlan $request, $url)
    {
        if(!$plan = $this->repository->where('url', $url)->first()){
            return redirect()->back();
        }

        $plan->update($request->all());

        return redirect()->route('plans.show', $plan->url);
    }


    public function destroy($url)
    {
        if (!$plan = $this->repository
                    ->with('details')
                    ->where('url', $url)->first()){
            return redirect()->back();
        }

        if ($plan->details->count() > 0){
            return redirect()->back()
                             ->with('error', 'Existem detalhes vinculados a esse plano, primeiro delete os Detalhes e depois deleto o Plano');
        }

        $plan->delete();

        return redirect()->route('plans.index');
    }

    /**
     * Method Search Plans
     */
    public function search(Request $request)
    {
        $filters = $request->except('_token'); // Trabalhar com array

        $plans = $this->repository->search($request->filter);

        return view('admin.pages.plans.index', [
            'plans' => $plans,
            'filters' => $filters,
        ]);
    }
}

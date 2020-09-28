<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Profile;
use Illuminate\Http\Request;

class PlanProfileController extends Controller
{
    protected $plan, $profile;

    public function __construct(Plan $plan, Profile $profile)
    {
        $this->plan = $plan;
        $this->profile = $profile;
    }

    /**
     * Show profiles
     */
    public function profiles($idPlan)
    {
        if(!$plan = $this->plan->find($idPlan)){
            return redirect()->back();
        }

        $profiles = $plan->profiles()->paginate();

        return view('admin.pages.plans.profiles.profiles', compact('plan','profiles'));
    }

    /**
     * Show plan
     */
    public function plans($idProfile)
    {
        if(!$profile = $this->profile->find($idProfile)){
            return redirect()->back();
        }

        $plans = $profile->plans()->paginate();

        return view('admin.pages.profiles.plans.plans', compact('profile','plans'));
    }


    /**
     * atrelar as permições aos perfis
     */
    public function profilesAvailable(Request $request, $idPlan)
    {
        if(!$plan = $this->plan->find($idPlan)){
            return redirect()->back();
        }

        // Search profiles
        $filters = $request->except('_token');

        $profiles = $plan->profilesAvailable($request->filter);

        return view('admin.pages.plans.profiles.available', compact('plan', 'profiles', 'filters'));
    }

    public function attachPlanProfile(Request $request, $idPlan)
    {
        if(!$plan = $this->plan->find($idPlan)){
            return redirect()->back();
        }

        if(!$request->profiles || count($request->profiles) == 0){
            return redirect()
                    ->back()
                    ->with('warning', 'Escolha um tipo de permissão.');
        }

        $plan->profiles()->attach($request->profiles);

        return redirect()->route('plans.profiles', $plan->id);
    }

    /**
     * Detach profile plan
     */
    public function detachPlanProfile($idPlan, $idProfile)
    {
        $plans = $this->plan->find($idPlan);
        $profile = $this->profile->find($idProfile);

        if(!$plans || !$profile){
            return redirect()->back();
        }

        $plans->profiles()->detach($profile);

        return redirect()->route('profiles.plans', $profile->id);
    }
}

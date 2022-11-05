<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use App\Models\Campaign;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $allCampaigns = Campaign::get();
        $firtsCampaigns = Campaign::first()
            ->take(8)
            ->get();

        return view('home')
            ->with([
                'allCampaigns' => $allCampaigns,
                'firtsCampaigns' => $firtsCampaigns
            ]);
    }

    public function campaign(Request $request) {

        $administrator = Administrator::get()->first();

        $administrator->current_campaign = $request->campaign_id;

        $administrator->save();

        return view('campaigns.form');
    }
}

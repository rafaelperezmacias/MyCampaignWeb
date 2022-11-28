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

        // Campaña actual
        // TODO: Cuando se implemente la autentificacion cambiar este code
        $currentAdministrator = Administrator::get()->first();

        $allCampaigns = $currentAdministrator->campaigns;

        $firtsCampaigns = $currentAdministrator->campaigns
            ->take(8);

        $campaing = null;

        if ( isset($currentAdministrator->currentCampaign) ) {
            $campaing = $currentAdministrator->currentCampaign
                ->loadCount([
                    'sympathizers',
                    'administrators',
                    'volunteers'
                ]);
        }

        return view('home')
            ->with([
                'allCampaigns' => $allCampaigns,
                'firtsCampaigns' => $firtsCampaigns,
                'campaign' => $campaing,
                'currentAdministrator' => $currentAdministrator
            ]);
    }

    public function campaign(Request $request) {

        $administrator = Administrator::get()->first();
        $administrator->current_campaign = $request->campaign_id;
        $administrator->save();

        return redirect()->route('campaigns.show', $administrator->currentCampaign)
            ->with([
                'campaign' => $administrator->currentCampaign,
            ]);
    }

}

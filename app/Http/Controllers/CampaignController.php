<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $campaigns = Campaign::get();

        return view('campaigns.index')
            ->with([
                'campaigns' => $campaigns
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('campaigns.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // Validaciones
        /* $request->validate([
            'name'           => ['required', 'string', 'max:100', 'min:1'],
            'party'          => ['required', 'string', 'max:100', 'min:1'],
            'start_date'     => ['required', 'string', 'max:30', 'min:8'],
            'end_date'       => ['gt:0'],
            'description'    => ['gt:0'],
        ]); */

        // Insertar el id del administrador logueado
        $request->merge([
            'owner' => 1
        ]);

        $campaign = Campaign::create( $request->all() );

        $campaign->administrators()->attach(1);

        return redirect()->route('campaigns.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function show(Campaign $campaign)
    {
        return view('campaigns/show', compact('campaign'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function edit(Campaign $campaign)
    {
        return view('campaigns.form', compact('campaign'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campaign $campaign)
    {
        Campaign::where('id', $campaign->id)->update($request->except('_token', '_method'));
        return redirect()->route('campaigns.show', [$campaign])->with(['mensaje' => 'Campaña actualizada', 'alert-type' => 'alert-success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campaign $campaign)
    {
        //
    }
}

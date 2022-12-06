<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
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
        $request->validate([
            'name'           => ['required', 'string', 'max:50'],
            'party'          => ['required', 'string', 'max:50'],
            'end_date'       => ['required', 'date'],
            'start_date'     => ['required', 'date', 'before:end_date'],
            'description'    => ['nullable', 'string', 'max:1024'],
        ]);

        $administrator = Administrator::get()->first();

        $campaign = Campaign::create( $request->all() );

        $campaign->administrators()->attach($administrator->id);

        $administrator->current_campaign = $campaign->id;
        $administrator->save();

        return redirect()->route('campaigns.show', [$campaign]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function show(Campaign $campaign)
    {
        return view('campaigns.show', compact('campaign'));
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
        return redirect()->route('home.index', [$campaign])->with(['mensaje' => 'Campaña actualizada', 'alert-type' => 'success']);;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campaign $campaign)
    {
        $campaign->delete();
        return redirect()->route('home.index')->with(['mensaje' => 'Campaña eliminada', 'alert-type' => 'error']);
    }
}

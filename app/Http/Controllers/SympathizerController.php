<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use App\Models\Sympathizer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Facades\DB;

class SympathizerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $currentAdministrator = Administrator::get()->first();

        $sympathizers = Sympathizer::whereRelation('campaigns','campaign_id', $currentAdministrator->currentCampaign->id)->with([
            'user' => function (MorphOne $morphTo) {
                $morphTo->morphMap([
                    User::class => ['user']
                ]);
            }
        ])->get();

        return view('sympathizers.index')
            ->with([
                'sympathizers' => $sympathizers,
                'campaign' => $currentAdministrator->currentCampaign,
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
        $currentAdministrator = Administrator::get()->first();

        return view('sympathizers.form')
            ->with([
                'campaign' => $currentAdministrator->currentCampaign,
            ]);
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

        $sympathizer = Sympathizer::create([
            'name' => $request->name
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => $request->password,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'userable_id' => $sympathizer->id,
            'userable_type' => 'App\Models\Sympathizer'
        ]);

        $sympathizer->campaigns()->attach(1);

        $currentAdministrator = Administrator::get()->first();

        return redirect()->route('sympathizers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sympathizer  $sympathizer
     * @return \Illuminate\Http\Response
     */
    public function show(Sympathizer $sympathizer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sympathizer  $sympathizer
     * @return \Illuminate\Http\Response
     */
    public function edit(Sympathizer $sympathizer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sympathizer  $sympathizer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sympathizer $sympathizer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sympathizer  $sympathizer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sympathizer $sympathizer)
    {
        //
    }
}

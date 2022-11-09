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

        $currentAdministrator = Administrator::get()->first();

        $sympathizer->campaigns()->attach($currentAdministrator->currentCampaign->id);

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
        return view('sympathizers.show', compact('sympathizer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sympathizer  $sympathizer
     * @return \Illuminate\Http\Response
     */
    public function edit(Sympathizer $sympathizer)
    {
        return view('sympathizers.form', compact('sympathizer'));
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
        Sympathizer::where('id', $sympathizer->id)->update($request->only('name'));
        User::where('id', $sympathizer->user->id)->update($request->only('email', 'password'));

        // Campaña actual
        // TODO: Cuando se implemente la autentificacion cambiar este code
        $administrator = Administrator::get()->first();

        return redirect()->route('sympathizers.show', [$sympathizer])
        ->with([
            'mensaje' => 'Simpatizante actualizado', 'alert-type' => 'success',
            'campaign' => $administrator->currentCampaign,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sympathizer  $sympathizer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sympathizer $sympathizer)
    {
        $sympathizer->delete();
        return redirect()->route('sympathizers.index')->with(['mensaje' => 'Simpatizante eliminado', 'alert-type' => 'warning']);
    }
}

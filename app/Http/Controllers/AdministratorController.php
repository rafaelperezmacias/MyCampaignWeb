<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class AdministratorController extends Controller
{
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
        $administrator = Administrator::get()->first();

        $administrators = $administrator->currentCampaign->administrators;

        return view('administrators.index')
            ->with([
                'administrators' => $administrators,
                'campaign' => $administrator->currentCampaign,
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

        // Campaña actual
        // TODO: Cuando se implemente la autentificacion cambiar este code
        $administrator = Administrator::get()->first();

        return view('administrators.form')
            ->with([
                'campaign' => $administrator->currentCampaign
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

        // Campaña actual
        // TODO: Cuando se implemente la autentificacion cambiar este code
        $currentAdministrator = Administrator::get()->first();

        $administrator = Administrator::create([
            'name' => $request->name
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => $request->password,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'userable_id' => $administrator->id,
            'userable_type' => 'App\Models\Administrator'
        ]);

        $administrator->campaigns()->attach($currentAdministrator->currentCampaign->id);

        return redirect()->route('administrators.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function show(Administrator $administrator)
    {
        //

        // Campaña actual
        // TODO: Cuando se implemente la autentificacion cambiar este code
        $currentAdministrator = Administrator::get()->first();

        return view('administrators.show')
            ->with([
                'campaign' => $currentAdministrator->currentCampaign,
                'administrator' => $administrator,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function edit(Administrator $administrator)
    {
        //

        // Campaña actual
        // TODO: Cuando se implemente la autentificacion cambiar este code
        $administrator = Administrator::get()->first();

        return view('administrators.form')
            ->with([
                'campaign' => $administrator->currentCampaign,
                'administrator' => $administrator
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Administrator $administrator)
    {
        //
        Administrator::where('id', $administrator->id)->update($request->only('name'));
        User::where('id', $administrator->user->id)->update($request->only('email', 'password'));

        // Campaña actual
        // TODO: Cuando se implemente la autentificacion cambiar este code
        $administrator = Administrator::get()->first();

        return redirect()->route('administrators.show', [$administrator])
            ->with([
                'campaign' => $administrator->currentCampaign,
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Administrator $administrator)
    {
        //
    }
}

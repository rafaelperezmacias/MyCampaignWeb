<?php

namespace App\Http\Controllers;

use App\Models\Sympathizer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\MorphOne;

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
        $sympathizers = Sympathizer::query()->with([
            'user' => function (MorphOne $morphTo) {
                $morphTo->morphMap([
                    User::class => ['user']
                ]);
            }
        ])->get();
        return view('sympathizers.index')
            ->with([
                'sympathizers' => $sympathizers
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
        return view('sympathizers.form');
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

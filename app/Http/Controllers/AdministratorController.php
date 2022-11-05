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
        $administrators = Administrator::query()->with([
            'user' => function (MorphOne $morphTo) {
                $morphTo->morphMap([
                    User::class => ['user']
                ]);
            }
        ])->get();
        return view('administrators.index')
            ->with([
                'administrators' => $administrators
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
        return view('administrators.form');
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

        $administrator->campaigns()->attach(1);

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

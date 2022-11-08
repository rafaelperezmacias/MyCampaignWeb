<?php

namespace App\Http\Controllers;

use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $volunteers = Volunteer::get();

        return view('volunteers.index')
            ->with([
                'volunteers' => $volunteers
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function show(Volunteer $volunteer)
    {
        $section=DB::table('sections')->where('id', $volunteer->section_id)->first();
        $address=DB::table('addresses')->where('volunteer_id', $volunteer->id)->first();
        $auxVolunteer=DB::table('aux_volunteers')->where('volunteer_id', $volunteer->id)->first();
        $municipality=DB::table('municipalities')->where('id', $section->municipality_id)->first();
        $federalDistrict=DB::table('federal_districts')->where('id', $section->federal_district_id)->first();
        $localDistrict=DB::table('local_districts')->where('id', $section->local_district_id)->first();
        $state=DB::table('states')->where('id', $section->state_id)->first();

        return view('volunteers.show')
        ->with(compact('volunteer'))
        ->with(compact('address'))
        ->with(compact('section'))
        ->with(compact('auxVolunteer'))
        ->with(compact('municipality'))
        ->with(compact('federalDistrict'))
        ->with(compact('localDistrict'))
        ->with(compact('state'));

        //return view('volunteers.show', compact('volunteer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function edit(Volunteer $volunteer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Volunteer $volunteer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Volunteer $volunteer)
    {
        //
    }
}

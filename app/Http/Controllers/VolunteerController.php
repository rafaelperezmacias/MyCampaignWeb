<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\VolunteerExport;
use Maatwebsite\Excel\Facades\Excel;

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
        $currentAdministrator = Administrator::get()->first();

        $volunteers = Volunteer::whereRelation('campaign','campaign_id', $currentAdministrator->currentCampaign->id)->with([
            'address',
            'auxVolunteer',
            'section.state',
            'section.federalDistrict',
            'section.localDistrict',
            'section.municipality',
            'sympathizer'
        ])->get();

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
        return view('volunteers.show', compact('volunteer'));
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
        $volunteer->delete();
        return redirect()->route('volunteers.index')->with(['mensaje' => 'Voluntario eliminado', 'alert-type' => 'success']);

    }

    public function exportToExcel()
    {
        return Excel::download(new VolunteerExport, 'volunteers.xlsx');
    }
}

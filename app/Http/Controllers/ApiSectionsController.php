<?php

namespace App\Http\Controllers;

use App\Models\FederalDistrict;
use App\Models\LocalDistrict;
use App\Models\Municipality;
use App\Models\Section;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class ApiSectionsController extends Controller
{
    //

    public function sections(Request $request)
    {
        //
        $federalDistricts = FederalDistrict::whereHas('section', function (Builder $query) {
            $query->where('state_id', '=', 14);
        })->get();
        $localDistricts = LocalDistrict::whereHas('section', function (Builder $query) {
            $query->where('state_id', '=', 14);
        })->get();
        $municipalities = Municipality::whereHas('section', function (Builder $query) {
            $query->where('state_id', '=', 14);
        })->get();
        $sections = Section::whereRelation('state', 'state_id', 14)->get();
        $states = State::all();

        dd($sections);

        return response()->json([
            'code' => '200',
            'federal_districts' => $federalDistricts,
            'local_districts' => $localDistricts,
            'municipalities' => $municipalities,
            'sections' => $sections,
            'states' => $states
        ]);
    }
}

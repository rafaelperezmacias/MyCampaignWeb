<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\AuxVolunteer;
use App\Models\FederalDistrict;
use App\Models\LocalDistrict;
use App\Models\Municipality;
use App\Models\Section;
use App\Models\State;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ApiMobileController extends Controller
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
        $sections = Section::whereRelation('state', 'state_id', 14)
                        ->where('new', null)
                        ->get();
        $states = State::all();

        return response()->json([
            'code' => '200',
            'state' => [
                'id' => 14,
                'name' => "JALISCO",
                'federal_districts' => $federalDistricts,
                'local_districts' => $localDistricts,
                'municipalities' => $municipalities,
                'sections' => $sections,
            ],
            'states' => $states
        ]);
    }

    public function volunteer(Request $request) {
        $newVolunteer = $request->input('volunteer');
        $newBirthdate = $request->input('volunteer.birthdate');
        $newSection = $request->input('volunteer.section');
        $newAddress = $request->input('volunteer.address');
        $newState = $request->input('volunteer.section.state');
        $newMunicipality = $request->input('volunteer.section.municipality');
        $newLocalDistrict = $request->input('volunteer.section.localDistrict');
        $newFederalDistrict = $request->input('volunteer.section.federalDistrict');
        $campaign = $request->input('campaign');
        $sympathizer = $request->input('sympathizer');

        // Estado
        $state = State::where('id', $newState['id'])->first();
        if ( $state == null ) {
            return response()->json([
                'success' => false,
                'errors' => [
                    'state' => [
                        'id' => 'invalid',
                    ]
                ],
            ]);
        } else if ( $state->name != $newState['name'] ) {
            return response()->json([
                'success' => false,
                'errors' => [
                    'state' => [
                        'name' => 'invalid',
                        'value_name' => $state->name,
                    ]
                ],
            ]);
        }
        // Municipio
        $municipalityError = null;
        $municipality = null;
        if ( $newMunicipality['id'] == 0 ) {
            $municipality = Municipality::where('number', $newMunicipality['number'])
                                ->where('name', $newMunicipality['name'])
                                ->whereRelation('section', 'state_id', $newMunicipality['stateId'])
                                ->first();
            if ( $municipality == null ) {
                $municipality = Municipality::where('number', $newMunicipality['number'])
                                ->whereRelation('section', 'state_id', $newMunicipality['stateId'])
                                ->first();
                if ( $municipality == null ) {
                    $municipality = Municipality::where('name', $newMunicipality['name'])
                                    ->whereRelation('section', 'state_id', $newMunicipality['stateId'])
                                    ->first();
                }
                $municipalityError = [
                    'value' => $municipality
                ];
            }
        }
        // Distrito local
        $localDistrictError = null;
        $localDistrict = null;
        if ( $newLocalDistrict['id'] == 0 ) {
            $localDistrict = LocalDistrict::where('number', $newLocalDistrict['number'])
                                ->where('name', $newLocalDistrict['name'])
                                ->whereRelation('section', 'state_id', $newLocalDistrict['stateId'])
                                ->first();
            if ( $localDistrict == null ) {
                $localDistrict = LocalDistrict::where('number', $newLocalDistrict['number'])
                                ->whereRelation('section', 'state_id', $newLocalDistrict['stateId'])
                                ->first();
                if ( $localDistrict == null ) {
                    $localDistrict = LocalDistrict::where('name', $newLocalDistrict['name'])
                                    ->whereRelation('section', 'state_id', $newLocalDistrict['stateId'])
                                    ->first();
                }
                $localDistrictError = [
                    'value' => $localDistrict
                ];
            }
        }
        // Distrito federal
        $federalDistrictError = null;
        $federalDistrict = null;
        if ( $newFederalDistrict['id'] == 0 ) {
            $federalDistrict = FederalDistrict::where('number', $newFederalDistrict['number'])
                        ->where('name', $newFederalDistrict['name'])
                        ->whereRelation('section', 'state_id', $newFederalDistrict['stateId'])
                        ->first();
            if ( $federalDistrict == null ) {
                $federalDistrict = FederalDistrict::where('number', $newFederalDistrict['number'])
                            ->whereRelation('section', 'state_id', $newFederalDistrict['stateId'])
                            ->first();
                if ( $federalDistrict == null ) {
                $federalDistrict = FederalDistrict::where('name', $newFederalDistrict['name'])
                                ->whereRelation('section', 'state_id', $newFederalDistrict['stateId'])
                                ->first();
                }
                $federalDistrictError = [
                    'value' => $federalDistrict
                ];
            }
        }
        if ( $municipalityError != null || $localDistrictError != null || $federalDistrictError != null ) {
            return response()->json([
                'success' => false,
                'errors' => [
                    'municipality' => $municipalityError,
                    'localDistrict' => $localDistrictError,
                    'federalDistrict' => $federalDistrictError,
                ]
            ]);
        }
        $section = null;
        $sectionError = null;
        if ( $newSection['id'] == 0 ) {
            $section = Section::where('section', $newSection['section'])
                        ->where('new', null)
                        ->whereRelation('state', 'id', $newState['id'])
                        ->with(['state','municipality','localDistrict','federalDistrict'])
                        ->first();
            if ( $section != null && ( $section->municipality->id != $newMunicipality['id']
                || $section->localDistrict->id != $newLocalDistrict['id']
                || $section->federalDistrict->id != $newFederalDistrict['id'] ))
                {
                    $sectionError = [
                        'value' => $section
                    ];
            } else {
                $section = Section::whereRelation('state', 'id', $newState['id'])
                            ->whereRelation('municipality', 'id', $newMunicipality['id'])
                            ->whereRelation('localDistrict', 'id', $newLocalDistrict['id'])
                            ->whereRelation('federalDistrict', 'id', $newFederalDistrict['id'])
                            ->where('new', null)
                            ->first();
                if ( $section == null ) {
                    $sectionError = [
                        'valid' => false,
                    ];
                }
            }
        }
        if ( $sectionError != null ) {
            return response()->json([
                'success' => false,
                'errors' => [
                    'section' => $sectionError,
                ]
            ]);
        }
        // Insert
        $insertSection = ['id' => null];
        if ( $newSection['id'] != 0 ) {
            $insertSection['id'] = $newSection['id'];
        } else {
            $section = Section::where('section', $newSection['section'])
                            ->where('new', null)
                            ->whereRelation('state', 'id', $newState['id'])
                            ->whereRelation('municipality', 'id', $newMunicipality['id'])
                            ->whereRelation('localDistrict', 'id', $newLocalDistrict['id'])
                            ->whereRelation('federalDistrict', 'id', $newFederalDistrict['id'])
                            ->first();
            if ( $section == null ) {
                $section = Section::create([
                    'section' => $newSection['section'],
                    'new' => true,
                    'state_id' => $newState['id'],
                    'municipality_id' => $newMunicipality['id'],
                    'federal_district_id' => $newLocalDistrict['id'],
                    'local_district_id' => $newFederalDistrict['id'],
                ]);
            }
            $insertSection['id'] = $section->id;
        }

        $insertBirthdate = date_create_from_format('Y-m-d', $newBirthdate['year'] . '-' . $newBirthdate['month'] . '-' . $newBirthdate['day']);

        $imageFirm64 = base64_decode($newVolunteer['imageFirm']);
        $nameImageFirm = 'images/' . Str::uuid() . Str::random(10) . '.jpg';
        $imageFirm = Storage::put($nameImageFirm, $imageFirm64);

        $imageCredential64 = base64_decode($newVolunteer['imageCredential']);
        $nameImageCredential = 'images/' . Str::uuid() . Str::random(10) . '.jpg';
        $imageCredential = Storage::put($nameImageCredential, $imageCredential64);

        if ( $imageFirm != true || $imageCredential != true ) {
            return response()->json([
                'success' => true,
                'errors' => [
                    'imageFirm' => $imageFirm,
                    'imageCredential' => $imageCredential,
                ]
            ]);
        }

        $volunteer = Volunteer::create([
            'name' => $newVolunteer['name'],
            'fathers_lastname' => $newVolunteer['fathersLastname'],
            'mothers_lastname' => $newVolunteer['mothersLastname'],
            'email' => $newVolunteer['email'],
            'phone' => $newVolunteer['phone'],
            'section_id' => $insertSection['id'],
            'sympathizer_id' => $sympathizer['id'],
            'campaign_id' => $campaign['id'],
        ]);

        $address = Address::create([
            'street' => $newAddress['street'],
            'external_number' => $newAddress['externalNumber'],
            'internal_number' => $newAddress['internalNumber'],
            'suburb' => $newAddress['suburb'],
            'zipcode' => $newAddress['zipcode'],
            'volunteer_id' => $volunteer->id,
        ]);

        $AuxVolunteer = AuxVolunteer::create([
            'image_path_ine' => $nameImageCredential,
            'image_path_firm' => $nameImageFirm,
            'birthdate' => $insertBirthdate,
            'sector' => $newVolunteer['sector'],
            'type' => $newVolunteer['type'],
            'notes' => $newVolunteer['notes'],
            'elector_key' => $newVolunteer['electorKey'],
            'local_voting_booth' => $newVolunteer['localVotingBooth'],
            'volunteer_id' => $volunteer->id,
        ]);

        return response()->json([
            'success' => true,
            'volunteer' => $volunteer,
        ]);

    }

}

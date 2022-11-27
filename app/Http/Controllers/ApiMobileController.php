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
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
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

    public function login(Request $request) {
        $user = $request->input('user');

        if ( !Auth::attempt(['email' => $user['email'], 'password' => $user['password']]) ) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ]);
        }

        $user = User::where('email', $user['email'])
                    ->where('userable_type', 'App\Models\Sympathizer')
                    ->first();

        if ( $user == null ) {
            return response()->json([
                'success' => false,
                'message' => 'Fail'
            ]);
        }

        $user->userable->campaigns;

        return response()->json([
            'success' => true,
            'user' => $user,
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
            $state = State::where('name', $newState['name'])->first();
            if ( $state == null ) {
                return response()->json([
                    'success' => false,
                    'errors' => [
                        'state' => [
                            'id' => 0,
                        ],
                    ],
                ]);
            }
            return response()->json([
                'success' => false,
                'errors' => [
                    'state' => $state,
                ],
            ]);
        } else if ( $state->name != $newState['name'] ) {
            return response()->json([
                'success' => false,
                'errors' => [
                    'state' => $state,
                ],
            ]);
        }
        // Municipio
        $municipalityError = false;
        $municipality = null;
        if ( $newMunicipality['id'] == 0 ) {
            $municipality = Municipality::where('number', $newMunicipality['number'])
                                ->where('name', $newMunicipality['name'])
                                ->whereRelation('section', 'state_id', $newMunicipality['stateId'])
                                ->first();
            if ( $municipality == null ) {
                $municipalityError = true;
                $municipality = Municipality::where('number', $newMunicipality['number'])
                                ->whereRelation('section', 'state_id', $newMunicipality['stateId'])
                                ->first();
                if ( $municipality == null ) {
                    $municipality = Municipality::where('name', $newMunicipality['name'])
                                    ->whereRelation('section', 'state_id', $newMunicipality['stateId'])
                                    ->first();
                }
                if ( $municipality == null ) {
                    $municipality = ['id' => 0];
                }
            }
        }
        // Distrito local
        $localDistrictError = false;
        $localDistrict = null;
        if ( $newLocalDistrict['id'] == 0 ) {
            $localDistrict = LocalDistrict::where('number', $newLocalDistrict['number'])
                                ->where('name', $newLocalDistrict['name'])
                                ->whereRelation('section', 'state_id', $newLocalDistrict['stateId'])
                                ->first();
            if ( $localDistrict == null ) {
                $localDistrictError = true;
                $localDistrict = LocalDistrict::where('number', $newLocalDistrict['number'])
                                ->whereRelation('section', 'state_id', $newLocalDistrict['stateId'])
                                ->first();
                if ( $localDistrict == null ) {
                    $localDistrict = LocalDistrict::where('name', $newLocalDistrict['name'])
                                    ->whereRelation('section', 'state_id', $newLocalDistrict['stateId'])
                                    ->first();
                }
                if ( $localDistrict == null ) {
                    $localDistrict = ['id' => 0];
                }
            }
        }
        // Distrito federal
        $federalDistrictError = false;
        $federalDistrict = null;
        if ( $newFederalDistrict['id'] == 0 ) {
            $federalDistrict = FederalDistrict::where('number', $newFederalDistrict['number'])
                        ->where('name', $newFederalDistrict['name'])
                        ->whereRelation('section', 'state_id', $newFederalDistrict['stateId'])
                        ->first();
            if ( $federalDistrict == null ) {
                $federalDistrictError = true;
                $federalDistrict = FederalDistrict::where('number', $newFederalDistrict['number'])
                            ->whereRelation('section', 'state_id', $newFederalDistrict['stateId'])
                            ->first();
                if ( $federalDistrict == null ) {
                $federalDistrict = FederalDistrict::where('name', $newFederalDistrict['name'])
                                ->whereRelation('section', 'state_id', $newFederalDistrict['stateId'])
                                ->first();
                }
                if ( $federalDistrict == null ) {
                    $federalDistrict = ['id' => 0];
                }
            }
        }
        if ( $municipalityError || $localDistrictError || $federalDistrictError ) {
            return response()->json([
                'success' => false,
                'errors' => [
                    'municipality' => $municipalityError == null ? null : $municipality,
                    'localDistrict' =>$localDistrictError == null ? null : $localDistrict,
                    'federalDistrict' => $federalDistrictError == null ? null : $federalDistrict,
                ]
            ]);
        }
        $section = null;
        $sectionError = false;
        if ( $newSection['id'] == 0 ) {
            $section = Section::where('section', $newSection['section'])
                        ->where('new', null)
                        ->whereRelation('state', 'id', $newState['id'])
                        ->with(['state','municipality','localDistrict','federalDistrict'])
                        ->first();
            if ( $section != null && ( $section->municipality->number != $newMunicipality['number']
                || $section->localDistrict->number != $newLocalDistrict['number']
                || $section->federalDistrict->number != $newFederalDistrict['number'] )) {
                    $sectionError = true;
            } else {
                $section = Section::whereRelation('state', 'id', $state->id)
                            ->whereRelation('municipality', 'id', $municipality->id ?? $newMunicipality['id'])
                            ->whereRelation('localDistrict', 'id', $localDistrict->id ?? $newLocalDistrict['id'])
                            ->whereRelation('federalDistrict', 'id', $federalDistrict->id ?? $newFederalDistrict['id'])
                            ->where('new', null)
                            ->first();
                if ( $section == null ) {
                    $section = ['id' => 0];
                    $sectionError = true;
                }
            }
        }
        if ( $sectionError ) {
            return response()->json([
                'success' => false,
                'errors' => [
                    'section' => $section,
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
                            ->whereRelation('state', 'id', $state->id)
                            ->whereRelation('municipality', 'id', $municipality->id)
                            ->whereRelation('localDistrict', 'id', $localDistrict->id)
                            ->whereRelation('federalDistrict', 'id', $federalDistrict->id)
                            ->first();
            if ( $section == null ) {
                $section = Section::create([
                    'section' => $newSection['section'],
                    'new' => true,
                    'state_id' => $state->id,
                    'municipality_id' => $municipality->id,
                    'federal_district_id' => $localDistrict->id,
                    'local_district_id' => $federalDistrict->id,
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

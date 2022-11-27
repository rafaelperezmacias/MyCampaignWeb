<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class VolunteerExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $export = DB::select(DB::RAW("SELECT
        CONCAT(volunteers.name, ' ',volunteers.fathers_lastname, ' ',volunteers.mothers_lastname) full_name,
        volunteers.name,
        volunteers.fathers_lastname,
        volunteers.mothers_lastname,
        volunteers.email,
        volunteers.phone,
        CASE
            WHEN aux_volunteers.type = '0' THEN 'Representante General'
            WHEN aux_volunteers.type = '1' THEN 'Representante de Casilla'
            WHEN aux_volunteers.type = '2' THEN 'Otro'
        END type_volunteer,
        CONCAT(addresses.street,' EXT. ', addresses.external_number,
				IF (ISNULL(addresses.internal_number),  '', CONCAT(' INT. ', addresses.internal_number)),
				' ', addresses.suburb,' CP ',addresses.zipcode) AS address,
        sections.section,
        states.name state
        FROM volunteers
        INNER JOIN aux_volunteers
        ON volunteers.id = aux_volunteers.volunteer_id
        INNER JOIN sections
        ON volunteers.section_id = sections.id
        INNER JOIN states
        ON sections.state_id = states.id
        INNER JOIN municipalities
        ON sections.municipality_id = municipalities.id
        INNER JOIN local_districts
        ON sections.local_district_id = local_districts.id
        INNER JOIN federal_districts
        ON sections.federal_district_id = federal_districts.id
        INNER JOIN addresses
        ON volunteers.id = addresses.volunteer_id
        WHERE volunteers.deleted_at is null
        ORDER BY volunteers.name"));
        return collect($export);
    }

    public function headings(): array
    {
        return [
            'Nombre Completo',
            'Nombre',
            'Apellido Paterno',
            'Apellido Materno',
            'Correo Electronico',
            'Numero Celular',
            'Tipo de Voluntario',
            'Direccion',
            'Seccion',
            'Estado'
        ];
    }
}

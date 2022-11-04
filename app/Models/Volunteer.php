<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Volunteer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'fathers_lastname',
        'mothers_lastname',
        'email',
        'phone'
    ];

    public function address() {
        return $this->belongsTo(Address::class);
    }

    public function auxVolunteer() {
        return $this->belongsTo(AuxVolunteer::class);
    }

    public function section() {
        return $this->belongsTo(Seccion::class);
    }

    public function sympathizer() {
        return $this->belongsTo(Sympathizer::class);
    }
}

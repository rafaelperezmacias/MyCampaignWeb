<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'section',
    ];

    public function state() {
        return $this->hasOne(State::class);
    }

    public function federalDistrict() {
        return $this->hasOne(FederalDistrict::class);
    }

    public function localDistrict() {
        return $this->hasOne(LocalDistrict::class);
    }

    public function municipality() {
        return $this->hasOne(Municipality::class);
    }

    public function volunteers() {
        return $this->hasMany(Volunteer::class);
    }
}

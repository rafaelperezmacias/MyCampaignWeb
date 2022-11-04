<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LocalDistrict extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'number'
    ];

    public function section() {
        return $this->belongsTo(Section::class);
    }
}

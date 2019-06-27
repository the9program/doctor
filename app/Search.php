<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $access
 * @property int $doctor_id
 * @property int $clinical_id
 * @property int $specialty_id
 * @property int $city_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Doctor $doctor
 * @property Clinical $clinical
 * @property Specialty $specialty
 * @property City $city
 */
class Search extends Model
{
    protected $fillable = ['access','doctor_id', 'clinical_id', 'specialty_id', 'city_id'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function clinical()
    {
        return $this->belongsTo(Clinical::class);
    }

    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}

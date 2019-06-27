<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $speech
 * @property int $specialty_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Language $languages
 * @property Experience $experiences
 * @property Clinical $clinics
 * @property Search $searches
 * @property Specialty $specialty
 */
class Doctor extends Model
{
    protected $fillable = ['speech', 'specialty_id'];

    public function languages()
    {
        return $this->belongsToMany(Language::class);
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    public function clinics()
    {
        return $this->belongsToMany(Clinical::class,'clinical_doctor','clinical_id','doctor_id');
    }

    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }

    public function searches()
    {
        return $this->hasMany(Search::class);
    }
}

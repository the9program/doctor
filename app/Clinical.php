<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Doctor $doctors
 * @property Search $searches
 */
class Clinical extends Model
{
    protected $fillable = ['name', 'speech', 'address_id'];

    protected $table = 'clinics';

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class,'clinical_doctor','doctor_id','clinical_id');
    }

    public function searches()
    {
        return $this->hasMany(Search::class);
    }
}

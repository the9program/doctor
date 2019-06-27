<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $specialty
 * @property Doctor $doctors
 * @property Search $searches
 */
class Specialty extends Model
{

    protected $fillable = ['specialty'];

    public $timestamps = false;

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }

    public function searches()
    {
        return $this->hasMany(Search::class);
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $language
 * @property Doctor $doctors
 */
class Language extends Model
{

    protected $fillable = ['language'];

    public $timestamps = false;

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class);
    }

}

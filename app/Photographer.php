<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photographer extends Model
{
    protected $table = 'photographers';
    public $primaryKey = 'id';
    public $timestamps = false;

    public function album() {
        return $this->hasMany('App\Photo');
    }
}

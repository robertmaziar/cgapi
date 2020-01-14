<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photos';
    public $primaryKey = 'id';
    public $timestamps = false;

    public function photographer() {
        return $this->belongsTo('App\Photographer');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CharacterImage extends Model
{
    protected $table = 'characters_images';

    public function character()
    {
        return $this->belongsTo('App\Character');
    }

    public function stories()
    {
        return $this->hasMany('App\Story');
    }
}

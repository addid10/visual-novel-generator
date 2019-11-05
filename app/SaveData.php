<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaveData extends Model
{
    public function stories()
    {
        return $this->belongsTo('App\Story');
    }
    
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}

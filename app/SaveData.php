<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaveData extends Model
{
    protected $table = 'save_datas';
    
    public function story()
    {
        return $this->belongsTo('App\Story');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

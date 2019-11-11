<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaveData extends Model
{
    protected $table = 'save_datas';
    protected $guarded = ['created_at', 'updated_at'];
    
    public function story()
    {
        return $this->belongsTo('App\Story');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

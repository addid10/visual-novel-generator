<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Background extends Model
{
    
    public function visual_novels()
    {
        return $this->belongsToMany(
            'App\VisualNovel', 
            'background_visual_novel', 
            'background_id',
            'visual_novel_id'
        );
    }
    
    public function stories()
    {
        return $this->hasMany('App\Story');
    }
}

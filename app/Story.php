<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    public function save_datas()
    {
        return $this->hasMany('App\SaveData');
    }

    public function backgrounds()
    {
        return $this->belongsTo('App\Background');
    }

    public function musics()
    {
        return $this->belongsTo('App\Music');
    }

    public function characters_images()
    {
        return $this->belongsTo('App\CharacterImage');
    }

    public function visual_novels()
    {
        return $this->belongsTo('App\VisualNovel');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    public function save_datas()
    {
        return $this->hasMany('App\SaveData');
    }

    public function background()
    {
        return $this->belongsTo('App\Background');
    }

    public function music()
    {
        return $this->belongsTo('App\Music');
    }

    public function characters_image()
    {
        return $this->belongsTo('App\CharacterImage');
    }

    public function visual_novel()
    {
        return $this->belongsTo('App\VisualNovel');
    }
}

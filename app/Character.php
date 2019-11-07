<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $guarded = ['created_at', 'updated_at', 'deleted_at'];
    
    public function visual_novels_characters()
    {
        return $this->hasMany('App\VisualNovelCharacter');
    }
    
    public function characters_images()
    {
        return $this->hasMany('App\CharacterImage');
    }
}

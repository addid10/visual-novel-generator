<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CharacterVisualNovel extends Pivot
{
    protected $table = 'character_visual_novel';

    public $timestamps = false;
}

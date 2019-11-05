<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class MusicVisualNovel extends Pivot
{
    protected $table = 'music_visual_novel';

    public $timestamps = false;
}

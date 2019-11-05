<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class BackgroundVisualNovel extends Pivot
{
    protected $table = 'background_visual_novel';

    public $timestamps = false;
}

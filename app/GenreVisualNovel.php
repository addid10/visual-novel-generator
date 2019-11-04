<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class GenreVisualNovel extends Pivot
{
    protected $table = 'genre_visual_novel';

    public $timestamps = false;
}

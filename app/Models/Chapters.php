<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Mangas;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chapters extends Model
{
        protected $fillable = [
        'manga_id',           
        'chapter_name',
        'chapter_description',
        'chapter_number',     
        'pages',
    ];

    public function manga(): BelongsTo
    {
        return $this->belongsTo(Mangas::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Tags;

class Mangas extends Model
{
    protected $fillable = [
        'name',
        'description',
        'author_name',
        'status',
        'chapters',
        'cover_path,price'
    ];
        public function tags(): HasMany
    {
        return $this->hasMany(Tags::class, 'manga_id');
    }
}

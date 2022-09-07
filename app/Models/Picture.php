<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sub_photos',
        'album_id',
    ];

    public function getAlbum()
    {
        return $this->belongsTo(Album::class);
    }
}

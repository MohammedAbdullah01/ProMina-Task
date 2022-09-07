<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'picture',
        'user_id',
    ];
    public function images()
    {
        return $this->hasMany(Picture::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPictureAlbumAttribute()
    {
        if ($this->picture == 'default_album.png') {
            return asset('assets/img/default_album.png');
        }
        return asset('storage/albums/' . $this->picture);
    }


    public static function booted()
    {
        static::addGlobalScope('userAlbum',  function (Builder $builder) {
            $user_id = Auth::user();

            $builder->where('user_id', '=', $user_id->id);
        });
    }

    public static function rules()
    {
        return [
            'title'         => 'required|between:2,30|string',
            'picture'       => 'required|image|mimes:jpeg,png,jpg|max:5048|dimensions:max_width=1500,max_height=1500',
        ];
    }

    public function  getCheckCountPicturesAlbumAttribute()
    {
        $count = $this->images()->count();
        if ($count) {
            return $count;
        } else {
            echo "<span class='badge bg-danger'>Empty</span> ";
        }
    }
}

<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

use Spatie\MediaLibrary\MediaCollections\Models\Media;

class User extends Authenticatable implements HasMedia
{
    use HasFactory, Notifiable, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static $image_width;
    protected static $image_height;

    public function image_size ($width, $height) {
        self::$image_width = $width;
        self::$image_height = $height;
        // return $image_property = ['width' => $width, 'height' => $height];
    }

    public function registerMediaConversions(Media $media = null): void
    {  

        $width = is_int(self::$image_width) ? self::$image_width : 100;
        $height = is_int(self::$image_height) ? self::$image_height : 100;
        
        $this->addMediaConversion('card')
              ->width($width)
              ->height($height);
        /*
        // can be user additionaly
        $this->addMediaConversion('thumb')
              ->width(150)
              ->height(100);
        */
    }


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images_another');
    }
}

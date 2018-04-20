<?php

namespace App;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use Auditable;

    protected $fillable = [
        'title',
        'folder',
        'description',
        'phone_1',
        'phone_2',
        'phone_3',
        'address_1',
        'address_2',
        'address_3',
        'contact_email',
        'secondary_email',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function categories()
    {
        return $this->hasMany('App\Category');
    }

    public function pages()
    {
        return $this->hasMany('App\Page');
    }

    public function partners()
    {
        return $this->hasMany('App\Partner');
    }

    public function clients()
    {
        return $this->hasMany('App\Client');
    }

    public function Configs()
    {
        return $this->hasMany('App\Config');
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function services()
    {
        return $this->hasMany('App\Service');
    }

    public function slides()
    {
        return $this->hasMany('App\Slide');
    }

    public function areas()
    {
        return $this->hasMany('App\Area');
    }

}

<?php

namespace App;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Auditable;

    protected $fillable = [
        'title',
        'site_id'
    ];
    
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function site()
    {
        return $this->belongsTo('App\Site');
    }
}

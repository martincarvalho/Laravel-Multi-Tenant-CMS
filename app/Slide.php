<?php

namespace App;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use Auditable;

    protected $fillable = [
        'title',
        'image',
        'body',
        'link',
        'site_id',
    ];

    public function site()
    {
        return $this->belongsTo('App\Site');
    }
}
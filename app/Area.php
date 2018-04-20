<?php

namespace App;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use Auditable;

    protected $fillable = [
        'title',
        'has_title',
        'has_subtitle',
        'has_link',
        'has_tag',
        'has_image',
        'has_body',
        'has_extra_1',
        'has_extra_2',
        'has_extra_3',
        'site_id',
    ];

    public function site()
    {
        return $this->belongsTo('App\Site');
    }

    public function customPages()
    {
        return $this->hasMany('App\CustomPage');
    }
}

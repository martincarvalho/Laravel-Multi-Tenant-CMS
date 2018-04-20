<?php

namespace App;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;

class CustomPage extends Model
{
    use Auditable;

    protected $fillable = [
        'description_title',
        'title',
        'subtitle',
        'link',
        'tag',
        'body',
        'image',
        'extra_1',
        'extra_2',
        'extra_3',
        'area_id',
    ];

    public function area()
    {
        return $this->belongsTo('App\Area');
    }
}

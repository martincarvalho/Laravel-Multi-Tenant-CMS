<?php

namespace App;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use Auditable;

    protected $fillable = [
        'title',
        'subtitle',
        'link',
        'tag',
        'body',
        'image'
    ];

    public function site()
    {
        return $this->belongsTo('App\Site');
    }

}

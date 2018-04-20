<?php

namespace App;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Auditable;

    protected $fillable = [
        'title',
        'excerpt',
        'body',
        'featured',
        'published',
        'category_id',
        'image'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function site()
    {
        return $this->belongsTo('App\Site');
    }

    public function getFeaturedAttribute($attr){
        if($attr == 1){
            return "Sim";
        }else{
            return "Não";
        }
    }

    public function getPublishedAttribute($attr){
        if($attr == 1){
            return "Sim";
        }else{
            return "Não";
        }
    }
    
}

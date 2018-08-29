<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
//    public function products() {
//        return $this->hasMany('App\Product');
//    }
//	public function category() {
//        return $this->belongsTo('App\Category');
//    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent', 'id');
    }


}

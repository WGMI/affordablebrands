<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category(){
    	return $this->belongsTo('App\Category');
    }

    public function products(){
    	return $this->belongsToMany('App\Products','sub_category_products');
    }
}

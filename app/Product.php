<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['quantity'];

    public function presentPrice(){
    	return ' Ksh '.$this->price;
    }

    public function categories(){
    	return $this->belongsToMany('App\Category');
    }

    public function subcategories(){
    	return $this->belongsToMany('App\SubCategory','sub_category_products');
    }
}

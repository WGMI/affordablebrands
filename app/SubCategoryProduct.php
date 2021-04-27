<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoryProduct extends Model
{
    use HasFactory;

    protected $table = "sub_category_products";
    protected $guarded = [];
}

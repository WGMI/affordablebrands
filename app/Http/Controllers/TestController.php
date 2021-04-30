<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Order;
use App\Category;
use App\SubCategory;

class TestController extends Controller
{
    public function index(){
    	$subcategories = "<ul id=\"product_catchecklist\" data-wp-lists=\"list:product_cat\" class=\"categorychecklist form-no-clear\">";

        foreach(["1"] as $choice){
            $c = Category::find((int)$choice);//->subcategories;
            //dd($c->subcategories);
            $subcats = $c->subcategories;
            foreach ($subcats as $sc) {
	            $subcategories .= "
	            <li>
	                <label><input value=\"$sc->id\" type=\"checkbox\" name=\"subcategory[]\"> $sc->name</label>
	            </li>
	            ";
            }
        }

        $subcategories .= "</ul>";

        return $subcategories;
    }
}

<?php

function presentPrice($price){
	return "Ksh ".$price;
}

function productImage($path){
	return $path && file_exists('storage/'.$path) ? asset('storage/'.$path) : asset('storage/color.jpg');
}

function activateLink($path){
	return str_contains(Route::getCurrentRoute()->uri,$path) ? 'active' : '';
}

function getStockLevel($quantity){
	if($quantity > setting('site.quantity_threshold')){
        $stock = array('In Stock','green');
    } elseif($quantity <= setting('site.quantity_threshold') && $quantity > 0){
        $stock = array('Low Stock','orange');
    } else{
        $stock = array('Out of Stock','red');
    }

    return $stock;
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\SubCategory;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagination = 9;
        $categoryName = null;
        $subcategories = null;
        $subcategoryName = null;
        if(request()->category){
            $products = Product::with('categories')->whereHas('categories',function($query){
                $query->where('name',request()->category);
            });
            $categoryName = optional(Category::where('slug',request()->category)->first())->name;
            $subcategories = Category::where('slug',request()->category)->first()->subcategories;
        } else if(request()->subcategory){
            $products = Product::with('subcategories')->whereHas('subcategories',function($query){
                $query->where('name',request()->subcategory);
            });
            $subcategoryName = optional(SubCategory::where('slug',request()->subcategory)->first())->name;
        } else{
            $products = Product::where('available',1)->take(10);
        }

        if(request()->sort == 'asc'){
            $products = $products->orderBy('price')->paginate($pagination);
        } elseif (request()->sort == 'desc') {
            $products = $products->orderBy('price','desc')->paginate($pagination);
        } else{
            $products = $products->paginate($pagination);
        }

        return view('shop')->with(['products' => $products,'categoryName' => $categoryName,'subcategoryName' => $subcategoryName,'subcategories' => $subcategories]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$slug)
    {
        $product = Product::where('slug',$slug)->firstOrFail();
        $images = json_decode($product->images);
        $relatedproducts = DB::table('products')->join('category_product','products.id','=','category_product.product_id')->join('category','category_product.category_id','=','category.id')->select('products.*')->limit(3)->get();
        if($images){
            array_push($images,$product->image);
        }

        $stock = getStockLevel($product->quantity);
        
        return view('product')->with([
            'product' => $product,
            'relatedproducts' => $relatedproducts,
            'images' => $images,
            'stock' => $stock,
            
        ]);
    }

    public function search(Request $request){
        $query = $request->input('query');
        $products = Product::where('name','like',"%$query%")
        ->orWhere('description','like',"%$query%")
        ->orWhere('model','like',"%$query%")
        ->orWhere('brand','like',"%$query%")
        ->take(10)->paginate(9);
        //dd($products);
        return view('search-results')->with('products',$products);
    }

    public function getsubcategories(Request $request){
        //dd($request->choices);
        $subcategories = "<ul id=\"product_catchecklist\" data-wp-lists=\"list:product_cat\" class=\"categorychecklist form-no-clear\">";

        if($request->choices == null){
            return '';
        }

        foreach($request->choices as $choice){
            $c = Category::find((int)$choice);//->subcategories;
            //dd($c->subcategories);
            $subcats = $c->subcategories;
            $subcatchoices = ($request->subcategorychoices) ? $request->subcategorychoices : array();
            foreach ($subcats as $sc) {
                $checked = (in_array($sc->id,$subcatchoices)) ? 'checked':'';
                $subcategories .= "
                <li>
                    <label><input value=\"$sc->id\" type=\"checkbox\" name=\"subcategory[]\" $checked> $sc->name</label>
                </li>
                ";
            }
        }

        $subcategories .= "</ul>";

        return $subcategories;
    }
}

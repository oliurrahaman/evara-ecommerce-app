<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductOffer;
use Illuminate\Http\Request;

class EvaraController extends Controller
{
    private $product;
    public function index()
    {
      return view('website.home.index',[
          'products' => Product::where('featured_status',1)
              ->orderBy('id','desc')
              ->take(8)
              ->get(['id','name','image','category_id','regular_price','selling_price']),
          'product_offers' => ProductOffer::all(),

      ]);
    }

    public function category($id)
    {
        //        return 'ok';
        return view('website.category.index',[
            'products' => Product::where('category_id',$id)
                ->orderBy('id','desc')
                ->get(['id','name','image','regular_price','selling_price']),

        ]);
    }
    public function product($id)
    {
        $this->product = Product::find($id);
        return view('website.product.index',[
            'product' => $this->product,
            'category_products' => Product::where('category_id',$this->product->category_id)
            ->orderBy('id','desc')
            ->take(4)
            ->get(['id','name','image','selling_price','regular_price']),
        ]);
    }
}

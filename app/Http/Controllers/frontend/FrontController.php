<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class FrontController extends Controller
{
    public function mainpage() 
    {
        $category = category::where('popular','1')->take(15)->get();
        $product = Product::where('trending','1')->take(12)->get();
       
        return view('frontend.index' , compact('category', 'product'));
    }
    public function category()
    {
        $category = Category::where('status','0')->get();
        return view('frontend.category' , compact('category'));
    }
    public function viewCategory($slug)
    {
        if(Category::where('slug',$slug)->exists())
        {
            $category = Category::where('slug',$slug)->first();
            $product = Product::where('cate_id',$category->id)->where('status','0')->get();
            return view('frontend.products.index', compact('category','product'));
        }
        else
        {
            return redirect('/')->with('status',"Slug Doesn't exits");
        }
    }
    public function productView($cate_slug  ,$prod_slug )
    {
        if(Category::where('slug',$cate_slug)->exists())
        {
            if(Product::where('slug',$prod_slug)->exists())
            {
                $product = Product::where('slug',$prod_slug)->first();
                return view('frontend.products.view', compact('product'));
            }
            else
            {
                return redirect('/')->with('status',"No Such Product Found");
            }
        }
        else
        {
            return redirect('/')->with('status',"No such Category found");
        }
    }
    public function eachProdView($prod_slug)
    {
        
        
            if(Product::where('slug',$prod_slug)->exists())
            {
                $product = Product::where('slug',$prod_slug)->first();
                return view('frontend.products.view', compact('product'));
            }
            else
            {
                return redirect('/')->with('status',"No Such Product Found");
            }
    }
    public function searchProducts(Request $request)
    {
        $search_product = $request->product_name;
        if($search_product != "")
        {
            $product = Product::where('name',"LIKE","%$search_product%")->first();
            if($product)
            {
                return redirect('view-category/'.$product->category->slug.'/'.$product->slug);
            }
            else
            {
                return redirect()->back()->with("status","No Products Matched your Search");
            }
        }
        else
        {
            return redirect()->back();
        }
    }
}


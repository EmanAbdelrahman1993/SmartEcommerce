<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use Illuminate\Http\Request;

class FilterController extends Controller
{


 public function filterItem(Request $request)
 {

     $data = Item::when($request['name'],function($query)use ($request){
                return $query->where('name','=',$request['name']);
     })->when($request['price'],function($query)use ($request){
         return $query->where('price','<=',$request['price']);
     })->when($request['points'],function($query)use ($request){
         return $query->where('points','<=',$request['points']);
     })->when($request['category'],function($query) use ($request){

         return $query->where('category_id','=',$request['category']);
     })->get();


     $categories = Category::all();
     return view('frontend.filterItem')->with([
         'data'=>$data,
         'categories'=>$categories
     ]);
 }

}

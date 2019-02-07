<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FoodItem;
use App\FoodReview;
use App\Page;

class RootPageController extends Controller
{
    // show search food page
    public function searchFood(){
        $foods = FoodItem::all();
        return view('PublicView.searchFood')->with('foods', $foods);
    }

    // view single food
    public function singlefood($id){
        $fooditem = FoodItem::where('id', $id)->first();
        $reviews = FoodReview::where('food_id', $id)->get();

        return view('PublicView.singlefood')->with('food', $fooditem)
                                            ->with('foodReview', $reviews);
    }

    // view food page
    public function viewfoodpage($id){
        $page = Page::where('id', $id)->first();
        $foodItem = FoodItem::where('page_id', $id)->get();

        return view('PublicView.viewpage')
                        ->with('page', $page)
                        ->with('foodlist', $foodItem);
    }

    // search food
    public function search_keyword_Food(Request $request){
        $fooditem = FoodItem::where('foodName', 'LIKE' ,"%{$request->foodname}%")
                            ->orWhere('category', 'LIKE' ,"%{$request->foodname}%")
                            ->get();

        return view('PublicView.searchFood')->with('foods', $fooditem);
    }

    // show search restaurant page
    public function findRestaurant_public(){
        $pages = Page::all();
        return view('PublicView.searchResturant')->with('pagelist', $pages);
    }

    // search restaurant
    public function search_page_keyword_public(Request $request){
        $pagelist = Page::where('page_name', 'LIKE' ,"%{$request->foodname}%")
                            ->orWhere('area', 'LIKE' ,"%{$request->foodname}%")
                            ->get();

        return view('PublicView.searchResturant')->with('pagelist', $pagelist);
    }


}

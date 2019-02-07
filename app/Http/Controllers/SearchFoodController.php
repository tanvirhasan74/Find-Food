<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FoodCategory;
use App\FoodItem;
use App\FoodReview;
use App\Page;
use App\follow_list;
use App\timeline;

class SearchFoodController extends Controller
{
    // show search food page
    public function index(){
        $categories = FoodCategory::all();
        $foods = FoodItem::all();
        $pages = Page::all();
        return view('SearchFood.searchfood')->with('categories', $categories)
                                            ->with('pagelist', $pages)
                                            ->with('foods', $foods);
    }

    // search food
    public function searchfood(Request $request){
        $fooditem = FoodItem::where('foodName', 'LIKE' ,"%{$request->foodname}%")
                            ->orWhere('category', 'LIKE' ,"%{$request->foodname}%")
                            ->get();

        $categories = FoodCategory::all();
        return view('SearchFood.searchfood')->with('categories', $categories)
                                            ->with('foods', $fooditem);
    }

    // show search restaurant page
    public function searchRestaurant(){
        $pages = Page::all();
        return view('SearchFood.searchByRestaurant')->with('pagelist', $pages)->with('checkIsFollowed', false);
    }

    // search restaurant
    public function search_page_keyword(Request $request){
        $pagelist = Page::where('page_name', 'LIKE' ,"%{$request->foodname}%")
                            ->orWhere('area', 'LIKE' ,"%{$request->foodname}%")
                            ->get();

        return view('SearchFood.searchByRestaurant')->with('pagelist', $pagelist)->with('checkIsFollowed', false);
    }

    // view single food
    public function singlefood($id){
        $fooditem = FoodItem::where('id', $id)->first();
        $reviews = FoodReview::where('food_id', $id)->get();

        return view('SearchFood.singlefood')->with('food', $fooditem)
                                            ->with('foodReview', $reviews);
    }

    // view food page
    public function viewfoodpage($id){
        $page = Page::where('id', $id)->first();
        $foodItem = FoodItem::where('page_id', $id)->get();
        $isFollowed = follow_list::isFollowed($id, 'page');

        return view('SearchFood.viewpage')
                        ->with('page', $page)
                        ->with('foodlist', $foodItem)
                        ->with('isFollowed',$isFollowed);
    }

    // view single food
    public function insertFoodReview(Request $request){
 
        $review = new FoodReview();
        $review->food_id = $request->food_id;
        $review->reviewer_id = session('user')->id;
        $review->reviewer_name = session('user')->fullname;
        $review->date = date("F j, Y, g:i a");
        $review->review = $request->review;
        $review->save();

        $request->session()->flash('success_message', 'Review Posted');
        return redirect()->route('viewsinglefood', ['id' => $request->food_id]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Http\Requests\PagePostRequest;
use App\Http\Requests\FoodItemRequest;
use App\Http\Requests\UpdateFoodItemRequest;
use App\FoodCategory;
use App\FoodItem;
use App\timeline;

class FoodController extends Controller
{
    // show category Page
    public function addCategoryPage($page_id){
        $page = Page::where('id', $page_id)->first();
        $categories = FoodCategory::where('page_id', $page_id)->get();

        return view('Page.addCategory')
                        ->with('page', $page)
                        ->with('categories', $categories);
    }

    // insert category
    public function insertCategory(Request $request){
        $cat = new FoodCategory();
        $cat->page_id = $request->page_id;
        $cat->category = $request->cat_name;
        $cat->save();

        $request->session()->flash('success_message', 'Category Added Successsfully');
        return redirect()->route('addCategoryPage', ['page_id' => $request->page_id]);
    }

    // delete category
    public function deleteCategory(Request $request){
        $cat = FoodCategory::where('id', $request->cat_id);
        $cat->delete();

        $request->session()->flash('success_message', 'Category Deteted Successsfully');
        return redirect()->route('addCategoryPage', ['page_id' => $request->page_id]);
    }

    // show add Food Page
    public function addFoodPage($page_id){
        $page = Page::where('id', $page_id)->first();
        $categories = FoodCategory::where('page_id', $page_id)->get();

        return view('Page.addFood')
                        ->with('page', $page)
                        ->with('categories', $categories);
    }

    // insert category
    public function insertFood(FoodItemRequest $request){
        
        $food = new FoodItem();
        $food->foodName = $request->food_name;
        $food->category = $request->cat_name;
        $food->Price = $request->price;
        $food->page_id = $request->page_id;
        $food->availability = $request->availability;
        $food->food_img = 'invalid';
        $food->food_discription = $request->desc;
        $food->save();

        // food picture
        $lastID = FoodItem::find($food->id);
        if ($request->hasFile('food_pic')) {
            $image = $request->file('food_pic');
            $name = $food->id.'_img' .'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('upload/food_picture');
            $image->move($destinationPath, $name);
            $lastID->food_img = $name;
            $lastID->save();
        }

        $request->session()->flash('success_message', 'New Food Item Added Successsfully');



        $info=(object)['page_user'=>'page', 'page_user_id'=>$request->page_id, 'type'=>'newfood', 'post_id'=>$food->id ];

        timeline::insert($info);


        return redirect()->route('foodlist', ['page_id' => $request->page_id]);
    }

    // show foodlist page
    public function foodlist($page_id){
        $page = Page::where('id', $page_id)->first();
        $categories = FoodCategory::where('page_id', $page_id)->get();
        $foodItem = FoodItem::where('page_id', $page_id)->get();

        return view('Page.Foodlist')
                        ->with('page', $page)
                        ->with('categories', $categories)
                        ->with('foodlist', $foodItem);
    }

    // show food details
    public function viewFoodPage($page_id, $food_id){
        $page = Page::where('id', $page_id)->first();
        $categories = FoodCategory::where('page_id', $page_id)->get();
        $food= FoodItem::where('id', $food_id)->first();

        return view('Page.viewfood')
                        ->with('page', $page)
                        ->with('categories', $categories)
                        ->with('food', $food);
    }

    // update food
    public function updateFoodItem(UpdateFoodItemRequest $request){
        $updateFood = FoodItem::where('id', $request->food_id)->first();

        $updateFood->foodName = $request->food_name;
        $updateFood->category = $request->cat_name;
        $updateFood->Price = $request->price;
        $updateFood->availability = $request->availability;
        $updateFood->food_discription = $request->desc;
        $updateFood->save();

        // food picture
        $lastID = FoodItem::find($request->food_id);
        if ($request->hasFile('food_pic')) {
            $image = $request->file('food_pic');
            $name = $request->food_id.'_img' .'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('upload/food_picture');
            $image->move($destinationPath, $name);
            $lastID->food_img = $name;
            $lastID->save();
        }

        $request->session()->flash('success_message', 'Item Updated Successsfully');
        return redirect()->route('viewFoodPage', ['page_id' => $request->page_id, 'food_id' => $request->food_id]);
    }

    // delete food item
    public function deleteFoodItem(Request $request){

        $info=(object)['page_user'=>'page', 'page_user_id'=>$request->page_id, 'type'=>'newfood', 'post_id'=>$request->food_id ];
        timeline::deletes($info);




        $item = FoodItem::where('id', $request->food_id);
        $item->delete();

        $request->session()->flash('success_message', 'Item Deteted Successsfully');
        return redirect()->route('foodlist', ['page_id' => $request->page_id]);
    }







}

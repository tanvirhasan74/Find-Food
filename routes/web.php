<?php

// RootPageController controller
Route::get('/', 'RootPageController@searchFood')->name('findfood');
Route::post('/', 'RootPageController@search_keyword_Food')->name('search_keyword_Food');
Route::get('/public/fooditem/{id}', 'RootPageController@singlefood')->name('viewsinglefood_public');
Route::get('/public/page/{id}', 'RootPageController@viewfoodpage')->name('viewfoodpage_public');
Route::get('/search-restaurant-public', 'RootPageController@findRestaurant_public')->name('findRestaurant_public');
Route::post('/search-restaurant-public', 'RootPageController@search_page_keyword_public')->name('search_page_keyword_public');




// login controller
Route::get('/login', 'LoginController@index')->name('showLogin');
Route::post('/login', 'LoginController@verifyUser')->name('verifyUser');
Route::get('/logout', 'LoginController@logout')->name('logout');

// registration controller
Route::get('/register', 'RegistrationController@index')->name('showRegistration');
Route::post('/register', 'RegistrationController@register')->name('registerUser');

// This route require user session
Route::group(['middleware' => 'check_user_session'], function(){
    // Home Controller
    Route::get('/timeline', 'HomeController@index')->name('timeline');

    // ManagePage Controller
    Route::get('/manage-page', 'ManagePageController@showPagelist')->name('showPagelist');
    Route::get('/create-page', 'ManagePageController@showCreatePage')->name('showCreatePage');
    Route::post('/create-page', 'ManagePageController@createPage');

    // Page Controllers
    Route::get('/page-home/{id}', 'PageController@myPost')->name('myPost');

    // PagePostController
    Route::post('/page-home/{id}', 'PagePostController@insertPost');
    Route::get('/page-post/{page_id}/{id}', 'PagePostController@viewpost')->name('viewpost');
    Route::post('update-page-post', 'PagePostController@updatePagePost')->name('updatePagePost');
    Route::post('delete-page-post', 'PagePostController@deletePagePost')->name('deletePagePost');

    // Food Controller
    Route::get('/{page_id}/add-category', 'FoodController@addCategoryPage')->name('addCategoryPage');
    Route::post('/insert-category', 'FoodController@insertCategory')->name('insertCategory');
    Route::post('/delete-category', 'FoodController@deleteCategory')->name('deleteCategory');
    Route::get('/{page_id}/add-food-item', 'FoodController@addFoodPage')->name('addFoodPage');
    Route::post('/insert-food', 'FoodController@insertFood')->name('insertFood');
    Route::get('/{page_id}/food-list', 'FoodController@foodlist')->name('foodlist');
    Route::get('/{page_id}/food-item/{food_id}', 'FoodController@viewFoodPage')->name('viewFoodPage');
    Route::post('/{page_id}/food-item/{food_id}', 'FoodController@updateFoodItem')->name('updateFoodItem');
    Route::post('/delete-food', 'FoodController@deleteFoodItem')->name('deleteFoodItem');

    // ProfileController
    Route::get('/profile', 'ProfileController@index')->name('profileIndexPage');
    Route::post('/profile', 'ProfileController@insertpost')->name('insertpost');
    Route::get('/profile/post/{id}', 'ProfileController@viewpost')->name('viewuserpost');
    Route::post('/delete-user-post', 'ProfileController@deleteUserPost')->name('deleteUserPost');
    Route::post('/update-user-post', 'ProfileController@updateUserPost')->name('updateUserPost');
    Route::get('/profile/followlist', 'ProfileController@followlistPage')->name('followlistPage');
    Route::post('/followUser', 'ProfileController@follow_this_guy')->name('follow_this_guy');

    // SearchFoodController
    Route::get('/search-food', 'SearchFoodController@index')->name('searchfoodpage');
    Route::post('/search-food', 'SearchFoodController@searchfood')->name('searchfood');
    Route::get('/fooditem/{id}', 'SearchFoodController@singlefood')->name('viewsinglefood');
    Route::get('/page/{id}', 'SearchFoodController@viewfoodpage')->name('viewfoodpage');
    Route::post('/fooditem/{id}', 'SearchFoodController@insertFoodReview')->name('insertFoodReview');
    Route::get('/search-restaurant', 'SearchFoodController@searchRestaurant')->name('searchRestaurant');
    Route::post('/search-restaurant', 'SearchFoodController@search_page_keyword')->name('search_page_keyword');

    // new route-

    // search people
    Route::get('/search_people', 'ProfileController@getSearch')->name('searchpeople');
    Route::post('/search_people', 'ProfileController@postSearch')->name('searchpeople');

    Route::get('/followers', 'ProfileController@followers')->name('followers');
    Route::get('/followed_user', 'ProfileController@followedUser')->name('followeduser');
    Route::get('/followed_page', 'ProfileController@followedPage')->name('followedPage');


    // CommentController
    Route::post('/comment-on-user-post', 'CommentController@addComment_Userpost')->name('addComment_Userpost');
    Route::post('/comment-on-page-post', 'CommentController@addComment_Pagepost')->name('addComment_Pagepost');


   


   // followController
    Route::resource('/follow','FollowListController');
  





});

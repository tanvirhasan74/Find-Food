@extends('Layouts.Timeline')

@section('Home')
    id="active"
@endsection

@section('searchFood')
    active
@endsection

@section('content')
    <div id="">
        <div id="err-msg">
            @include('Include.error')
        </div>

        <div class="card bg-light" id="page-list-table">

          <div class="card-header">
            <div class="row">
               <div class="col-6">
                  <h4 id="user-name-head">Page - {{$page->page_name}}</h4>
                  <h5 id="user-name-head">Address - {{$page->address}}</h5>
               </div>
               <div class="col-6">

                  @if(! $isFollowed)
                   <form action ="/follow" method ="post">
                       {{ csrf_field() }}
                        <input type="hidden" name="action" value="follow">
                        <input type="hidden" name="page_user" value="page">
                        <input type="hidden" name="followed_page_user_id" value="{{ $page->id }}" >
                        <input type="submit" value="Follow"  class="card-link btn btn-outline-info btn-sm" style="float: right;"/>
                   </form>
                  @else
                   <form action ="/follow" method ="post">
                       {{ csrf_field() }}
                        <input type="hidden" name="action" value="unfollow">
                        <input type="hidden" name="page_user" value="page">
                        <input type="hidden" name="followed_page_user_id" value="{{ $page->id }}" >
                        <input type="submit" value="Unfollow"  class="card-link btn btn-outline-info btn-sm" style="float: right;"/>
                   </form>
                  @endif

               </div>
            </div>
             
          </div>
          <div class="card-body row less-padd">
              @foreach($foodlist as $food)
                  <div class="card col-3 no-padding" style="width: 20rem;">
                    <img class="card-img-top" id="food_img" src="/upload/food_picture/{{$food->food_img}}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">{{$food->foodName}}</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">Category : {{$food->category}}</li>
                      <li class="list-group-item">Price : {{$food->Price}}</li>
                    </ul>
                    <div class="card-body">
                      <a href="{{route('viewsinglefood', ['food_id' => $food->id])}}" class="card-link btn btn-outline-info btn-sm">View Item</a>
                    </div>
                  </div>
              @endforeach
          </div>
        </div>
    </div>
@endsection

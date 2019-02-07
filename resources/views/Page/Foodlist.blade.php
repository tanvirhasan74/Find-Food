@extends('Layouts.Page')

@section('ManagePage')
    id="active"
@endsection

@section('foodlist')
    active
@endsection

@section('content')
    <div id="">
        <div id="err-msg">
            @include('Include.error')
        </div>

        <div class="card bg-light" id="page-list-table">

          <div class="card-header">
            All Food Item
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
                      <a href="{{route('viewFoodPage', ['page_id'=>$page->id, 'food_id'=>$food->id])}}" class="card-link btn btn-outline-info btn-sm">View Item</a>
                    </div>
                  </div>
              @endforeach
          </div>
        </div>
    </div>
@endsection

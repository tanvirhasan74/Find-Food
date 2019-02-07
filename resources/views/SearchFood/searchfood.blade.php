@extends('Layouts.Timeline')

@section('Home')
    id="active"
@endsection

@section('searchFood')
    active
@endsection

@section('content')

      <form action="" method="post">
          @csrf

          <div class="row">
              <div class="form-group col-10 margin-1">
                <input type="text" name="foodname" class="form-control" placeholder="Food Name or Category or Keyword">
              </div>
              <div class="form-group col-2">
                  <button type="submit" class="btn btn-success btn-block margin-1">Search</button>
              </div>
          </div>
      </form>

     <!-- food list -->
     <div class="card-body row less-padd">
         @foreach($foods as $food)
             <div class="card col-3 no-padding" style="width: 20rem;">
               <img class="card-img-top" id="food_img" src="/upload/food_picture/{{$food->food_img}}" alt="Card image cap">
               <div class="card-body">
                 <h5 class="card-title">{{$food->foodName}}</h5>
               </div>
               <ul class="list-group list-group-flush">
                 <li class="list-group-item">Category : {{$food->category}}</li>
                 <li class="list-group-item">Price : {{$food->Price}}</li>
               </ul>
               <div class="card-body row">
                   <div class="col-6">
                       <a href="{{route('viewsinglefood', ['food_id' => $food->id])}}" class="card-link btn btn-outline-info btn-sm">View Item</a>
                   </div>
                  <div class="col-6">
                      <a href="{{route('viewfoodpage', ['page_id' => $food->page_id])}}" class="card-link btn btn-outline-secondary btn-sm">View Page</a>
                  </div>
               </div>
             </div>
         @endforeach
     </div>

@endsection

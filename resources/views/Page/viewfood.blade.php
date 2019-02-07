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

          <div class="card-header" id="food-action-byn-group">
            Item Name - {{$food->foodName}}
            <button type="button" class="btn btn-outline-danger btn-sm float-right" data-toggle="modal" data-target="#exampleModal2" data-whatever="@getbootstrap">Delete Item</button>
            <button type="button" class="btn btn-outline-info btn-sm float-right" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Edit Item</button>
          </div>
          <div class="card-body row less-padd">

              <table class="table">
                <tbody>
                    <tr>
                      <th scope="col">Iten Name</th>
                      <td scope="col">{{$food->foodName}}</td>
                      <td rowspan="4"><img class="card-img-top" id="food_img" src="/upload/food_picture/{{$food->food_img}}" alt="Card image cap"></td>
                    </tr>
                    <tr>
                      <th scope="col">Category</th>
                      <td scope="col">{{$food->category}}</td>
                    </tr>
                    <tr>
                      <th scope="col">Price</th>
                      <td scope="col">{{$food->Price}}</td>
                    </tr>
                    <tr>
                      <th scope="col">Rating</th>
                      <td scope="col">{{$food->rating}}</td>
                    </tr>
                    <tr>
                      <th scope="col">Description</th>
                      <td scope="col">{{$food->food_discription}}</td>
                    </tr>
                    <tr>
                      <th scope="col">Availability</th>
                      <td scope="col">{{$food->availability}}</td>
                    </tr>

                  </tbody>
                </table>
          </div>
        </div>
    </div>

    <!-- Edit Food Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Are you sure want to Update ?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="{{route('updateFoodItem', ['page_id'=>$page->id, 'food_id'=>$food->id])}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="page_id" value="{{$page->id}}">
                <input type="hidden" name="food_id" value="{{$food->id}}">
                <div class="row" id="margin-1">
                    <div class="form-group col-9">
                        <div class="form-group">
                            <input type="text" name="food_name" value="{{$food->foodName}}" required name="title" class="form-control" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="cat_name">
                                @foreach($categories as $key => $cat)
                                  <option <?php if($food->category==$cat->category) echo "selected" ?> value="{{$cat->category}}">{{$cat->category}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="price" value="{{$food->Price}}" required name="title" class="form-control" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="availability">
                                <option <?php if($food->availability=="Available") echo "selected" ?> value="Available">Available</option>
                                <option <?php if($food->availability=="Unavailable") echo "selected" ?> value="Unavailable">Unavailable</option>
                            </select>
                        </div>
                        <textarea name="desc" required class="form-control" rows="3" placeholder="Food Description">{{$food->food_discription}}</textarea>
                    </div>
                    <div class="form-group col-3" id="food-update-image-modal">
                        <input type="file" name="food_pic" class="form-control"> <img src="/upload/food_picture/{{$food->food_img}}" width="100px" alt="">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Delete Food Modal -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Are you sure want to Delete ?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="{{route('deleteFoodItem')}}" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="page_id" value="{{$page->id}}">
                <input type="hidden" name="food_id" value="{{$food->id}}">

                <h4>Food Item Name - {{$food->foodName}}</h4>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Delete</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>



@endsection

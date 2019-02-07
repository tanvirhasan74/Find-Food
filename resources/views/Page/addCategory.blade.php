@extends('Layouts.Page')

@section('ManagePage')
    id="active"
@endsection

@section('addCategory')
    active
@endsection

@section('content')
    <div id="">
        <div id="err-msg">
            @include('Include.error')
        </div>

        <div class="card bg-light" id="page-list-table">

          <div class="card-header">
            Add Category
          </div>
          <div class="card-body">
              <form method="post" action="{{route('insertCategory')}}" enctype="multipart/form-data">
                <input type="hidden" name="page_id" value="{{$page->id}}">
                @csrf
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Category Name</label>
                  <div class="col-sm-10">
                    <input type="text" required name="cat_name" class="form-control" placeholder="Category Name">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Create</button>
                  </div>
                </div>
              </form>
          </div>
        </div>

        <!-- Category List -->
        <table class="table table-bordered table-sm table-hover" id="cat-table">
            <thead>
                <tr>
                  <th scope="col" class="make_text_center table-dark">#</th>
                  <th scope="col" class="make_text_center table-dark">Category Name</th>
                  <th scope="col" class="make_text_center table-dark">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $key => $cat)
                <tr>
                  <th scope="row" class="make_text_center">{{++$key}}</th>
                  <td class="make_text_center">{{$cat->category}}</td>
                  <td class="make_text_center"> <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#exampleModal{{$key}}" data-whatever="@getbootstrap">Delete Category</button> </td>
                </tr>

                <!-- Delete Post Modal -->
                <div class="modal fade" id="exampleModal{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Are you sure want to Delete ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form method="post" action="{{route('deleteCategory')}}">
                            @csrf
                            <input type="hidden" name="page_id" value="{{$page->id}}">
                            <input type="hidden" name="cat_id" value="{{$cat->id}}">
                            <h4>Category Name - {{$cat->category}}</h4>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Delete</button>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                @endforeach
            </tbody>
        </table>




    </div>
@endsection

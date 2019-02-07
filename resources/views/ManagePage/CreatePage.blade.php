@extends('Layouts.ManagePage')

@section('ManagePage')
    id="active"
@endsection

@section('createPage')
    active
@endsection

@section('content')

    <div class="card bg-light" id="page-list-table">
      <div class="card-header">
        Create Page
      </div>
      <div class="card-body">
          @include('Include.error')
          <form method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{session('user')->id}}">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Page Name</label>
              <div class="col-sm-10">
                <input type="text" name="page_name" class="form-control" placeholder="Page Name">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Page Picture</label>
              <div class="col-sm-10">
                <input type="file" name="page_pic" class="form-control">
              </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Area</label>
                <div class="col-sm-10">
                    <select class="form-control" name="area">
                      @foreach($arealist as $area)
                        <option value="{{$area->area_name}}">{{$area->area_name}}</option>
                      @endforeach
                    </select>
                </div>
              </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Address</label>
              <div class="col-sm-10">
                <textarea name="address" class="form-control" rows="3" placeholder="Address"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label"></label>
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Create Page</button>
              </div>
            </div>
          </form>
      </div>
    </div>



@endsection

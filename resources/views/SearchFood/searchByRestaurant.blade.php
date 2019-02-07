@extends('Layouts.Timeline')

@section('Home')
    id="active"
@endsection

@section('searchRestaurant')
    active
@endsection

@section('content')
      <form action="{{route('search_page_keyword')}}" method="post">
          @csrf
          <div class="row">
              <div class="form-group col-10 margin-1">
                <input type="text" name="foodname" class="form-control" placeholder="Restaurant or Area">
              </div>
              <div class="form-group col-2">
                  <button type="submit" class="btn btn-success btn-block margin-1">Search</button>
              </div>
          </div>
     </form>
     <!-- food list -->
     <div class="card-body row less-padd">
         <table class="table  table-hover">
            <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Page Cover</th>
                  <th scope="col">Page Name</th>
                  <th scope="col">Area</th>
                  <th scope="col">Open Page</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pagelist as $key => $page)
                    @if($checkIsFollowed==false or ($checkIsFollowed==true and App\follow_list::isFollowed($page->id,'page')))
                      <tr>
                          <th scope="row">{{++$key}}</th>
                          <td><img class="card-img-top" id="page_img-sm" src="/upload/page_picture/{{$page->page_pic}}" alt="Card image cap"></td>
                          <td>{{$page->page_name}}</td>
                          <td>{{$page->area}}</td>
                          <td class="ui-helper-center">  <a href="{{route('viewfoodpage', ['page_id' => $page->id])}}" class="card-link btn btn-outline-secondary btn-sm">View Page</a> </td>
                      </tr>
                     @endif
                @endforeach
            </tbody>
        </table>
     </div>
@endsection

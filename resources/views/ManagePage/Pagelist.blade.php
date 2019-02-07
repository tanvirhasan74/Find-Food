@extends('Layouts.ManagePage')

@section('ManagePage')
    id="active"
@endsection

@section('pageList')
    active
@endsection

@section('content')

    <div class="card bg-light" id="page-list-table">
      <div class="card-header">
        Page List
      </div>
      <div class="card-body">
          @include('Include.error')
          <table class="table table-bordered table-hover" id="page-list-table-core">
              <thead>
                  <tr>
                    <th scope="col" class="make_text_center">#</th>
                    <th scope="col" class="make_text_center">Page Name</th>
                    <th scope="col" class="make_text_center">Page Status</th>
                    <th scope="col" class="make_text_center">Action</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($pagelist as $key => $page)
                  <tr>
                    <th scope="row" class="make_text_center">{{++$key}}</th>
                    <td class="make_text_center">{{$page->page_name}}</td>
                    <td class="make_text_center">{{$page->status}}</td>
                    <td class="make_text_center"> <a class="btn btn-info" href="{{route('myPost', ['id' => $page->id])}}">Open Page</a> </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
    </div>



@endsection

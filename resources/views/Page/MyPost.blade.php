@extends('Layouts.Page')

@section('ManagePage')
    id="active"
@endsection

@section('mypost')
    active
@endsection

@section('content')
    <div class="" id="full-mypost-page">
        <form method="post" enctype="multipart/form-data" id="post-full-form">
            @csrf
            <input type="hidden" name="page_id" value="{{$page->id}}">
            <div class="row" id="margin-1">
                <div class="form-group col-9">
                    <label id="post-head">Put Your Thoughts Here</label>

                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Title">
                    </div>
                    <textarea name="post_data" class="form-control" rows="3" placeholder="Your Post"></textarea>
                </div>
                <div class="form-group col-3" id="post-image">
                    <input type="file" name="img1" class="form-control post-img" >
                    <input type="file" name="img2" class="form-control post-img" >
                    <input type="file" name="img3" class="form-control post-img" >
                </div>
            </div>
            <button type="submit" class="btn btn-outline-primary">Submit</button>
        </form>
        <div id="err-msg">
            @include('Include.error')
        </div>

        <div class="row" id="post-list">
            @foreach($posts as $post)
                <div class="col-12">
                    <div class="card bg-light" id="page-list-table">
                      <div class="card-header">
                        {{$post->title}}
                        <a href="{{route('viewpost', ['id' => $post->id, 'page_id' => $page->id])}}" class="btn btn-outline-info btn-sm float-right">View</a>
                      </div>
                      <div class="card-body">
                          <div class="row">
                              <div class="col-8">
                                  <p>{{$post->post}}</p>
                              </div>
                              <div class="col-4">
                                  <img class="img-thumbnail float-right" src="/upload/page_post_picture/{{$post->img1}}" id="post-img-view" alt="">
                              </div>
                          </div>
                      </div>
                      <div class="card-footer text-muted">
                        {{$post->date}}
                        @php
                            $k = 0
                        @endphp

                        @foreach($comments as $comment)
                            @if($post->id == $comment->post_id)
                                {{$k++}}
                            @endif
                        @endforeach
                        <span class="float-right badge badge-info vote-space"> <p class="vote-text-space">Comments : {{$k}} </p> </span>
                        
                    </div>
                    <form class="container-fluid" action="{{route('addComment_Pagepost')}}" method="post">
                        <input type="hidden" name="page_id" value="{{$post->page_id}}">
                        @include('Layouts.Comment')
                    </form>
                </div>
                <div class="col">

                </div>
            @endforeach


        </div>
    </div>
@endsection

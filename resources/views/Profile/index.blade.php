@extends('Layouts.Profile')

@section('Profile')
    id="active"
@endsection

@section('myPost')
    active
@endsection

@section('content')
    <div id="">
        <form method="post" enctype="multipart/form-data" id="post-full-form">
            @csrf
            <input type="hidden" name="user_id" value="{{session('user')->id}}">
            <div class="row" id="margin-1">
                <div class="form-group col-9">
                    <label id="post-head">Put Your Thoughts Here</label>
                    <textarea name="post_data" class="form-control" rows="4" placeholder="Your Post"></textarea>
                </div>
                <div class="form-group col-3" id="post-image-2">
                    <input type="file" name="img1" class="form-control post-img" >
                    <input type="file" name="img2" class="form-control post-img" >
                    <input type="file" name="img3" class="form-control post-img" >
                </div>
            </div>
            <button type="submit" class="btn btn-outline-primary">Post</button>
        </form>

        <div id="err-msg">
            @include('Include.error')
        </div>

        <div id="mypost-list">
            @foreach($posts as $post)
            <div class="col-12 no-padding-zero">
                <div class="card bg-light" id="page-list-table">
                  <div class="card-body">
                      <div class="row">
                          <div class="col-8">
                              <p> {{$post->post}} </p>
                          </div>
                          <div class="col-4">
                              <img class="img-thumbnail float-right" src="/upload/user_post_picture/{{$post->img1}}" id="post-img-view" alt="">
                          </div>
                      </div>
                  </div>
                  <div class="card-footer text-muted">
                    {{$post->date}}
                    <a href="{{route('viewuserpost', ['id'=>$post->id])}}" class="btn btn-outline-info btn-sm float-right vote-space">Open</a>
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
                <form class="container-fluid" action="{{route('addComment_Userpost')}}" method="post">
                    @include('Layouts.Comment')
                </form>
            </div>

            @endforeach
        </div>


    </div>
@endsection

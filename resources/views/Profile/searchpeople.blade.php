@extends('Layouts.Timeline')

@section('Home')
    id="active"
@endsection

@section('searchFood')
    active
@endsection

@section('content')

      <form action="/search_people" method="post">
          @csrf

          <div class="row">
              <div class="form-group col-10 margin-1">
                <input type="text" name="peoplename" class="form-control" placeholder="People name">
              </div>
              <div class="form-group col-2">
                  <button type="submit" class="btn btn-success btn-block margin-1">Search</button>
              </div>
          </div>
      </form>

     <!-- food list -->
     <div class="card-body row less-padd">
         @foreach($peoples as $people)
             @if( ($followerCheck==false and $followedUser==false) or ($followerCheck==true and App\User::isMyFollower($people->id)) or ($followedUser==true and App\follow_list::isFollowed($people->id,'user')))
                 <div class="card col-3 no-padding" style="width: 20rem;">
                 <img class="card-img-top" id="food_img" src="/upload/profile_picture/{{$people->profilePicture}}" alt="Card image cap">
                 <div class="card-body">
                   <h5 class="card-title">{{$people->username}}</h5>
                 </div>
                 <ul class="list-group list-group-flush">
                   <li class="list-group-item">Follower : {{ App\User::follower($people->id,'user')}}</li>
                 </ul>
                 <div class="card-body row">
                     <div class="col-12">
                           @if(! App\follow_list::isFollowed($people->id,'user'))
                             <form action ="/follow" method ="post">
                                 {{ csrf_field() }}
                                  <input type="hidden" name="action" value="follow">
                                  <input type="hidden" name="page_user" value="user">
                                  <input type="hidden" name="followed_page_user_id" value="{{ $people->id }}" >
                                  <input type="submit" value="Follow"  class="card-link btn btn-outline-info btn-sm" style="float: right;"/>
                             </form>
                            @else
                             <form action ="/follow" method ="post">
                                 {{ csrf_field() }}
                                  <input type="hidden" name="action" value="unfollow">
                                  <input type="hidden" name="page_user" value="user">
                                  <input type="hidden" name="followed_page_user_id" value="{{ $people->id }}" >
                                  <input type="submit" value="Unfollow"  class="card-link btn btn-outline-info btn-sm" style="float: right;"/>
                             </form>
                            @endif
                     </div>
                     
                 </div>
               </div>
             @endif
         @endforeach
     </div>

@endsection

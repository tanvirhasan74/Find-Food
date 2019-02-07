@extends('Layouts.Profile')

@section('Profile')
    id="active"
@endsection

@section('followlistUser')
    active
@endsection

@section('content')
    <div id="follow-list-full-page" class="row">
        <div id="serachUser" class="col-6">
            <form class="row" id="searchuser_searchbar" action="" method="post">
                <div class="form-group col-9">
                  <input type="text" name="username" class="form-control" placeholder="Search user">
                </div>
                <div class="col-3">
                    <button type="submit" class="btn btn-outline-info btn-block">Search</button>
                </div>
            </form>

            <!--user card-->
            @foreach($userlist as $user)
                <?php $i; ?>
                @foreach($foloweduserlist as $followeduser)
                    @if($followeduser->followed_user_userid == $user->id)
                        <?php $i=1; ?>
                    @else
                        <?php $i=0; ?>
                    @endif
                @endforeach
                    <div class="card text-center" id="single-user-minicard" style="width: 100%;">
                      <div class="card-body row less-padding">
                        <div id="user-img" class="col-4">
                            <img class="img-thumbnail" id="profile-pic-followlist" src="/upload/profile_picture/{{$user->profilePicture}}" alt="">
                        </div>
                        <div id="user-info" class="col-8">
                             <table class="table table-sm table-bordered">
                                 <tbody>
                                    <tr>
                                      <td>Name</td>
                                      <td>{{$user->fullname}}</td>
                                    </tr>
                                    <tr>
                                      <td>E-mail</td>
                                      <td>{{$user->email}}</td>
                                    </tr>
                                    <tr>
                                      <td>Area</td>
                                      <td>{{$user->area}}</td>
                                    </tr>
                                  </tbody>
                             </table>
                        </div>
                      </div>

                      <div class="card-footer">
                         <form action="{{route('follow_this_guy')}}" method="post">
                            @csrf
                            <input type="hidden" name="userid" value="{{session('user')->id}}">
                            <input type="hidden" name="follow_userid" value="{{$user->id}}">
                            <button type="submit" class="btn btn-outline-success btn-sm float-left" id="">Follow</button>
                         </form>
                         <a href="#" class="btn btn-outline-primary btn-sm float-right">View Profile</a>
                      </div>
                    </div>
            @endforeach
        </div>

        <!--followlist table-->
        <div id="followerlist-table" class="col-6">

            <form class="row" id="serachUser" action="" method="post">
                <div class="form-group col-9">
                  <input type="text" name="username" class="form-control" placeholder="Search user">
                </div>
                <div class="col-3">
                    <button type="submit" class="btn btn-outline-info btn-block">Search</button>
                </div>
            </form>

            @foreach($foloweduserlist as $followeduser)
                <div class="card text-center" id="single-user-minicard" style="width: 100%;">
                  <div class="card-body row less-padding">
                    <div id="user-img" class="col-4">
                        <img class="img-thumbnail" id="profile-pic-followlist" src="/upload/profile_picture/{{$followeduser->profilePicture}}" alt="">
                    </div>
                    <div id="user-info" class="col-8">
                         <table class="table table-sm table-bordered">
                             <tbody>
                                <tr>
                                  <td>{{$followeduser->fullname}}</td>
                                </tr>
                              </tbody>
                         </table>
                    </div>
                  </div>

                  <div class="card-footer">
                     <form action="{{route('follow_this_guy')}}" method="post">
                        @csrf
                        <input type="hidden" name="userid" value="{{session('user')->id}}">
                        <input type="hidden" name="follow_userid" value="{{$user->id}}">
                        <button type="submit" class="btn btn-outline-success btn-sm float-left" id="">Follow</button>
                     </form>
                     <a href="#" class="btn btn-outline-primary btn-sm float-right">View Profile</a>
                  </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection

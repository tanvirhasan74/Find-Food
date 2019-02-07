
  <li class="list-group-item">

  	<div class="card" style="width: 100%;">
	  <img class="img-thumbnail" style="height: 200px;width: 100%;" src="/upload/profile_picture/{{$people->profilePicture}}">
	  <div class="card-body">
	    <h5 class="card-title">{{ $people->username }}</h5>

	     <form action ="/follow" method ="post">
         {{ csrf_field() }}
          <input type="hidden" name="action" value="follow">
          <input type="hidden" name="page_user" value="user">
          <input type="hidden" name="followed_page_user_id" value="{{ $people->id }}" >
          <input type="submit" value="Follow"  class="card-link btn btn-outline-info btn-sm" style="float: right;"/>
       </form>

	  </div>
	</div>

  </li>

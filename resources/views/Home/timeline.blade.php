@extends('Layouts.Timeline')

@section('Home')
    id="active"
@endsection

@section('timeline')
    id="active"
@endsection


@section('content')

    <div class="row">
    	<div class="col-sm-9" style="overflow-y: scroll; height:200vh;">

	         @include('Home.layouts.myPost')

	    	 @foreach($posts as $post)
	    	    <br>
		        @if($post->page_user == 'page' and $post->type == 'newfood')
		           @include('Home.layouts.foodItem')

		        @elseif($post->page_user == 'page' and $post->type == 'pagepost')
	               @include('Home.layouts.pagePost')

	            @elseif($post->page_user == 'user' and $post->type == 'userpost')
	               @include('Home.layouts.userPost')

		        @endif
	         @endforeach
	         <br>
	         <br>

             @if($posts->hasMorePages())
		         <div class="col-sm-12">
		         	 <h4 style="margin: 0 auto;width:20%;"><a href="{{ $posts->nextPageUrl() }}" class="card-link btn btn-outline-info btn-sm">More</a></h4>
		         </div>
		     @else
		         <div class="col-sm-12">
		         	 <h4 style="margin: 0 auto;width:20%;"><a href="{{ $posts->previousPageUrl() }}" class="card-link btn btn-outline-info btn-sm">Previous</a></h4>
		         </div>

		     @endif

    	</div>

    	<div class="col-sm-3">
    	  <br>
          <ul class="list-group">
           <li class="list-group-item">People you may know</li>
    	   @foreach($peoples as $people)
             @if(! App\follow_list::isFollowed($people->id,'user'))
    		    @include('Home.layouts.peopleYouMayKnow')
    		 @endif
    	   @endforeach
    	  </ul>
    	</div>
    </div>


@endsection

<div class="row" style="">
    <div class="card bg-light col-12" id="page-list-table">
      <h3 style="text-align: center;"><i class="fa fa-user-circle"></i> {{ App\timeline::user($post->page_user_id)->username }}</h3>
      <div class="card-header">
         <a href="/profile/post/{{ App\timeline::userPost($post->post_id)->id}}" class="btn btn-outline-info btn-sm float-right">View</a>
      </div>
      <div class="card-body">
          <div class="row">
              <div class="col-12">
                  <p>{{ App\timeline::userPost($post->post_id)->post }}</p>
              </div>
          </div>
      </div>
      <div class="card-footer text-muted">

        <span class="float-right badge badge-info vote-space"> <p class="vote-text-space">Comments : {{ App\Comment::totalComment($post->post_id,'user_post') }} </p> </span>
      </div>
    </div>

</div>
<div class="col">

</div>

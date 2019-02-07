<div class="row" style="">
    <div class="card bg-light col-12" id="page-list-table">
      <h2 style="text-align: center;"><i class="fa fa-address-card-o" aria-hidden="true"></i> {{ App\timeline::page($post->page_user_id)->page_name }}</h2>
      <div class="card-header">
        {{ App\timeline::pagePost($post->post_id)->title }}
        <a href="/page-post/{{ App\timeline::pagePost($post->post_id)->page_id }}/{{ App\timeline::pagePost($post->post_id)->id }}" class="btn btn-outline-info btn-sm float-right">View</a>
      </div>
      <div class="card-body">
          <div class="row">
              <div class="col-12">
                  <p>{{ App\timeline::pagePost($post->post_id)->post }}</p>
              </div>
          </div>
      </div>
      <div class="card-footer text-muted">

        <span class="float-right badge badge-info vote-space"> <p class="vote-text-space">Comments : {{ App\Comment::totalComment($post->post_id,'page_post') }} </p> </span>
      </div>
    </div>

</div>
<div class="col">

</div>

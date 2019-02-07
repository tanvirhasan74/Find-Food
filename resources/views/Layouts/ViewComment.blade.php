<div class="col-12">
    <br>
    <h2 class="font-weight-light">Comments</h2>
    <table class="table table-bordered">
      <tbody>
        @foreach($comments as $comment)
            <tr>
              <td>
                  <h5 class="">[{{$comment->user_name}}]</h5>
                  <h6>[ {{$comment->date}} ]</h6>
                  <p>{{$comment->comment}}</p>
              </td>
            </tr>
        @endforeach
      </tbody>
    </table>
</div>

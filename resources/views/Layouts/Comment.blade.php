@csrf
<div class="top-margin">
    <input type="hidden" name="user_id" value="{{session('user')->id}}">
    <input type="hidden" name="user_name" value="{{session('user')->fullname}}">
    <input type="hidden" name="post_id" value="{{$post->id}}">
    <div class="row">
        <div class="col-10 no-padding-left float-left">
            <input required type="text" name="commentData" class="form-control" placeholder="Comment here . . .">
        </div>
        <div class="col-1 float-right">
            <button type="submit" class="btn btn-outline-primary">comment</button>
        </div>
    </div>

</div>

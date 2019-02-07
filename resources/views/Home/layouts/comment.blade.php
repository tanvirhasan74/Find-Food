<form action="/profile" method="post" enctype="multipart/form-data" id="post-full-form">
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
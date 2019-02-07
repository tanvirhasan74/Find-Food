<div class="row card" style="background-color:#f7f8f9;">
        <div class="row">
          <div class="col-8">
            <table class="table">
              <thead>
                 
                  <h2  style="text-align: center;"><i class="fa fa-address-card-o" aria-hidden="true"></i> {{ App\timeline::page($post->page_user_id)->page_name }}</h2>
                 
              </thead>
              <tbody>
                  <tr>
                    <th scope="col">Item Name</th>
                    <td scope="col">{{ App\timeline::foodItem($post->page_user_id,$post->post_id)->foodName }}</td>
                    
                  </tr>
                  <tr>
                    <th scope="col">Category</th>
                    <td scope="col">{{ App\timeline::foodItem($post->page_user_id,$post->post_id)->category }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Price</th>
                    <td scope="col">{{ App\timeline::foodItem($post->page_user_id,$post->post_id)->Price }}</td>
                  </tr>

                  
                </tbody>
           </table>
         </div>
         <div class="col-4">
            <img class="img-thumbnail" id="food_img" src="/upload/food_picture/{{ App\timeline::foodItem($post->page_user_id,$post->post_id)->food_img }}" alt="Card image cap">  
         </div>
        </div>

         <div class="card-body row">
             <div class="col-6">
                 <a href="/fooditem/{{ App\timeline::foodItem($post->page_user_id,$post->post_id)->id }}" class="card-link btn btn-outline-info btn-sm">View Item</a>
             </div>
            <div class="col-6">
                 <a href="/page/{{ App\timeline::foodItem($post->page_user_id,$post->post_id)->page_id }}" class="card-link btn btn-outline-info btn-sm">View Page</a>
             </div>
         </div>

      </div>
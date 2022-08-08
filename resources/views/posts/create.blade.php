@include('includes.navbar')
<div class="container">
<form method="POST" action="{{route('posts.store')}}">
            @csrf
            <div class="mb-3">
              <label  class="form-label">title</label>
              <input type="text" name="title" class="form-control"  style="width:600px; height:100px">
            </div>
            <div class="mb-3">
              <label  class="form-label">body</label>
              <input type="text" class="form-control" name="body" style="width:600px; height:200px" >
            </div>
           
            <div class="mb-3">
              <label  class="form-label">enabled</label>
              <input type="text" class="form-control" name="enabled">
            </div>
            <div class="mb-3">
              <label  class="form-label">User ID</label>
              <input type="text" class="form-control" name="user_id">
            </div>
           
         
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
@include('includes.navbar')
@section('title', 'Create Posts')
<div class="container">
<form method="POST" action="{{route('posts.store')}}">
            @csrf
            <div class="mb-3">
              <label  class="form-label">title</label>
              <input type="text" name="title" class="form-control" >
            </div>
            <div class="mb-3">
              <label  class="form-label">body</label>
              <textarea type="text" class="form-control" name="body"> </textarea>
            </div>
            <div class="mb-3">
              <label  class="form-label">enabled</label>
              <input type="text" class="form-control" name="enabled">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>

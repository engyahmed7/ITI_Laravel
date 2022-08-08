@include('includes.navbar')
<div class="container" style="width:300px;">
<form method="POST" action="{{ route('users.update',$user['id']) }}" >
    @method('PUT')
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">name</label>
        <input type="text" class="form-control" name="name" value="{{ $user['name'] }}">
      </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label"   >Email address</label>
      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $user['email'] }}">
    </div>
    
 
    <button type="submit" class="btn btn-primary">Edit</button>
  </form>
</div>
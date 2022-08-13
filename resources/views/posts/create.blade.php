@extends('layouts.app2')
@section('title', 'Create Posts')
@section('content')
<div class="container">
<form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data" >
            @csrf
            <div class="mb-3">
              <label  class="form-label">title</label>
              <input type="text" name="title" class="form-control" >
              @if ($errors->has('title'))
                <span class="help-block text-danger">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
             @endif
            </div>
            <div class="mb-3">
              <label  class="form-label">body</label>
              <textarea type="text" class="form-control" name="body"> </textarea>
              @if ($errors->has('body'))
                <span class="help-block text-danger">
                    <strong>{{ $errors->first('body') }}</strong>
                </span>
             @endif
            </div>
            <div class="mb-3">
              <label  class="form-label">enabled</label>
              <input type="text" class="form-control" name="enabled">
                @if ($errors->has('enabled'))
                    <span class="help-block text-danger" >
                        <strong>{{ $errors->first('enabled') }}</strong>
                    </span>
                @endif
            </div>
            <div class="mb-3">
            <label  class="form-label">Image</label>
                <input type="file" name="image" class="form-control" id="formFileLg"  >
                @if ($errors->has('image'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
@endsection

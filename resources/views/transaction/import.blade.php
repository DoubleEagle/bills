@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <h1>Upload file</h1>
      <form action="{{ url('/transaction/import') }}" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="file">Upload bestand</label>
          <input type="file" id="file" name="file">
        </div>
        <div class="form-group">
        <select class="form-control">
        </select>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection
